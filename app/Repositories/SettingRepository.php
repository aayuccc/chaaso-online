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
        $metaDatas['header_main_menu'] = $request->header_main_menu ?? null;

        // Footer
        $metaDatas['footer_logo'] = $request->footer_logo ?? null;
        $metaDatas['footer_title'] = $request->footer_title ?? null;
        $metaDatas['footer_widget_first'] = $request->footer_widget_first ?? null;

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
        $metaDatas['map_link'] = $request->map_link ?? null;
        $metaDatas['map_url'] = $request->map_url ?? null;

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
