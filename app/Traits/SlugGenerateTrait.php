<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\Post;

trait SlugGenerateTrait
{
    // create newly post
    public function createSlug($name, $slug, $model)
    {
        // Convert the form-provided slug to lowercase and replace white spaces with hyphens
        $slug = Str::slug(strtolower($slug));

        // Check if the form-provided slug exists in the database
        // if (empty($slug) && !$this->slugExists($model, $slug)) {
        if ( empty($slug) ) {

            $slug = Str::slug($name);

            while ($this->slugExists($model, $slug)) {
                $slug = $this->generateUniqueSlugCreate($slug, $model);
            }
        }
        else {
            while ($this->slugExists($model, $slug)) {
                $slug = $this->generateUniqueSlugCreate($slug, $model);
            }
        }

        return $slug;
    }

    private function generateUniqueSlugCreate($originalSlug, $model)
    {
        // Split the original slug and its number suffix
        preg_match('/^(.*?)(?:-(\d+))?$/', $originalSlug, $matches);

        $baseSlug = $matches[1] ?? ''; // Extract base slug
        $suffix = isset($matches[2]) ? (int)$matches[2] : 1; // Extract the numeric suffix

        // Find the next available suffix
        $nextSuffix = $this->findNextSuffixCreate($baseSlug, $suffix, $model);

        // Generate the new slug
        return $baseSlug . '-' . $nextSuffix;
    }

    private function findNextSuffixCreate($baseSlug, $currentSuffix, $model)
    {
        $nextSuffix = $currentSuffix + 1;

        // Check if the next suffix is already taken
        while ($this->slugExists($model, $baseSlug . '-' . $nextSuffix)) {
            $nextSuffix++;
        }

        return $nextSuffix;
    }


    // edit existing posts
    public function getSlug($payload, $name, $slug)
    {
        $slug = Str::slug(strtolower($slug));

        // check if empty
        if ( empty( $slug ) ) {
            $slug = Str::slug(strtolower($name));
        }

        // check if slug was same
        if ( $slug == $payload->slug ) {
            return $slug;
        }

        // Check if the form-provided slug exists in the database
        if ( $this->slugExists($payload, $slug) ) {
            $slug = $this->generateUniqueSlug($slug, $payload);
        }

        return $slug;
    }

    private function generateUniqueSlug($originalSlug, $payload)
    {
        // Split the original slug and its number suffix
        preg_match('/^(.*?)(?:-(\d+))?$/', $originalSlug, $matches);

        $baseSlug = $matches[1] ?? ''; // Extract base slug
        $suffix = isset($matches[2]) ? (int)$matches[2] : 1; // Extract the numeric suffix

        // Find the next available suffix
        $nextSuffix = $this->findNextSuffix($baseSlug, $suffix, $payload);

        // Generate the new slug
        return $baseSlug . '-' . $nextSuffix;
    }

    private function findNextSuffix($baseSlug, $currentSuffix, $payload)
    {
        $nextSuffix = $currentSuffix + 1;

        // Check if the next suffix is already taken
        while ($this->slugExists($payload, $baseSlug . '-' . $nextSuffix)) {
            $nextSuffix++;
        }

        return $nextSuffix;
    }

    // check slug against all rows, including soft deleted ones (unique index covers them too)
    private function slugExists($model, $slug)
    {
        $query = $model->newQuery();

        if ( method_exists($query, 'withTrashed') ) {
            $query->withTrashed();
        }

        return $query->where('slug', $slug)->exists();
    }

}
