<div class="tab-pane fade {{ request()->query('tab') == 'homepage-long' ? 'active show' : '' }}" id="homepage-long"
    role="tabpanel" aria-labelledby="homepage-long-tab">
    @include('backend.ads.belowhighlight-ads')
    @include('backend.ads.belowrajniti-ads')
    @include('backend.ads.betweensports-ads')
    @include('backend.ads.beforeit-ads')
    @include('backend.ads.afterit-ads')
    @include('backend.ads.afterinterview-ads')
    @include('backend.ads.aftervideo-ads')
    @include('backend.ads.beforephoto-ads')
    @include('backend.ads.beforefooter-ads')
</div>