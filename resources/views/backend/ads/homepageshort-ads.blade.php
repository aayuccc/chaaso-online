<div class="tab-pane fade {{ request()->query('tab') == 'homepage-short' ? 'active show' : '' }}" id="homepage-short"
    role="tabpanel" aria-labelledby="homepage-short-tab">
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Jiwansaili News Ad', 'img' => 'after_jiwansaili', 'url' => 'after_jiwansaili_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Sikshya News Ad', 'img' => 'after_sikshya', 'url' => 'after_sikshya_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Tourism News Ad', 'img' => 'after_tourism', 'url' => 'after_tourism_url'])
</div>