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
        $metaDatas['adv_email_address'] = $request->adv_email_address ?? null;
        $metaDatas['complaint_email_address'] = $request->complaint_email_address ?? null;
        $metaDatas['address'] = $request->address ?? null;
        $metaDatas['working_hour'] = $request->working_hour ?? null;
        $metaDatas['registration_number'] = $request->registration_number ?? null;

        // Social Medias
        $metaDatas['facebook'] = $request->facebook ?? null;
        $metaDatas['twitter'] = $request->twitter ?? null;
        $metaDatas['linkedin'] = $request->linkedin ?? null;
        $metaDatas['youtube'] = $request->youtube ?? null;
        $metaDatas['instagram'] = $request->instagram ?? null;
        $metaDatas['tiktok'] = $request->tiktok ?? null;

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
