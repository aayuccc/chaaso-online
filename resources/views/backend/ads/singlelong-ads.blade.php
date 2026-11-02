<div class="tab-pane fade {{ request()->query('tab') == 'news-single' ? 'active show' : '' }}" id="news-single"
    role="tabpanel" aria-labelledby="news-single-tab">
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Sidebar Related News Ad', 'img' => 'after_relatednews_long', 'url' => 'after_relatednews_long_url'])
</div>