<div class="tab-pane fade {{ request()->query('tab') == 'category-long-ads' ? 'active show' : '' }}" id="category-long-ads"
    role="tabpanel" aria-labelledby="category-long-ads-tab">
    @include('backend.ads.partials.ad-fields', [
        'label' => 'After Featured News Ad',
        'keys' => [
            'brand'    => 'after_featured_news_brand',
            'title'    => 'after_featured_news_ad_title',
            'subtitle' => 'after_featured_news_ad_subtitle',
            'img'      => 'after_featured_news',
            'url'      => 'after_featured_news_url',
            'cta'      => 'after_featured_news_cta_text',
        ],
    ])
    @include('backend.ads.partials.ad-fields', [
        'label' => 'Between News Ad',
        'keys' => [
            'brand'    => 'between_category_news_brand',
            'title'    => 'between_category_news_ad_title',
            'subtitle' => 'between_category_news_ad_subtitle',
            'img'      => 'between_category_news',
            'url'      => 'between_category_news_url',
            'cta'      => 'between_category_news_cta_text',
        ],
    ])
    @include('backend.ads.partials.ad-fields', [
        'label' => 'Sidebar Ad',
        'keys' => [
            'brand'    => 'sidebar_category_long_brand',
            'title'    => 'sidebar_category_long_ad_title',
            'subtitle' => 'sidebar_category_long_ad_subtitle',
            'img'      => 'sidebar_category_long',
            'url'      => 'sidebar_category_long_url',
            'cta'      => 'sidebar_category_long_cta_text',
        ],
    ])
</div>