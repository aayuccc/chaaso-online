<?php

namespace App\Repositories;

use App\Traits\ImageFieldTrait;

class AdsRepository
{
    use ImageFieldTrait;

    public function processMetaData($payload, $request)
    {
        $metaDatas = [];

        /*
         * Every ad block has the same 6 fields:
         * brand logo, title, subtitle, ad image, button url, button text.
         * Each block below maps those 6 fields to the form input / meta key names.
         */
        $ads = [];

        // Blocks that follow the standard naming: {prefix}_brand, _ad_title, _ad_subtitle, _img, _url, _cta_text
        $standardPrefixes = [
            'navbar',           // navbar ads
            'between_sports',   // homepage long: between sports
            'before_it',        // homepage long: before IT
            'after_it',         // homepage long: after IT
            'after_interview',  // homepage long: after interview
            'after_video',      // homepage long: after video
            'before_photo',     // homepage long: before photo
            'before_footer',    // homepage long: before footer
        ];

        foreach ($standardPrefixes as $prefix) {
            $ads[] = $this->standardKeys($prefix);
        }

        // Blocks that keep their older image / url key names (so saved data still loads)
        $legacyImageUrlBlocks = [
            // [prefix, image key, url key]
            ['after_jiwansaili',        'after_jiwansaili',        'after_jiwansaili_url'],        // homepage short
            ['after_sikshya',           'after_sikshya',           'after_sikshya_url'],
            ['after_tourism',           'after_tourism',           'after_tourism_url'],
            ['after_relatednews_long',  'after_relatednews_long',  'after_relatednews_long_url'],  // single page long
            ['after_featured_news',     'after_featured_news',     'after_featured_news_url'],     // category long
            ['between_category_news',   'between_category_news',   'between_category_news_url'],
            ['sidebar_category_long',   'sidebar_category_long',   'sidebar_category_long_url'],
        ];

        foreach ($legacyImageUrlBlocks as [$prefix, $img, $url]) {
            $ads[] = $this->standardKeys($prefix, $img, $url);
        }

        // Homepage long: below highlight (brand + image are new)
        $ads[] = [
            'brand'    => 'below_highlighted_brand',
            'title'    => 'below_highlighted_ad_title',
            'subtitle' => 'below_highlighted_ad_subtitle',
            'img'      => 'below_highlighted_img',
            'url'      => 'highlighted_ad_url',
            'cta'      => 'highlighted_ad_cta_text',
        ];

        // Homepage long: below rajniti
        $ads[] = [
            'brand'    => 'brand_logo_rajniti',
            'title'    => 'below_rajniti_ad_title',
            'subtitle' => 'below_rajniti_ad_subtitle',
            'img'      => 'below_rajniti_ad',
            'url'      => 'below_rajniti_ad_url',
            'cta'      => 'below_rajniti_ad_cta_text',
        ];

        foreach ($ads as $keys) {
            $metaDatas[$keys['brand']]    = $request->input($keys['brand']) ?? 0;
            $metaDatas[$keys['title']]    = $request->input($keys['title']) ?? null;
            $metaDatas[$keys['subtitle']] = $request->input($keys['subtitle']) ?? null;
            $metaDatas[$keys['img']]      = $request->input($keys['img']) ?? null;
            $metaDatas[$keys['url']]      = $request->input($keys['url']) ?? null;
            $metaDatas[$keys['cta']]      = $request->input($keys['cta']) ?? null;
        }

        // Repeaters (single page short / category short).
        // Each row holds: brand, title, subtitle, image, link, cta_text. The whole array is serialized,
        // so the new row keys are saved automatically.
        $metaDatas['header_popup_ads'] = $request->header_popup_ads ? serialize($request->header_popup_ads) : null;
        $metaDatas['below_masthead_ads'] = $request->below_masthead_ads ? serialize($request->below_masthead_ads) : null;

        // insert or update meta data
        foreach ($metaDatas as $key => $value) {
            $this->updateOrCreateMeta($payload, $key, $value);
        }
    }

    /**
     * Build the 6-field key map for a block.
     * $img / $url default to the standard {prefix}_img / {prefix}_url names.
     */
    private function standardKeys(string $prefix, ?string $img = null, ?string $url = null): array
    {
        return [
            'brand'    => $prefix . '_brand',
            'title'    => $prefix . '_ad_title',
            'subtitle' => $prefix . '_ad_subtitle',
            'img'      => $img ?? $prefix . '_img',
            'url'      => $url ?? $prefix . '_url',
            'cta'      => $prefix . '_cta_text',
        ];
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