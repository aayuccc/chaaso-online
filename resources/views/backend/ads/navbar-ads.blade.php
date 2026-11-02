<div class="tab-pane fade {{ !request()->has('tab') || request()->query('tab') == 'navbar' ? 'active show' : '' }}" id="navbar"
    role="tabpanel" aria-labelledby="navbar-tab">
    @include('backend.ads.partials.ad-image-url', ['label' => 'Navbar Ad', 'img' => 'navbar_img', 'url' => 'navbar_url'])
</div>