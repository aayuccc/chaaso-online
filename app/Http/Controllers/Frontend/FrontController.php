<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\SettingHelper;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    // public function index()
    // {
    //     // get home page id for settings
    //     $pageId = Setting::where('setting_name', 'page_on_front')->value('setting_value');

    //     // check page id exists or not
    //     $news = Post::findOrFail($pageId);

    //     // if exists take meta data of that id
    //     $postMeta = $news->GetAllMetaData();

    //     $selectBanner = isset( $postMeta['select_first_banner_news'] ) ? Post::where(['id' => $postMeta['select_first_banner_news'], 'post_status' => 'publish'])->first() : null;

    //     $bannerNews = Post::PostType('post')
    //     ->whereHas('postMeta', function ( $query ) {
    //         $query->where('meta_key', 'banner_news')->where('meta_value', 'yes');
    //     })
    //     ->latest()
    //     ->take($selectBanner ? 2 : 3)
    //     ->get();

    //     $recentPosts = Post::where('post_type', 'post')->latest()->take(5)->get();

    //     $trendingPostQuery = Post::where('post_type', 'post')
    //         ->join('post_metas', 'posts.id', '=', 'post_metas.post_id')
    //         ->where('post_metas.meta_key', 'trending_count')
    //         ->whereNotNull('post_metas.meta_value')
    //         ->orderByDesc('post_metas.meta_value');
    //     if ( $time = SettingHelper::get_field('trending_news_time') )
    //     {
    //         $trendingPostQuery->where('posts.created_at', '>=', now()->subDays($time));
    //     }
    //     $trendingPosts = $trendingPostQuery->take(5)->get(['posts.*']);

    //     if ( $trendingPosts->isEmpty()  ) {
    //         $trendingPostQuery = Post::where('post_type', 'post')
    //         ->join('post_metas', 'posts.id', '=', 'post_metas.post_id')
    //         ->where('post_metas.meta_key', 'trending_count')
    //         ->whereNotNull('post_metas.meta_value')
    //         ->orderByDesc('post_metas.meta_value');
    //         $trendingPosts = $trendingPostQuery->take(5)->get(['posts.*']);
    //     }

    //     $mjnewscat = Category::findOrFail(5);
    //     $mjnewsposts = $mjnewscat->posts()->latest()->take(4)->get();

    //     $fincat = Category::findOrFail(12);
    //     $finposts = $fincat->posts()->latest()->take(7)->get();

    //     $provcat = Category::findOrFail(14);

    //     $inscat = Category::findOrFail(11);
    //     $insposts = $inscat->posts()->latest()->take(7)->get();

    //     $stockcat = Category::findOrFail(8);
    //     $stockposts = $stockcat->posts()->latest()->take(6)->get();

    //     $ideacat = Category::findOrFail(26);
    //     $ideaposts = $ideacat->posts()->latest()->take(5)->get();

    //     $globalcat = Category::findOrFail(6);
    //     $globalposts = $globalcat->posts()->latest()->take(12)->get();

    //     $vidcat = Category::findOrFail(28);
    //     $vidposts = $vidcat->posts()->latest()->take(6)->get();
    //     // $vidposts = NULL;

    //     $koshicat = Category::findOrFail(18);
    //     $koshiposts = $koshicat->posts()->latest()->take(8)->get();

    //     $bagcat = Category::findOrFail(15);
    //     $bagposts = $bagcat->posts()->latest()->take(8)->get();

    //     $karnalicat = Category::findOrFail(17);
    //     $karnaliposts = $karnalicat->posts()->latest()->take(8)->get();


    //     return view('frontend.front', [
    //         'pageId' => $pageId,
    //         'news' => $news,
    //         'postMeta' => $postMeta,
    //         'bannerNews' => $bannerNews,
    //         'selectBanner' => $selectBanner,
    //         'recentNews' => $recentPosts,
    //         'trendingNews' => $trendingPosts,
    //         'majorNews' => $mjnewsposts,
    //         'mjnewscat' => $mjnewscat,
    //         'provcat' => $provcat,
    //         'financeNews' => $finposts,
    //         'fincat' => $fincat,
    //         'insuranceNews' => $insposts,
    //         'inscat' => $inscat,
    //         'stockNews' => $stockposts,
    //         'stockcat' => $stockcat,
    //         'ideaNews' => $ideaposts,
    //         'ideacat' => $ideacat,
    //         'globalNews' => $globalposts,
    //         'globalcat' => $globalcat,
    //         'vidNews' => $vidposts,
    //         'vidcat' => $vidcat,
    //         'koshiNews' => $koshiposts,
    //         'koshicat' => $koshicat,
    //         'bagNews' => $bagposts,
    //         'bagcat' => $bagcat,
    //         'karnaliNews' => $karnaliposts,
    //         'karnalicat' => $karnalicat,
    //     ]);
    // }
    public function index()
    {
        return response()->json([ 'message' => 'Not Found']);
    }
}
