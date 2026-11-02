<div class="tab-pane fade {{ request()->query('tab') == 'category-long-ads' ? 'active show' : '' }}" id="category-long-ads"
    role="tabpanel" aria-labelledby="category-long-ads-tab">
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Featured News Ad', 'img' => 'after_featured_news', 'url' => 'after_featured_news_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Between News Ad', 'img' => 'between_category_news', 'url' => 'between_category_news_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Sidebar Ad', 'img' => 'sidebar_category_long', 'url' => 'sidebar_category_long_url'])
</div>