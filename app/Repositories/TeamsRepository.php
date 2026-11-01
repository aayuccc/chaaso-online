<?php

namespace App\Repositories;

use App\Models\Category;

class TeamsRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['chiefeditor_name'] = isset( $request->chiefeditor_name ) ? $request->chiefeditor_name : NULL;
        $data['chiefeditor_exp'] = isset( $request->chiefeditor_exp ) ? $request->chiefeditor_exp : NULL;
        $data['chiefeditor_topic'] = isset( $request->chiefeditor_topic ) ? $request->chiefeditor_topic : NULL;
        $data['chiefeditor_lang'] = isset( $request->chiefeditor_lang ) ? $request->chiefeditor_lang : NULL;
        $data['facebook'] = isset( $request->facebook ) ? $request->facebook : NULL;
        $data['instagram'] = isset( $request->instagram ) ? $request->instagram : NULL;
        $data['twitter'] = isset( $request->twitter ) ? $request->twitter : NULL;
        $data['youtube'] = isset( $request->youtube ) ? $request->youtube : NULL;
        $data['tiktok'] = isset( $request->tiktok ) ? $request->tiktok : NULL;
        $data['team_email'] = isset( $request->team_email ) ? $request->team_email : NULL;

        // add more meta data

        return $data;
    }
}
