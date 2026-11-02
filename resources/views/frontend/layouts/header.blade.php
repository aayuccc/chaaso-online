@php
  $mainMenu = app(\App\Repositories\FrontMenuRepository::class)->getMenuTree($settings['header_main_menu'] ?? null);
@endphp
<header class="co-header">
    <div class="container co-container">
      <div class="co-header-top">
        <div class="co-brand">
          <a href="{{ route('frontend.home') }}" class="co-logo"><img src="{{ asset('assets/images/logo.png') }}" alt="चासो अनलाइन" width="200" height="100"></a>
          <div class="co-header-date d-none d-lg-flex">
            <span class="co-date-day">सोमबार</span>
            <span class="co-date-full">असोज २६, २०८३</span>
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
        <a href="{{ route('frontend.home') }}" class="co-nav-logo" aria-label="चासो अनलाइन — गृहपृष्ठ" tabindex="-1"><img
            src="{{ asset('assets/images/sticky-logo.png') }}" alt="" width="67" height="66"></a>
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
  <div class="co-so" id="coSearch" hidden>
    <div class="co-so-backdrop" data-search-close></div>
    <div class="co-so-panel" role="dialog" aria-modal="true" aria-label="खोज्नुहोस्">
      <form class="co-so-form" role="search" action="#">
        <i class="bi bi-search"></i>
        <input class="co-so-input" type="search" placeholder="समाचार, विषय वा व्यक्ति खोज्नुहोस्..."
          aria-label="खोज्नुहोस्" autocomplete="off">
        <button class="co-so-close" type="button" data-search-close aria-label="बन्द गर्नुहोस्"><kbd>Esc</kbd><i
            class="bi bi-x-lg"></i></button>
      </form>

      <div class="co-so-body">
        <div class="co-so-group">
          <span class="co-so-label"><i class="bi bi-fire"></i> ट्रेन्डिङ</span>
          <div class="co-so-chips">
            <a href="#">दशैं २०८३</a>
            <a href="#">एनपीएल</a>
            <a href="#">सेयर बजार</a>
            <a href="#">बाढी पहिरो</a>
            <a href="#">बजेट</a>
            <a href="#">विश्वकप छनोट</a>
          </div>
        </div>

        <div class="co-so-group">
          <span class="co-so-label"><i class="bi bi-grid"></i> श्रेणी</span>
          <div class="co-so-links">
            <a href="category.html">राजनीति</a>
            <a href="#">अर्थ / वाणिज्य</a>
            <a href="#">विचार</a>
            <a href="#">खेलकुद</a>
            <a href="#">मनोरञ्जन</a>
            <a href="#">अन्तर्वार्ता</a>
            <a href="#">फिचर</a>
            <a href="#">विश्व</a>
            <a href="#">कोसेली</a>
            <a href="#">प्रवास</a>
            <a href="#">स्वास्थ्य</a>
            <a href="#">जीवनशैली</a>
            <a href="#">साहित्य/विविध</a>
            <a href="#">विज्ञान र प्रविधि</a>
            <a href="#">शिक्षा</a>
            <a href="#">भिडियो</a>
            <a href="#">फोटोफिचर</a>
          </div>
        </div>

        <div class="co-so-group">
          <span class="co-so-label"><i class="bi bi-geo-alt"></i> प्रदेश</span>
          <div class="co-so-links">
            <a href="#">कोशी</a>
            <a href="#">मधेश</a>
            <a href="#">बागमती</a>
            <a href="#">गण्डकी</a>
            <a href="#">लुम्बिनी</a>
            <a href="#">कर्णाली</a>
            <a href="#">सुदूरपश्चिम</a>
          </div>
        </div>
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
      <form class="co-search co-oc-search" role="search" action="#">
        <input class="co-search-input" type="search" placeholder="खोज्नुहोस्..." aria-label="खोज्नुहोस्">
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
                <span><i class="bi {{ $item['icon'] ?? 'bi-grid' }}"></i> {{ $item['title'] }}</span><i
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
                target="{{ $item['target'] }}"><i class="bi {{ $item['icon'] ?? 'bi-newspaper' }}"></i> {{ $item['title'] }}</a></li>
          @endif
        @endforeach
      </ul>
    </div>
    <div class="co-oc-foot">
      <div class="co-social">
        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
      </div>
      <a href="mailto:chaasogobalmedia9@gmail.com" class="co-oc-mail"><i class="bi bi-envelope"></i>
        chaasogobalmedia9@gmail.com</a>
    </div>
  </div>

  <!-- Breaking ticker -->
  <div class="co-breaking" role="region" aria-label="ताजा समाचार">
    <div class="container co-container co-breaking-inner">
      <span class="co-breaking-label"><span class="co-live-dot"></span>ताजा</span>
      <div class="co-ticker">
        <div class="co-ticker-track">
          <div class="co-ticker-group">
            <a href="#" class="co-ticker-item">२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह <span
                class="co-ticker-time">१ घण्टा अघि</span></a>
            <a href="#" class="co-ticker-item">सेयर बजार २६०० विन्दु पार, ६ अर्ब २८ करोडभन्दा बढीको कारोबार <span
                class="co-ticker-time">२ घण्टा अघि</span></a>
            <a href="#" class="co-ticker-item">एनपीएलमा काठमान्डु गोर्खाज प्लेअफमा प्रवेश <span class="co-ticker-time">३
                घण्टा अघि</span></a>
            <a href="#" class="co-ticker-item">सामान्य प्रशासनमन्त्री राजकुमार गुप्ताद्वारा राजीनामा <span
                class="co-ticker-time">५ घण्टा अघि</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>