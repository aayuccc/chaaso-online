<?php

namespace App\Repositories;

use App\Models\Media;
use Illuminate\Support\Collection;

class PhotoFeatureRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['document'] = isset($request->document) ? serialize($request->document) : null;
        // $data['short_desc'] = isset( $request->short_desc ) ? $request->short_desc : NULL;
        // $data['photographer'] = isset( $request->photographer ) ? $request->photographer : NULL;
        $data['photo_location'] = isset( $request->photo_location ) ? $request->photo_location : NULL;
        $data['seo_title'] = isset( $request->seo_title ) ? $request->seo_title : NULL;
        $data['seo_description'] = isset( $request->seo_description ) ? $request->seo_description : NULL;
        // add more meta data

        return $data;
    }

    // gallery media in the order they were picked, skipping deleted files
    public function getGallery($ids): Collection
    {
        $ids = array_values(array_filter(explode(',', (string) $ids)));

        if (empty($ids)) {
            return collect();
        }

        $medias = Media::whereIn('id', $ids)->get()->keyBy('id');

        return collect($ids)->map(fn($id) => $medias->get($id))->filter()->values();
    }

    // repeater rows (image + title) with their media, skipping rows without a valid image
    public function getDocumentItems($document): Collection
    {
        $items = is_string($document) ? @unserialize($document) : $document;

        if (!is_array($items)) {
            return collect();
        }

        $medias = Media::whereIn('id', array_filter(array_column($items, 'image')))->get()->keyBy('id');

        return collect($items)
            ->map(function ($item) use ($medias) {
                $media = $medias->get($item['image'] ?? null);

                return $media ? ['media' => $media, 'title' => $item['title'] ?? ''] : null;
            })
            ->filter()
            ->values();
    }

    // "3,,5, 3" -> "3,5"
    private function cleanIds($ids)
    {
        $ids = array_unique(array_filter(array_map('trim', explode(',', $ids))));

        return empty($ids) ? NULL : implode(',', $ids);
    }
}
