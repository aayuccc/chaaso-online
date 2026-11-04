<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = Cache::remember('sitemap_index_xml', 3600, function () {
            $posts = Post::whereIn('post_type', ['post'])
                ->where('post_status', 'publish')
                ->latest('updated_at')
                ->get();
            $pages = Post::where('slug', '!=', 'home')->where('post_type', 'page')->where('post_status', 'publish')->latest('updated_at')->get();
            $categories = Category::whereType('category')->latest('updated_at')->get();

            // Real last-modified time for the homepage, instead of now() on
            // every request - a constantly "just changed" lastmod is a bad
            // freshness signal to search engines.
            $homeLastMod = $posts->max('updated_at') ?? now();

            return view('frontend.sitemap', [
                'posts' => $posts,
                'pages' => $pages,
                'categories' => $categories,
                'homeLastMod' => $homeLastMod,
            ])->render();
        });

        return response($xml)->header('Content-Type', 'text/xml');
    }

    public function news()
    {
        $posts = Post::whereIn('post_type', ['post'])
            ->where('post_status', 'publish')
            ->where('created_at', '>=', now()->subDays(2))
            ->latest('created_at')
            ->limit(1000)
            ->get();

        return response()->view('frontend.news-sitemap', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }
}