<div class="tab-pane fade {{ request()->query('tab') == 'homepage-long' ? 'active show' : '' }}" id="homepage-long"
    role="tabpanel" aria-labelledby="homepage-long-tab">
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Highlighted News Ad', 'img' => 'below_highlighted_img', 'url' => 'highlighted_ad_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Below Rajiniti News Ad', 'img' => 'below_rajniti_ad', 'url' => 'below_rajniti_ad_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Between Sports Ad', 'img' => 'between_sports_img', 'url' => 'between_sports_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Before IT Ad', 'img' => 'before_it_img', 'url' => 'before_it_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'After IT Ad', 'img' => 'after_it_img', 'url' => 'after_it_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Interview Ad', 'img' => 'after_interview_img', 'url' => 'after_interview_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'After Video Ad', 'img' => 'after_video_img', 'url' => 'after_video_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Before Photo Feature Ad', 'img' => 'before_photo_img', 'url' => 'before_photo_url'])
    @include('backend.ads.partials.ad-image-url', ['label' => 'Before Footer Ad', 'img' => 'before_footer_img', 'url' => 'before_footer_url'])
</div>