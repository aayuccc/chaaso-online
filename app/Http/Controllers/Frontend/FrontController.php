<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\SettingHelper;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{
    public function index()
    {
        $homeId = SettingHelper::get_home_id() ?? 1;
        $home = Cache::rememberForever("home_page_data_{$homeId}", function () use ($homeId) {
            return Post::with('user:id,name')
                ->select(['id', 'user_id', 'post_title', 'slug'])
                ->where('post_type', 'page')
                ->where('post_status', 'publish')
                ->findOrFail($homeId);
        });
        $post = $home->load('postMeta');
        $content = $home->value('post_content') ?? null;
        $meta = $home->GetAllMetaData();
        
        return view('frontend.front', [
            'post' => $post,
            'postMeta' => $meta,
        ]);
    }    
}
