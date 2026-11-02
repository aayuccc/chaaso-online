<div class="tab-pane fade {{ request()->query('tab') == 'homepage-short' ? 'active show' : '' }}" id="homepage-short"
    role="tabpanel" aria-labelledby="homepage-short-tab">
    @include('backend.ads.partials.ad-fields', [
        'label' => 'After Jiwansaili News Ad',
        'keys' => [
            'brand'    => 'after_jiwansaili_brand',
            'title'    => 'after_jiwansaili_ad_title',
            'subtitle' => 'after_jiwansaili_ad_subtitle',
            'img'      => 'after_jiwansaili',
            'url'      => 'after_jiwansaili_url',
            'cta'      => 'after_jiwansaili_cta_text',
        ],
    ])
    @include('backend.ads.partials.ad-fields', [
        'label' => 'After Sikshya News Ad',
        'keys' => [
            'brand'    => 'after_sikshya_brand',
            'title'    => 'after_sikshya_ad_title',
            'subtitle' => 'after_sikshya_ad_subtitle',
            'img'      => 'after_sikshya',
            'url'      => 'after_sikshya_url',
            'cta'      => 'after_sikshya_cta_text',
        ],
    ])
    @include('backend.ads.partials.ad-fields', [
        'label' => 'After Tourism News Ad',
        'keys' => [
            'brand'    => 'after_tourism_brand',
            'title'    => 'after_tourism_ad_title',
            'subtitle' => 'after_tourism_ad_subtitle',
            'img'      => 'after_tourism',
            'url'      => 'after_tourism_url',
            'cta'      => 'after_tourism_cta_text',
        ],
    ])
</div>