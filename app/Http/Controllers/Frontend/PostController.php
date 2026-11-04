<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use App\Helpers\SettingHelper;
use App\Enums\CategoryType;
use App\Enums\TemplateType;
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

            // the front page lives at the site root, not at /{slug}
            if ( $post->post_type === 'page' && $post->id == SettingHelper::get_home_id() ) {
                return redirect()->route('frontend.home', [], 301);
            }

            $metaDatas = $post->GetAllMetaData();

            if ( $post->post_type === 'page' ) {

                $pageTemplate = $metaDatas['page_template'];
                $viewName = "frontend.pages.$pageTemplate";

                $data = [
                    'post' => $post,
                    'metaData' => $metaDatas,
                ];

                if ( $pageTemplate === TemplateType::TEAMS ) {
                    $data = array_merge($data, $this->getTeamsData());
                }

                return view($viewName, $data);

            }
        }
        else {
            abort(404, 'Not Found');
        }
    }

    // published team members and the departments that have at least one of them
    private function getTeamsData()
    {
        $teams = Post::PostType('team')
            ->PostStatus('publish')
            ->with([
                'postMeta',
                'categories' => function ($query) {
                    $query->where('type', CategoryType::DEPARTMENT);
                },
            ])
            ->orderBy('menu_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();

        $departments = Category::where('type', CategoryType::DEPARTMENT)
            ->whereHas('posts', function ($query) {
                $query->where('post_type', 'team')->where('post_status', 'publish');
            })
            ->orderBy('menu_order', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

        return [
            'teams' => $teams,
            'departments' => $departments,
        ];
    }

    public function newsIndex($id)
    {
        $post = Post::where([ 'id' => $id, 'post_type' => 'post' ])->first();

        if ( !empty($post) ) {

            $isPublished = $post->post_status == 'publish';
            $isDraft = $post->post_status == 'draft';

            if ( $isPublished || ( $isDraft && auth()->check()) ) {
                $postMeta = $post->GetAllMetaData();

                if ( $isPublished ) {
                    $this->countView($post);
                }

                // first assigned category, used for the breadcrumb and "more" link
                $category = $post->categories()->where('type', CategoryType::CATEGORY)->first();
                $category_name = $category->name ?? null;

                // first selected author, shown in the byline and author box
                $author = $post->categories()->where('type', CategoryType::AUTHOR)->first();

                $tags = $post->categories()->where('type', CategoryType::TAG)->get();

                $relatedPosts = $this->postRepository->getRelatedPosts($post->id, 'post');

                // latest posts from any category, skipping the ones already shown as related
                $latestNews = Post::where('id', '!=', $post->id)
                    ->whereNotIn('id', $relatedPosts->pluck('id'))
                    ->where([ 'post_type' => 'post', 'post_status' => 'publish' ])
                    ->with('postMeta:id,post_id,meta_key,meta_value')
                    ->latest()
                    ->take(4)
                    ->get();

                return view('frontend.single-post', compact('post', 'latestNews', 'relatedPosts', 'postMeta', 'category', 'category_name', 'author', 'tags'));
            }

            if ( $isDraft && !auth()->check() ) {
                abort(403, 'You cannot open draft post');
            }
        }
        abort(404, 'Post not found');
    }

    // one view per post per visitor session, so refreshing doesn't inflate the count
    private function countView(Post $post)
    {
        $viewed = session('viewed_posts', []);

        if ( in_array($post->id, $viewed) ) {
            return;
        }

        // query-level increment: skips the observer (last_updated_by) and leaves updated_at alone
        Post::whereKey($post->id)->toBase()->increment('views');
        $post->views = ($post->views ?? 0) + 1;

        session()->push('viewed_posts', $post->id);
    }
}
