<div class="tab-pane fade {{ request()->query('tab') == 'news-single' ? 'active show' : '' }}" id="news-single"
    role="tabpanel" aria-labelledby="news-single-tab">
    @include('backend.ads.partials.ad-fields', [
        'label' => 'After Sidebar Related News Ad',
        'keys' => [
            'brand'    => 'after_relatednews_long_brand',
            'title'    => 'after_relatednews_long_ad_title',
            'subtitle' => 'after_relatednews_long_ad_subtitle',
            'img'      => 'after_relatednews_long',
            'url'      => 'after_relatednews_long_url',
            'cta'      => 'after_relatednews_long_cta_text',
        ],
    ])
</div>