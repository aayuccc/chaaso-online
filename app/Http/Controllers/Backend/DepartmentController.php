<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class DepartmentController extends Controller
{
    private $categoryRepository;
    private $categoryType;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryType = 'department';
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $baseQuery = Category::where('type', $this->categoryType);
        $postsQuery = clone $baseQuery;
        
        switch ($status) {
            case 'trash':
                $postsQuery->onlyTrashed();
                break;
        }

        $trashPosts = $status === 'trash' ? $postsQuery->count() : (clone $baseQuery)->onlyTrashed()->count();
        $all = (clone $baseQuery)->count();

        $type = $this->categoryRepository->encodeType($this->categoryType);

        $categories = Category::with('children')
            ->where('type', $this->categoryType)
            ->where('parent', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('backend.departments.index-department', [
            'status' => $status,
            'all' => $all,
            'trashPosts' => $trashPosts,
            'categories' => $categories,
            'categoryType' => $this->categoryType,
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $type = isset($request->type) ? $this->categoryRepository->decodeType($request->type) : 'NOT FOUND';

        $this->categoryRepository->checkCategoryTypeExists($type);

        try {
            $category = $this->categoryRepository->createCategory($request, $this->categoryType);
            $this->categoryRepository->storeMetaData($category, $request);

            session()->flash('success', 'Department Created.');
            return redirect()->route('backend.department');
        } catch (\Exception $e) {
            session()->flash('error', 'Error While Creating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        $category = Category::where('id', $id)->where('type', $this->categoryType)->firstOrFail();

        $metaDatas = $this->categoryRepository->getMetaDatas($category);

        if ($category == NULL) {
            abort(404);
        }

        $categories = Category::with('children')
            ->where('type', $this->categoryType)
            ->where('id', '!=', $category->id)
            ->where('parent', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('backend.departments.edit-department', [
            'id' => $id,
            'category' => $category,
            'categories' => $categories,
            'metaDatas' => $metaDatas,
            'categoryType' => $this->categoryType,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->where('type', $this->categoryType)->firstOrFail();

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        try {
            $data = $this->categoryRepository->updateCategory($request, $category, $this->categoryType);

            if ($data['status'] && $data['category']) {
                $category = $data['category'];
                $this->categoryRepository->storeMetaData($category, $request);

                session()->flash('success', 'Department Updated.');
                return redirect()->route('backend.department.edit', $category->id);
            } else {
                session()->flash('error', 'Error While Updating: Unable to update the department.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error While Updating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        Category::where('parent', $category->id)->update([
            'parent_id_backup' => $category->id,
            'parent' => 0,
        ]);
        
        $category->delete();

        session()->flash('success', 'Department Deleted.');
        return redirect()->back();
    }

    public function restructure(Request $request, $id)
    {
        $category = Category::where('id', $id)->where('type', $this->categoryType)->findOrFail($id);
        try {
            $posts = \App\Models\Post::whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
            ->with('categories')
            ->postType('team')
            ->orderBy('menu_order', 'ASC')
            ->orderBy('post_title', 'ASC')
            ->get();

            return view('backend.departments.restructure-department', [
                'posts' => $posts,
                'cat' => $category,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Error While Loading: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }
}
