<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index($slug)
    {
        $post = Post::where('slug',  $slug)->first();

        if ( $post ) {

            $metaDatas = $post->GetAllMetaData();

            if ( $post->post_type === 'page' ) {

                $pageTemplate = $metaDatas['page_template'];
                $viewName = "frontend.pages.$pageTemplate";

                return view($viewName, [
                    'post' => $post,
                    'metaData' => $metaDatas,
                ]);

            }
        }
        else {
            abort(404, 'Not Found');
        }
    }

    public function newsIndex($year, $month, $id)
    {
        $post = Post::where([ 'id' => $id, 'post_type' => 'post' ])->first();

        if ( !empty($post) ) {

            $isPublished = $post->post_status == 'publish';
            $isDraft = $post->post_status == 'draft';

            if ( $isPublished || ( $isDraft && auth()->check()) ) {
                $postMeta = $post->GetAllMetaData();
                $latestNews = Post::where('id', '!=', $post->id)
                    ->where([ 'post_type' => 'post', 'post_status' => 'publish' ])
                    ->latest()
                    ->take(5)
                    ->get();

                $relatedPosts = $this->postRepository->getRelatedPosts($post->id);
                return view('frontend.single-post', compact('post', 'latestNews', 'relatedPosts', 'postMeta'));
            }

            if ( $isDraft && !auth()->check() ) {
                abort(403, 'You cannot open draft post');
            }
        }
        abort(404, 'Post not found');
    }
}
