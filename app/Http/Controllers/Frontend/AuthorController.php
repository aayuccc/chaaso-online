<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class AuthorController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index($slug)
    {
        $cat = Category::where([ 'slug' => $slug, 'type' => 'author' ])->firstOrFail();

        $catMeta = $this->categoryRepository->getMetaDatas($cat);

        $posts = $cat->posts()
            ->with(['postMeta:id,post_id,meta_key,meta_value', 'user:id,name'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('frontend.category-author', compact(['cat', 'posts', 'catMeta']) );
    }
}
