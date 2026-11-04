<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Enums\PostType;
use App\Enums\CategoryType;
use App\Enums\TemplateType;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\PhotoFeatureRepository;

class PhotoFeatureController extends Controller
{
    private $postRepository;
    private $photoFeatureRepository;

    public function __construct(PostRepository $postRepository, PhotoFeatureRepository $photoFeatureRepository)
    {
        $this->postRepository = $postRepository;
        $this->photoFeatureRepository = $photoFeatureRepository;
    }

    public function index()
    {
        // the page using the photo template supplies the title, intro text and seo meta
        $post = Post::PostType('page')
            ->PostStatus('publish')
            ->whereHas('postMeta', function ($query) {
                $query->where('meta_key', 'page_template')->where('meta_value', TemplateType::PHOTO);
            })
            ->first();

        $metaData = $post ? $post->GetAllMetaData() : [];
        $photoFeatures = Post::PostType(PostType::PHOTO_FEATURE)
            ->PostStatus('publish')
            ->with('postMeta:id,post_id,meta_key,meta_value')
            ->latest()
            ->paginate(12);

        return view('frontend.pages.photo', compact('post', 'metaData', 'photoFeatures'));
    }

    public function show($id)
    {
        $post = Post::where([ 'id' => $id, 'post_type' => PostType::PHOTO_FEATURE ])->firstOrFail();

        $isPublished = $post->post_status == 'publish';

        // drafts are only previewable by logged in users
        if ( !$isPublished && !auth()->check() ) {
            abort(404, 'Photo feature not found');
        }

        if ( $isPublished ) {
            $this->postRepository->countView($post);
        }

        $postMeta = $post->GetAllMetaData();
        $gallery = $this->photoFeatureRepository->getGallery($postMeta['photo_gallery'] ?? null);
        $documents = $this->photoFeatureRepository->getDocumentItems($postMeta['document'] ?? null);
        // first selected author, shown in the byline and author box
        $author = $post->categories()->where('type', CategoryType::AUTHOR)->first();
        $morePhotoFeatures = Post::PostType(PostType::PHOTO_FEATURE)
            ->PostStatus('publish')
            ->where('id', '!=', $post->id)
            ->with('postMeta:id,post_id,meta_key,meta_value')
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.single-photo-feature', compact('post', 'postMeta', 'gallery', 'documents', 'morePhotoFeatures','author'));
    }
}
