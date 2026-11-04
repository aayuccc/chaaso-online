@php
  $mainMenu = app(\App\Repositories\FrontMenuRepository::class)->getMenuTree($settings['header_main_menu'] ?? null);
@endphp
<header class="co-header">
    <div class="container co-container">
      <div class="co-header-top">
        <div class="co-brand">
            @php
            $footer_logo = SettingHelper::get_field('footer_logo');
            $media = $footer_logo ? MediaHelper::getImageById($footer_logo) : null;
            if (!empty($media) && !empty($media->file_name)) {
              $ad_image_url = MediaHelper::WsrvService($media);
            }
            else {
              $ad_image_url = null;
            }
            @endphp
            @if ($ad_image_url)
            <a href="{{ route('frontend.home') }}" class="co-logo"><img src="{{ $ad_image_url }}" alt="चासो अनलाइन" width="200" height="100"></a>@endif
          <div class="co-header-date d-none d-lg-flex">
            <span class="co-date-day">{{ NepaliDateHelper::weekday() }}</span>
            <span class="co-date-full">{{ NepaliDateHelper::format(now()) }}</span>
          </div>
        </div>
      @php
          $websiteName = SettingHelper::get_field('site_title');
      
          $brandId = SettingHelper::get_field('navbar_img');
          $brandmedia = $brandId ? MediaHelper::getImageById($brandId) : null;
          if (!empty($brandmedia) && !empty($brandmedia->file_name)) {
            $ad_image_url = MediaHelper::WsrvService($brandmedia);
          }
          else {
            $ad_image_url = null;
          }
          $ad_link     = SettingHelper::get_field('navbar_url');
      @endphp
      
      @if ($ad_link || $brandmedia)
        <div class="co-ad co-header-ad d-none d-lg-block" data-ad-slot="header">
          <a href="{{ $ad_link }}" class="co-ad-box co-cr co-cr-h co-cr--novanet" rel="sponsored noopener"><span
              class="co-ad-badge">विज्ञापन</span>
              <img class="co-cr-img" src="{{ $ad_image_url ?? asset('assets/images/ads/router.jpg') }}" alt=""
              loading="lazy">
            </a>
        </div>
      @endif

      <!-- mode toolbar -->
        <div class="co-header-tools d-lg-none">
          <button class="co-theme-switch" type="button" role="switch" aria-checked="false" aria-label="डार्क मोड"
            title="लाइट / डार्क मोड" data-theme-toggle>
            <span class="co-switch-knob"></span>
            <i class="bi bi-sun-fill co-switch-sun"></i>
            <i class="bi bi-moon-stars-fill co-switch-moon"></i>
          </button>
        </div>
      </div>

      <div class="co-header-sub d-lg-none">
        <div class="co-header-date-mobile">सोमबार, असोज २६, २०८३ <span class="co-header-sep"></span> <i
            class="bi bi-cloud-sun"></i> काठमाडौं २४°C</div>
        <div class="co-header-actions">
          <button class="co-icon-btn co-search-toggle" type="button" aria-label="खोज्नुहोस्" aria-haspopup="dialog"
            data-search-open>
            <i class="bi bi-search"></i>
          </button>
          <button class="co-icon-btn co-menu-toggle" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#coOffcanvas" aria-controls="coOffcanvas" aria-label="मेनु खोल्नुहोस्">
            <i class="bi bi-list"></i>
          </button>
        </div>
      </div>

    </div>
  </header>

  <!-- Sticky navigation -->
  <div class="co-navbar d-none d-lg-block" id="coNavbar">
    <div class="container co-container">
      <nav class="co-nav" id="coMainNav">
        @php
          $header_logo = SettingHelper::get_field('header_logo');
          $media = $header_logo ? MediaHelper::getImageById($header_logo) : null;
          if (!empty($media) && !empty($media->file_name)) {
            $header_url = MediaHelper::WsrvService($media);
          }
          else {
            $header_url = null;
          }
        @endphp
        @if ($header_url)
        <a href="{{ route('frontend.home') }}" class="co-nav-logo" aria-label="चासो अनलाइन — गृहपृष्ठ" tabindex="-1"><img src="{{ $header_url }}" alt="" width="67" height="66"></a>
        @endif
        <ul class="co-nav-list">
          <li><a href="{{ route('frontend.home') }}" class="co-nav-link co-nav-home {{ request()->is('/') ? 'is-active' : '' }}"
              aria-label="गृहपृष्ठ"><i class="bi bi-house-door"></i></a></li>
          @foreach ($mainMenu as $item)
            @if ($item['children'])
              <li class="co-nav-dropdown">
                <button class="co-nav-link co-nav-dropdown-toggle {{ $item['classes'] }} {{ $item['is_active'] || collect($item['children'])->contains('is_active', true) ? 'is-active' : '' }}"
                  type="button" aria-expanded="false" aria-haspopup="true">
                  {{ $item['title'] }} <i class="bi bi-chevron-down"></i>
                </button>
                <ul class="co-nav-submenu">
                  @foreach ($item['children'] as $child)
                    <li><a href="{{ $child['link'] }}" class="co-nav-sublink {{ $child['classes'] }}"
                        target="{{ $child['target'] }}" @if ($child['attr']) title="{{ $child['attr'] }}" @endif>{{ $child['title'] }}</a></li>
                  @endforeach
                </ul>
              </li>
            @else
              <li><a href="{{ $item['link'] }}" class="co-nav-link {{ $item['classes'] }} {{ $item['is_active'] ? 'is-active' : '' }}"
                  target="{{ $item['target'] }}" @if ($item['attr']) title="{{ $item['attr'] }}" @endif>{{ $item['title'] }}</a></li>
            @endif
          @endforeach
        </ul>
        <div class="co-nav-actions">
          <button class="co-icon-ghost" type="button" aria-label="खोज्नुहोस्" aria-haspopup="dialog" data-search-open>
            <i class="bi bi-search"></i>
          </button>
          <button class="co-theme-switch" type="button" role="switch" aria-checked="false" aria-label="डार्क मोड"
            title="लाइट / डार्क मोड" data-theme-toggle>
            <span class="co-switch-knob"></span>
            <i class="bi bi-sun-fill co-switch-sun"></i>
            <i class="bi bi-moon-stars-fill co-switch-moon"></i>
          </button>
          <a href="#" class="co-tv-btn"><span class="co-live-dot"></span><i class="bi bi-play-btn-fill"></i> चासो TV</a>
        </div>
      </nav>
    </div>
  </div>


  <!-- Search overlay -->
  @php
    $searchRepo = app(\App\Repositories\SearchRepository::class);
    $searchTrending = $searchRepo->trending();
    $searchCats = $searchRepo->overlayCategories();
  @endphp
  <div class="co-so" id="coSearch" hidden>
    <div class="co-so-backdrop" data-search-close></div>
    <div class="co-so-panel" role="dialog" aria-modal="true" aria-label="खोज्नुहोस्">
      <form class="co-so-form" role="search" action="{{ route('frontend.search.store') }}" method="POST">
        @csrf
        <i class="bi bi-search"></i>
        <input class="co-so-input" type="search" name="q" value="{{ request()->routeIs('frontend.search') ? session('search_term') : '' }}"
          placeholder="समाचार, विषय वा व्यक्ति खोज्नुहोस्..." aria-label="खोज्नुहोस्" autocomplete="off" maxlength="100" required>
        <button class="co-so-close" type="button" data-search-close aria-label="बन्द गर्नुहोस्"><kbd>Esc</kbd><i
            class="bi bi-x-lg"></i></button>
      </form>

      <div class="co-so-body">
        @if (count($searchTrending))
          <div class="co-so-group">
            <span class="co-so-label"><i class="bi bi-fire"></i> ट्रेन्डिङ</span>
            <div class="co-so-chips">
              @foreach ($searchTrending as $trend)
                <a href="{{ route('frontend.search.term', $trend) }}">{{ $trend }}</a>
              @endforeach
            </div>
          </div>
        @endif

        @if ($searchCats['categories']->isNotEmpty())
          <div class="co-so-group">
            <span class="co-so-label"><i class="bi bi-grid"></i> श्रेणी</span>
            <div class="co-so-links">
              @foreach ($searchCats['categories'] as $cat)
                <a href="{{ route('frontend.category.index', $cat->slug) }}">{{ $cat->name }}</a>
              @endforeach
            </div>
          </div>
        @endif

        @if ($searchCats['provinces']->isNotEmpty())
          <div class="co-so-group">
            <span class="co-so-label"><i class="bi bi-geo-alt"></i> प्रदेश</span>
            <div class="co-so-links">
              @foreach ($searchCats['provinces'] as $cat)
                <a href="{{ route('frontend.category.index', $cat->slug) }}">{{ $cat->name }}</a>
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Mobile offcanvas menu -->
  <div class="offcanvas offcanvas-start co-offcanvas" tabindex="-1" id="coOffcanvas" aria-labelledby="coOffcanvasLabel">
    <div class="co-oc-head">
      <a href="{{ route('frontend.home') }}" class="co-oc-logo" id="coOffcanvasLabel"><img src="{{ asset('assets/images/logo.png') }}" alt="चासो अनलाइन"
          width="200" height="100"></a>
      <button type="button" class="co-oc-close" data-bs-dismiss="offcanvas" aria-label="बन्द गर्नुहोस्"><i
          class="bi bi-x-lg"></i></button>
    </div>
    <div class="co-oc-body">
      <form class="co-search co-oc-search" role="search" action="{{ route('frontend.search.store') }}" method="POST">
        @csrf
        <input class="co-search-input" type="search" name="q" placeholder="खोज्नुहोस्..." aria-label="खोज्नुहोस्" maxlength="100" required>
        <button class="co-search-btn" type="submit" aria-label="खोज्नुहोस्"><i class="bi bi-search"></i></button>
      </form>

      <div class="co-oc-actions">
        <a href="#" class="co-tv-btn"><span class="co-live-dot"></span><i class="bi bi-play-btn-fill"></i> चासो TV</a>
        <button class="co-theme-switch" type="button" role="switch" aria-checked="false" aria-label="डार्क मोड"
          title="लाइट / डार्क मोड" data-theme-toggle>
          <span class="co-switch-knob"></span>
          <i class="bi bi-sun-fill co-switch-sun"></i>
          <i class="bi bi-moon-stars-fill co-switch-moon"></i>
        </button>
      </div>

      <ul class="co-oc-menu">
        <li><a href="{{ route('frontend.home') }}" class="co-oc-link {{ request()->is('/') ? 'is-active' : '' }}"><i
              class="bi bi-house-door"></i> गृहपृष्ठ</a></li>
        @foreach ($mainMenu as $item)
          @if ($item['children'])
            <li>
              <button class="co-oc-link co-oc-toggle collapsed {{ $item['classes'] }}" type="button" data-bs-toggle="collapse"
                data-bs-target="#coOcSub{{ $item['id'] }}" aria-expanded="false" aria-controls="coOcSub{{ $item['id'] }}">
                <span><i class="bi d-lg-none {{ $item['icon'] ?? 'bi-grid' }}"></i> {{ $item['title'] }}</span><i
                  class="bi bi-chevron-down co-oc-caret"></i>
              </button>
              <ul class="collapse co-oc-sub" id="coOcSub{{ $item['id'] }}">
                @foreach ($item['children'] as $child)
                  <li><a href="{{ $child['link'] }}" class="{{ $child['classes'] }}" target="{{ $child['target'] }}">{{ $child['title'] }}</a></li>
                @endforeach
              </ul>
            </li>
          @else
            <li><a href="{{ $item['link'] }}" class="co-oc-link {{ $item['classes'] }} {{ $item['is_active'] ? 'is-active' : '' }}"
                target="{{ $item['target'] }}"><i class="bi d-lg-none {{ $item['icon'] ?? 'bi-newspaper' }}"></i> {{ $item['title'] }}</a></li>
          @endif
        @endforeach
      </ul>
    </div>
    @php
      $facebook = SettingHelper::get_field('facebook');
      $twitter = SettingHelper::get_field('twitter');
      $instagram = SettingHelper::get_field('instagram');
      $youtube = SettingHelper::get_field('youtube');
      $address = SettingHelper::get_field('address');
      $email_address = SettingHelper::get_field('email_address');
    @endphp
    <div class="co-oc-foot">
      <div class="co-social">
        @if($facebook)<a href="{{ $facebook }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>@endif
        @if($twitter)<a href="{{ $twitter }}" aria-label="X"><i class="bi bi-twitter-x"></i></a>@endif
        @if($instagram)<a href="{{ $instagram }}" aria-label="Instagram"><i class="bi bi-instagram"></i></a>@endif
        @if($youtube)<a href="{{ $youtube }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>@endif
      </div>
      @if($email_address)
      <a href="mailto:{{ $email_address }}" class="co-oc-mail"><i class="bi bi-envelope"></i>
        {{ $email_address }}</a>
      @endif
    </div>
  </div>

@if (!empty($recent_posts) && $recent_posts->isNotEmpty())
    <div class="co-breaking" role="region" aria-label="ताजा समाचार">
        <div class="container co-container co-breaking-inner">
            <span class="co-breaking-label">
                <span class="co-live-dot"></span>ताजा
            </span>

            <div class="co-ticker">
                <div class="co-ticker-track">
                    <div class="co-ticker-group">
                        @foreach ($recent_posts as $post)
                            <a href="{{ route('frontend.post.index', $post->id) }}" class="co-ticker-item">
                                {{ $post->post_title }}
                                <span class="co-ticker-time">
                                    {{ NepaliDateHelper::ago($post->created_at) }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif