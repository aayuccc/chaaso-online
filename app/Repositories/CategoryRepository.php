<?php

namespace App\Repositories;

use App\Models\Category;
use App\Enums\CategoryType;
use App\Traits\SlugGenerateTrait;

class CategoryRepository
{
    use SlugGenerateTrait;

    // check post type exists or not
    public function checkCategoryTypeExists($type)
    {
        if ( !in_array( $type, CategoryType::toArray() ) )
        {
            abort(403, 'Post Type Not Found');
        }

        return true;
    }

    public function getCategoryByType($type)
    {
        return Category::where('type', $type)->get();
    }

    public function createCategory($request, $type)
    {
        $model = new Category();

        $cat = Category::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => $this->createSlug( $request->name, $request->slug, $model),
            'type' => $type,
            'description' => isset($request->description) ?  $request->description : NULL,
            'parent' => isset($request->parent) ?  $request->parent : 0,
            'menu_order' => isset($request->menu_order) ?  $request->menu_order : 0,
        ]);

        return $cat;
    }

    public function updateCategory($request, $payload, $type)
    {
        $category = $payload;

        $status = $category->update([
            'name' => $request->name,
            'slug' => $this->getSlug( $category, $request->name, $request->slug),
            'type' => $type,
            'description' => isset($request->description) ?  $request->description : NULL,
            'parent' => isset($request->parent) ?  $request->parent : 0,
            'menu_order' => isset($request->menu_order) ?  $request->menu_order : 0,
        ]);

        return [ 'status' => $status, 'category' => $category];
    }

    // make post type base64_encode
    public function encodeType($type)
    {
        return base64_encode($type);
    }

    // make post type base64_decode
    public function decodeType($type)
    {
        return base64_decode($type);
    }

    public function getMetaDatas($payload)
    {
        return $payload->categoryMeta->pluck('meta_value', 'meta_key')->toArray();
    }

    public function storeMetaData($payload, $request)
    {
        $metaDatas = [];
        $metaDatas['seo_title'] = $request->seo_title ?? null;
        $metaDatas['seo_description'] = $request->seo_description ?? null;
        // $metaDatas['nepali_title'] = $request->nepali_title ?? null;
        // $metaDatas['common_banner_image'] = $request->common_banner_image ?? null;
        // $metaDatas['theme_color'] = $request->theme_color ?? null;

        // add meta data as per form data

        // insert or update meta data
        foreach ($metaDatas as $key => $value) {
            $this->updateOrCreateMeta($payload, $key, $value);
        }
    }

    // update or create category meta
    public function updateOrCreateMeta($category, $key, $value)
    {
        $category->categoryMeta()->updateOrInsert(
            ['category_id' => $category->id, 'meta_key' => $key],
            ['meta_value' => $value]
        );
    }

    // restore posts
    public function restoreCategory($id)
    {
        $cat = Category::withTrashed()->findOrFail($id);

        if ( !empty( $cat ) ) {
            $cat->restore();
            Category::where('parent_id_backup', $cat->id)->update([
                'parent' => $cat->id,
                'parent_id_backup' => null
            ]);
        }

        return true;
    }

    public function permanentDeleteCategory($id)
    {
        $cat = Category::withTrashed()->findOrFail($id);

        if ( !empty( $cat ) ) {
            
            Category::where('parent_id_backup', $cat->id)->update([
                'parent_id_backup' => null,
            ]);

            $cat->forceDelete();
        }

        return true;
    }
}
