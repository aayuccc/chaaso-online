<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Enums\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Repositories\PhotoFeatureRepository;
use App\Repositories\CategoryPostRepository;

class PhotoFeatureController extends Controller
{
    private $postType;
    private $postRepository;
    private $photoFeatureRepository;
    private $categoryPostRepository;

    public function __construct(PostRepository $postRepository, PhotoFeatureRepository $photoFeatureRepository, CategoryPostRepository $categoryPostRepository)
    {
        // $this->middleware('permission:create_photo_feature', ['only' => ['create','store']] );
        // $this->middleware('permission:read_photo_feature', ['only' => ['index']] );
        // $this->middleware('permission:update_photo_feature', ['only' => ['update','edit']] );
        // $this->middleware('permission:delete_photo_feature', ['only' => 'destroy']);

        $this->postType = PostType::PHOTO_FEATURE;
        $this->postRepository = $postRepository;
        $this->photoFeatureRepository = $photoFeatureRepository;
        $this->categoryPostRepository = $categoryPostRepository;
    }

    public function index(Request $request)
    {
        $status = $request->get('status') ? $request->get('status') : 'all';
        $baseQuery = Post::PostType($this->postType)->with(['postMeta', 'user']);
        $all = $posts = $baseQuery->get();

        switch ($status) {
            case 'publish':
                $posts = $baseQuery->PostStatus('publish')->get();
                break;
            case 'trash':
                $posts = $baseQuery->onlyTrashed()->get();
                break;
            case 'draft':
                $posts = $baseQuery->PostStatus('draft')->get();
                break;
            default:
                break;
        }
        $publishPosts = Post::PostType($this->postType)->PostStatus('publish')->count();
        $trashPosts = Post::PostType($this->postType)->onlyTrashed()->count();
        $draftPosts = Post::PostType($this->postType)->PostStatus('draft')->count();

        return view('backend.photo-features.index-photo-feature', [
            'status' => $status,
            'all' => $all,
            'posts' => $posts,
            'draftPosts' => $draftPosts,
            'publishPosts' => $publishPosts,
            'trashPosts' => $trashPosts,
            'postType' => $this->postType,
        ]);
    }

    public function create()
    {
        $type = $this->postRepository->encodeType($this->postType);
        $authors = $this->postRepository->getPostByCategory('author')->orderBy('name', 'ASC')->get();

        return view('backend.photo-features.create-photo-feature', [
            'type' => $type,
            'authors' => $authors,
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $type = isset( $request->type ) ? $this->postRepository->decodeType($request->type) : 'NOT FOUND';

        // check post type exists or not
        $this->postRepository->checkPostTypeExists($type);

        try {

            // check whether click on draft or publish
            $request->merge(['post_status' => $request->input('action')]);

            $post = $this->postRepository->createPost($request, $this->postType);

            // store author
            $this->categoryPostRepository->assignCategory($post, $request->input('authors', []));

            $metaDatas = $this->photoFeatureRepository->processMetaData($post, $request);

            foreach ($metaDatas as $key => $value) {
                $this->postRepository->updateOrCreateMeta($post, $key, $value);
            }

            session()->flash('success', 'Photo Feature Created.');

            return redirect()->route('backend.photo_feature.edit', $post->id);

        } catch (\Exception $e) {

            session()->flash('error', 'Error While Creating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $post = Post::with('categories')->where('post_type', $this->postType)->findOrFail($id);
        $authors = $this->postRepository->getPostByCategory('author')->orderBy('name', 'ASC')->get();
        $metaDatas = $this->postRepository->getMetaDatas($post);

        return view('backend.photo-features.edit-photo-feature', [
            'post' => $post,
            'metaDatas' => $metaDatas,
            'authors' => $authors,
            'gallery' => $this->photoFeatureRepository->getGallery($metaDatas['photo_gallery'] ?? null),
        ]);
    }

    public function update(PostUpdateRequest $request, Post $id)
    {
        abort_unless($id->post_type === $this->postType, 404);

        try {

            // check whether click on draft or publish
            $request->merge(['post_status' => $request->input('action')]);

            $data = $this->postRepository->updatePost($request, $id, $this->postType);

            if ( $data['status'] && $data['post'] ) {

                $post = $data['post'];

                // update author
                $this->categoryPostRepository->assignCategory($post, $request->input('authors', []));

                $metaDatas = $this->photoFeatureRepository->processMetaData($post, $request);

                foreach ($metaDatas as $key => $value) {
                    $this->postRepository->updateOrCreateMeta($post, $key, $value);
                }

                session()->flash('success', 'Photo Feature Updated.');

                return redirect()->back();

            }
            else {
                session()->flash('error', 'Error While Updating: Unable to update the photo feature.');
            }

        } catch (\Exception $e) {

            session()->flash('error', 'Error While Updating: ' . $e->getMessage());
            Log::error($e);
        }

        return redirect()->back();
    }
}
