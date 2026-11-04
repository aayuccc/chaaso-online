<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Category;
use App\Models\SearchLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class SearchRepository
{
    // trim, collapse spaces, lowercase (for latin input) and cap the length
    public function normalize(?string $term): string
    {
        $term = preg_replace('/\s+/u', ' ', trim((string) $term));

        return mb_substr(mb_strtolower($term), 0, 100);
    }

    // published posts matching the post title, or the name / slug of one of its categories
    public function search(string $term, int $perPage = 15)
    {
        $like = '%' . addcslashes($term, '%_\\') . '%';

        return Post::select('posts.id', 'posts.user_id', 'posts.post_title', 'posts.slug', 'posts.post_excerpt', 'posts.created_at')
            ->where('post_type', 'post')
            ->where('post_status', 'publish')
            ->where(function ($q) use ($like) {
                $q->where('post_title', 'like', $like)
                    ->orWhereHas('categories', function ($cat) use ($like) {
                        $cat->where('type', 'category')
                            ->where(fn ($c) => $c->where('name', 'like', $like)->orWhere('slug', 'like', $like));
                    });
            })
            ->with(['authors:id,name', 'postMeta:id,post_id,meta_key,meta_value', 'categories:id,name,slug,type'])
            ->latest('posts.created_at')
            ->paginate($perPage)
            ->withQueryString();
    }

    // one entry per visitor + term per day, so refreshing / paging doesn't inflate trending
    public function log(string $term, ?string $ip, int $results): void
    {
        $exists = SearchLog::where('term', $term)
            ->where('ip_address', $ip)
            ->where('created_at', '>=', now()->subDay())
            ->exists();

        if ( !$exists ) {
            SearchLog::create(['term' => $term, 'ip_address' => $ip, 'results' => $results]);
        }
    }

    // most searched terms (by unique visitors) over the last few days, ignoring searches that found nothing
    public function trending(int $days = 4, int $limit = 6): array
    {
        return Cache::remember("search_trending_{$days}_{$limit}", now()->addMinutes(10), function () use ($days, $limit) {
            return SearchLog::select('term', DB::raw('COUNT(DISTINCT ip_address) as hits'), DB::raw('MAX(created_at) as last_at'))
                ->where('created_at', '>=', now()->subDays($days))
                ->where('results', '>', 0)
                ->groupBy('term')
                ->orderByDesc('hits')
                ->orderByDesc('last_at')
                ->take($limit)
                ->pluck('term')
                ->all();
        });
    }

    // categories listed in the search overlay: top level categories, with the province categories grouped separately
    public function overlayCategories(): array
    {
        return Cache::remember('search_overlay_categories', now()->addMinutes(30), function () {
            $categories = Category::select('id', 'name', 'slug')
                ->where('type', 'category')
                ->where('parent', 0)
                ->orderBy('menu_order', 'ASC')
                ->orderBy('id', 'ASC')
                ->get();

            $provinces = $categories
                ->filter(fn ($cat) => in_array($cat->slug, Category::PROVINCE_SLUGS))
                ->sortBy(fn ($cat) => array_search($cat->slug, Category::PROVINCE_SLUGS))
                ->values();

            // provinces get their own group, so drop them from the main list
            $categories = $categories->reject(fn ($cat) => in_array($cat->slug, Category::PROVINCE_SLUGS))->values();

            return ['categories' => $categories, 'provinces' => $provinces];
        });
    }
}
