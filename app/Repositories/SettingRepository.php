<?php

namespace App\Repositories;

use App\Traits\ImageFieldTrait;

class SettingRepository
{
    use ImageFieldTrait;

    public function index($payload)
    {
        $data = $payload->pluck('setting_value', 'setting_name')->toArray();

        return $data;
    }

    public function storeOrUpdate($payload, $request)
    {
        $setting = $payload;
        $request = $request;

        $metaDatas = [];

        // header
        $metaDatas['header_logo'] = $request->header_logo ?? null;

        // Footer
        $metaDatas['footer_logo'] = $request->footer_logo ?? null;
        $metaDatas['copyright_text'] = $request->copyright_text ?? null;

        // Info Section
        $metaDatas['email_address'] = $request->email_address ?? null;
        $metaDatas['address'] = $request->address ?? null;
        $metaDatas['phone'] = $request->phone ?? null;

        // Social Medias
        $metaDatas['facebook'] = $request->facebook ?? null;
        $metaDatas['twitter'] = $request->twitter ?? null;
        $metaDatas['linkedin'] = $request->linkedin ?? null;
        $metaDatas['youtube'] = $request->youtube ?? null;

        // add meta data as per form data

        // insert or update meta data
        foreach ($metaDatas as $key => $value) {
            $this->updateOrCreateMeta($setting, $key, $value);
        }
    }

    // update Or insert data
    private function updateOrCreateMeta($setting, $key, $value)
    {
        $setting->updateOrInsert( ['setting_name' => $key], ['setting_value' => $value] );
    }
}
