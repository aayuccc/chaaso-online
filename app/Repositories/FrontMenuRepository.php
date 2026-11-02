<?php

namespace App\Repositories;

use App\Helpers\PostHelper;
use App\Helpers\CategoryHelper;

class FrontMenuRepository
{
    // nested tree of a nav_menu: [title, link, target, classes, icon, attr, is_active, children]
    public function getMenuTree($menuId)
    {
        if ( !$menuId ) return [];

        $menu = CategoryHelper::getModel()
            ->where(['id' => $menuId, 'type' => 'nav_menu'])
            ->with(['posts' => function ($query) {
                $query->where('post_type', 'nav_menu_item')->with('postMeta');
            }])
            ->first();

        if ( !$menu ) return [];

        $items = $menu->posts->sortBy('menu_order')->map(function ($item) {
            return [
                'item' => $item,
                'meta' => $item->postMeta->pluck('meta_value', 'meta_key')->toArray(),
            ];
        });

        // preload linked objects to avoid a query per item
        $objectIds = $items->pluck('meta.menu_item_object_id')->filter()->unique();
        $categories = CategoryHelper::getModel()->whereIn('id', $objectIds)->get()->keyBy('id');
        $posts = PostHelper::getModel()->whereIn('id', $objectIds)->where('post_status', 'publish')->get()->keyBy('id');

        $grouped = $items->groupBy(fn ($row) => (int) ($row['meta']['menu_item_parent_id'] ?? 0));

        return $this->buildBranch($grouped, 0, $categories, $posts);
    }

    private function buildBranch($grouped, $parentId, $categories, $posts)
    {
        $branch = [];

        foreach ($grouped->get($parentId, []) as $row) {
            $link = $this->resolveLink($row['meta'], $categories, $posts);

            if ( $link === null ) continue;

            // classes starting with "bi-" are used as bootstrap icons, the rest as css classes
            $classes = collect(preg_split('/\s+/', trim($row['meta']['menu_item_classes'] ?? '')))->filter();
            $icon = $classes->first(fn ($class) => str_starts_with($class, 'bi-'));

            $branch[] = [
                'id'        => $row['item']->id,
                'title'     => $row['meta']['menu_item_custom_title'] ?? null ?: $row['item']->post_title,
                'link'      => $link,
                'target'    => $row['meta']['menu_item_target'] ?? null ?: '_self',
                'classes'   => $classes->reject(fn ($class) => $class === $icon)->implode(' '),
                'icon'      => $icon,
                'attr'      => $row['meta']['menu_item_attr_title'] ?? null,
                'is_active' => $this->isActiveLink($link),
                'children'  => $this->buildBranch($grouped, $row['item']->id, $categories, $posts),
            ];
        }

        return $branch;
    }

    private function resolveLink($meta, $categories, $posts)
    {
        $object = $meta['menu_item_object'] ?? null;
        $objectId = $meta['menu_item_object_id'] ?? null;

        if ( $object === 'custom' ) {
            return $meta['menu_item_url'] ?? null ?: '#';
        }

        if ( $object === 'category' ) {
            $category = $categories->get($objectId);
            return $category ? route('frontend.category.index', $category->slug) : null;
        }

        if ( $object === 'page' ) {
            $page = $posts->get($objectId);
            return $page ? route('frontend.post.index', $page->slug) : null;
        }

        if ( in_array($object, ['post', 'news']) ) {
            $post = $posts->get($objectId);
            return $post ? route('frontend.news.show', $post->id) : null;
        }

        return null;
    }

    private function isActiveLink($link)
    {
        if ( !$link || $link === '#' ) return false;

        $path = trim(parse_url($link, PHP_URL_PATH) ?? '', '/');

        return $path === '' ? request()->is('/') : request()->is($path, $path.'/*');
    }

    public function checkTypeOfMenuItem($type, $menu, $meta)
    {
        if ( $type == 'category') {

            $menuItem = CategoryHelper::getModel()
            ->where(['id' => $meta['menu_item_object_id'], 'type' => 'category'])
            ->first();
            $menuTitle = $menu->post_title;
            $menuLink = route($meta['menu_item_route'], $menuItem->slug);
            $menuCSS = isset($meta['menu_item_classes']) ? $meta['menu_item_classes'] : '';
            $menuTarget = isset($meta['menu_item_target']) ? $meta['menu_item_target'] : '_self';

            return [
                'title' => $menuTitle,
                'link' => $menuLink,
                'css' => $menuCSS,
                'target' => $menuTarget,
            ];
        }

        if ( $type == 'page' ) {

            $menuItem = PostHelper::getModel()
            ->where(['id' => $meta['menu_item_object_id'], 'post_type' => 'page'])
            ->first();
            $menuTitle = $menu->post_title;
            $menuLink = route($meta['menu_item_route'], $menuItem->slug);
            $menuCSS = isset($meta['menu_item_classes']) ? $meta['menu_item_classes'] : '';
            $menuTarget = isset($meta['menu_item_target']) ? $meta['menu_item_target'] : '_self';

            return [
                'title' => $menuTitle,
                'link' => $menuLink,
                'css' => $menuCSS,
                'target' => $menuTarget,
            ];
        }

        if ( $type == 'post' ) {

            $menuItem = PostHelper::getModel()
            ->where(['id' => $meta['menu_item_object_id'], 'post_type' => 'post'])
            ->first();
            $menuTitle = $menu->post_title;
            $menuLink = route($meta['menu_item_route'], $menuItem->id);
            $menuCSS = isset($meta['menu_item_classes']) ? $meta['menu_item_classes'] : '';
            $menuTarget = isset($meta['menu_item_target']) ? $meta['menu_item_target'] : '_self';

            return [
                'title' => $menuTitle,
                'link' => $menuLink,
                'css' => $menuCSS,
                'target' => $menuTarget,
            ];
        }

        if ( $type == 'custom' ) {
            $menuItem = PostHelper::getModel()
            ->where(['id' => $meta['menu_item_object_id'], 'post_type' => 'nav_menu_item'])
            ->first();
            $menuTitle = $menuItem->post_title;
            $menuLink = isset($meta['menu_item_url']) ? $meta['menu_item_url'] : '#';
            $menuCSS = isset($meta['menu_item_classes']) ? $meta['menu_item_classes'] : '';
            $menuTarget = isset($meta['menu_item_target']) ? $meta['menu_item_target'] : '_self';

            return [
                'title' => $menuTitle,
                'link' => $menuLink,
                'css' => $menuCSS,
                'target' => $menuTarget,
            ];
        }
    }

    public function menuItemHasChildren($parent)
    {
        $children = PostHelper::getModel()->PostType('nav_menu_item')
        ->whereHas('postMeta', function ($query) use ($parent) {
            $query->where('meta_key', 'menu_item_parent_id')->where('meta_value', $parent->id);
        })
        ->orderBy('menu_order', 'ASC')
        ->get();

        if ( $children->isNotEmpty() ) {
            return $children;
        }

        return [];
    }
}
