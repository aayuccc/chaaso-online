<?php

namespace App\Repositories;

use App\Traits\ImageFieldTrait;

class AdsRepository
{
    use ImageFieldTrait;

    public function processMetaData($payload, $request)
    {
        $metaDatas = [];

        // Every ad has only an image and a URL: [image key, url key]
        $ads = [
            // navbar
            ['navbar_img',               'navbar_url'],

            // homepage short
            ['after_jiwansaili',         'after_jiwansaili_url'],
            ['after_sikshya',            'after_sikshya_url'],
            ['after_tourism',            'after_tourism_url'],

            // homepage long
            ['below_highlighted_img',    'highlighted_ad_url'],
            ['below_rajniti_ad',         'below_rajniti_ad_url'],
            ['between_sports_img',       'between_sports_url'],
            ['before_it_img',            'before_it_url'],
            ['after_it_img',             'after_it_url'],
            ['after_interview_img',      'after_interview_url'],
            ['after_video_img',          'after_video_url'],
            ['before_photo_img',         'before_photo_url'],
            ['before_footer_img',        'before_footer_url'],

            // single page long
            ['after_relatednews_long',   'after_relatednews_long_url'],

            // category long
            ['after_featured_news',      'after_featured_news_url'],
            ['between_category_news',    'between_category_news_url'],
            ['sidebar_category_long',    'sidebar_category_long_url'],
        ];

        foreach ($ads as [$img, $url]) {
            $metaDatas[$img] = $request->input($img) ?? null;
            $metaDatas[$url] = $request->input($url) ?? null;
        }

        // Repeaters (single page short / category short). Each row: image, link. Whole array is serialized.
        $metaDatas['before_sports'] = $request->before_sports ? serialize($request->before_sports) : null;
        $metaDatas['before_videos'] = $request->before_videos ? serialize($request->before_videos) : null;

        $metaDatas['header_popup_ads'] = $request->header_popup_ads ? serialize($request->header_popup_ads) : null;
        $metaDatas['below_masthead_ads'] = $request->below_masthead_ads ? serialize($request->below_masthead_ads) : null;

        // insert or update meta data
        foreach ($metaDatas as $key => $value) {
            $this->updateOrCreateMeta($payload, $key, $value);
        }
    }

    // update Or insert data
    private function updateOrCreateMeta($setting, $key, $value)
    {
        $setting->updateOrInsert(['setting_name' => $key], ['setting_value' => $value]);
    }

    public function index($payload)
    {
        $data = $payload->pluck('setting_value', 'setting_name')->toArray();

        return $data;
    }
}