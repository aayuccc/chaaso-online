<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    // home page meta key (saved by HomeRepository) => number of posts to load
    protected array $sections = [
        'rajniti_cat'     => 8,
        'commerce_cat'    => 9,
        'lifestyle_cat'   => 7,
        'sports_cat'      => 6,
        'education_cat'   => 4,
        'province_cat'    => 8,
        'tourism_cat'     => 4,
        'it_tech_cat'     => 4,
        'interview_cat'   => 1,
        'idea_cat'        => 4,
        'video_cat'       => 5,
        'share_cat'       => 4,
        'auto_cat'        => 4,
        'agriculture_cat' => 4,
    ];

    public function index()
    {
        $homeId = SettingHelper::get_home_id() ?? 1;

        $cached = Cache::remember("home_page_data_{$homeId}", now()->addMinutes(5), function () use ($homeId) {
                $post = Post::with(['authors:id,name', 'postMeta'])
                ->select(['id', 'user_id', 'post_title', 'slug'])
                ->where('post_type', 'page')
                ->where('post_status', 'publish')
                ->findOrFail($homeId);
            $postMeta = $post->GetAllMetaData();

            // selected category id for each section
            $sectionCatIds = [];
            foreach ($this->sections as $key => $take) {
                $sectionCatIds[$key] = $postMeta[$key] ?? null;
            }
            $allCategoryIds = array_values(array_unique(array_filter($sectionCatIds)));

            // load all selected categories with their children in one query
            $categories = empty($allCategoryIds) ? collect() : Category::select('id', 'name', 'slug', 'parent', 'menu_order', 'type')
                ->with([
                    'children' => fn($q) => $q->select('id', 'name', 'slug', 'parent', 'menu_order', 'type')->orderBy('menu_order', 'ASC'),
                    'categoryMeta',
                ])
                ->whereIn('id', $allCategoryIds)
                ->get()
                ->keyBy('id');

            $getCategoryWithPosts = function ($categoryId, $take) use ($categories) {
                $category = $categoryId ? $categories->get($categoryId) : null;
                if (!$category) {
                    return null;
                }

                // include posts from child categories too
                $categoryIds = $category->children->pluck('id')->push($category->id)->all();

                $posts = Post::select('posts.id', 'posts.user_id', 'posts.post_title', 'posts.slug', 'posts.post_excerpt', 'posts.created_at')
                    ->whereIn('posts.id', function ($q) use ($categoryIds) {
                        $q->select('post_id')->from('category_post')->whereIn('category_id', $categoryIds);
                    })
                    ->where('posts.post_type', 'post')
                    ->where('posts.post_status', 'publish')
                    ->with([
                        'authors:id,name',
                        'postMeta',
                        'categories:id,name,slug',
                    ])
                    ->latest('posts.created_at')
                    ->take($take)
                    ->get();

                return (object) ['category' => $category, 'posts' => $posts];
            };

            $sectionData = [];
            foreach ($this->sections as $key => $take) {
                $sectionData[$key] = $getCategoryWithPosts($sectionCatIds[$key], $take);
            }

            // latest posts for the headline / banner section
            $recentPosts = Post::select('id', 'user_id', 'post_title', 'slug', 'post_excerpt', 'created_at')
                ->where('post_type', 'post')
                ->where('post_status', 'publish')
                ->with([
                    'authors:id,name',
                    'postMeta',
                    'categories:id,name,slug',
                ])
                ->latest()
                ->take(10)
                ->get();

            return [
                'post' => $post,
                'postMeta' => $postMeta,
                'recent_posts' => $recentPosts,
                'sections' => $sectionData,
            ];
        });

        // e.g. rajniti_cat => $rajniti_cat (Category|null), $rajniti_posts (Collection)
        $viewData = [
            'post' => $cached['post'],
            'postMeta' => $cached['postMeta'],
            'recent_posts' => $cached['recent_posts'],
        ];
        foreach ($this->sections as $key => $take) {
            $prefix = str_replace('_cat', '', $key);
            $viewData[$key] = $cached['sections'][$key]?->category;
            $viewData["{$prefix}_posts"] = $cached['sections'][$key]?->posts ?? collect();
        }

        return view('frontend.front', $viewData);
    }
}
