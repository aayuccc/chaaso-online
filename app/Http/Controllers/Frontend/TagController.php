<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class TagController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index($slug)
    {
        $cat = Category::where(['slug' => $slug, 'type' => 'tag'])->firstOrFail();

        $catMeta = $this->categoryRepository->getMetaDatas($cat);

        // 3 featured + 12 in the list
        $posts = $cat->posts()
            ->with(['postMeta:id,post_id,meta_key,meta_value', 'user:id,name'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $items         = $posts->getCollection();
        $featuredPosts = $items->take(3);
        $listPosts     = $items->slice(3);

        // same layout as the category page
        return view('frontend.category-tag', compact('cat', 'posts', 'catMeta', 'featuredPosts', 'listPosts'));
    }
}
