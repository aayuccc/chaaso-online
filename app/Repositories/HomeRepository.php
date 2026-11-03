<?php

namespace App\Repositories;

use App\Models\Category;

class HomeRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        // dd( $request->all() );
        $data = [];
        $data['rajniti_cat'] = isset($request->rajniti_cat) ? $request->rajniti_cat : NULL;
        $data['commerce_cat'] = isset($request->commerce_cat) ? $request->commerce_cat : NULL;
        $data['lifestyle_cat'] = isset($request->lifestyle_cat) ? $request->lifestyle_cat : NULL;
        $data['sports_cat'] = isset($request->sports_cat) ? $request->sports_cat : NULL;
        $data['education_cat'] = isset($request->education_cat) ? $request->education_cat : NULL;
        $data['province_cat'] = isset($request->province_cat) ? $request->province_cat : NULL;
        $data['tourism_cat'] = isset($request->tourism_cat) ? $request->tourism_cat : NULL;
        $data['it_tech_cat'] = isset($request->it_tech_cat) ? $request->it_tech_cat : NULL;
        $data['interview_cat'] = isset($request->interview_cat) ? $request->interview_cat : NULL;
        $data['idea_cat'] = isset($request->idea_cat) ? $request->idea_cat : NULL;
        $data['video_cat'] = isset($request->video_cat) ? $request->video_cat : NULL;
        $data['share_cat'] = isset($request->share_cat) ? $request->share_cat : NULL;
        $data['auto_cat'] = isset($request->auto_cat) ? $request->auto_cat : NULL;
        $data['agriculture_cat'] = isset($request->agriculture_cat) ? $request->agriculture_cat : NULL;

        // add more meta data
        return $data;
    }
}
