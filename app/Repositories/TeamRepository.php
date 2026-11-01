<?php

namespace App\Repositories;

use App\Models\Category;

class TeamRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['designation'] = isset( $request->designation ) ? $request->designation : NULL;
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
