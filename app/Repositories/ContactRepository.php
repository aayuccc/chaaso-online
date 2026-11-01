<?php

namespace App\Repositories;

class ContactRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $metaDatas = [];

        $metaDatas['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;

        // add more meta metaDatas
        $metaDatas['faq'] = isset($request->faq) ? serialize($request->faq) : NULL;

        return $metaDatas;
    }
}