<?php

namespace App\Repositories;

class AboutRepository
{
     public function processMetaData($payload, $request)
    {
        $metaDatas = [];
        $metaDatas['about_editor'] = isset( $request->about_editor ) ? $request->about_editor : NULL;
        $metaDatas['editor_designation'] = isset( $request->editor_designation ) ? $request->editor_designation : NULL;
        $metaDatas['registration_number'] = isset( $request->registration_number ) ? $request->registration_number : NULL;
        $metaDatas['editor_quote'] = isset( $request->editor_quote ) ? $request->editor_quote : NULL;
        $metaDatas['editor_image'] = isset($request->editor_image) ? $request->editor_image : NULL;
        $metaDatas['first_additional_image'] = isset($request->first_additional_image) ? $request->first_additional_image : NULL;
        $metaDatas['second_additional_image'] = isset($request->second_additional_image) ? $request->second_additional_image : NULL;

        $metaDatas['feature'] = isset($request->feature) ? serialize($request->feature) : null;

        $metaDatas['values_feature'] = isset($request->values_feature) ? serialize($request->values_feature) : null;

        $metaDatas['values_step'] = isset($request->values_step) ? serialize($request->values_step) : null;

        $metaDatas['featured_image'] = isset($request->featured_image) ?  $request->featured_image : NULL;
       
        $metaDatas['seo_keyword'] = isset($request->seo_keyword) ? $request->seo_keyword : NULL;
        $metaDatas['seo_title'] = isset($request->seo_title) ? $request->seo_title : NULL;
        $metaDatas['seo_description'] = isset($request->seo_description) ? $request->seo_description : NULL;

        return $metaDatas;
    }
}