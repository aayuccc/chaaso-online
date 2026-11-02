<!-- ================= FOOTER ================= -->
@php
  $footer_logo = SettingHelper::get_field('footer_logo');
  $media = $footer_logo ? MediaHelper::getImageById($footer_logo) : null;
  $facebook = SettingHelper::get_field('facebook');
  $twitter = SettingHelper::get_field('twitter$twitter');
  $instagram = SettingHelper::get_field('instagram');
  $youtube = SettingHelper::get_field('youtube');
  $address = SettingHelper::get_field('address');
  $email_address = SettingHelper::get_field('email_address');
  $registration_number = SettingHelper::get_field('registration_number');
  $footer_title = SettingHelper::get_field('footer_title');
    if (!empty($media) && !empty($media->file_name)) {
      $ad_image_url = MediaHelper::WsrvService($media);
    }
    else {
      $ad_image_url = null;
    }
 
@endphp
  <footer class="co-ft">
    <div class="co-ft-top">
      <div class="container co-container">
        <div class="co-ft-row">
          <div class="co-ft-brand">
            <a href="{{url('/')}}" class="co-ft-logo"><img src="{{ $ad_image_url}}" alt="चासो अनलाइन" width="200" height="100"></a>
            <div class="co-ft-info">
              @if($footer_title)
                <p class="co-ft-tag">{{ $footer_title }}</p>
              @endif
              <p class="co-ft-copy">© २०२६ {{ $websiteName }} <span class="co-ft-dot" aria-hidden="true"></span> <span class="co-ft-credit">Site by <a href="https://www.webtechnepal.com/" target="_blank">Webtech Nepal</a></span></p>
            </div>
          </div>
          @if($facebook || $twitter || $instagram || $youtube)
          <div class="co-ft-follow">
            <span class="co-ft-follow-label">हामीलाई फलो गर्नुहोस्</span>
            <div class="co-ft-social">
              @if($facebook)
                <a href="{{ $facebook }}" class="co-ft-fb" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
              @endif
              @if($instagram)
                <a href="{{ $instagram }}" class="co-ft-ig" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
              @endif
              @if($youtube)
                <a href="{{ $youtube }}" class="co-ft-yt" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
              @endif
              @if($twitter)
                <a href="{{ $twitter }}" class="co-ft-x" aria-label="X"><i class="bi bi-twitter-x"></i></a>
              @endif
            </div>
            @endif
          </div>
        </div>
        @if($address || $email_address || $registration_number)
        <ul class="co-ft-meta">
          @if($address)
            <li><i class="bi bi-geo-alt"></i> {{ $address }}</li>
          @endif
          @if($email_address)
            <li><i class="bi bi-envelope"></i> <a href="mailto:{{ $email_address }}">{{ $email_address }}</a></li>
          @endif
          @if($registration_number)
            <li><i class="bi bi-patch-check"></i> सूचना विभाग दर्ता नं. {{ $registration_number }}</li>
          @endif
        </ul>
        @endif
      </div>
    </div>
    
    @php
        $selectedMenuId = $settings['footer_widget_first'] ?? null;

        $footerMenu = null;
        $footerMenuItems = collect();

        if ($selectedMenuId) {
            $footerMenu = CategoryHelper::getModel()
                ->where('id', $selectedMenuId)
                ->where('type', 'nav_menu')
                ->first();

            if ($footerMenu) {
                $footerMenuItems = $footerMenu->posts
                    ->filter(function ($item) {
                        return $item->postMeta->contains(function ($meta) {
                            return $meta->meta_key === 'menu_item_parent_id'
                                && (string) $meta->meta_value === '0';
                        });
                    })
                    ->sortBy('menu_order');
            }
        }
    @endphp

    <div class="co-ft-bar">
        <div class="container co-container co-ft-bar-in">

            @if ($footerMenu && $footerMenuItems->isNotEmpty())

                <nav class="co-ft-links" aria-label="फुटर लिङ्क">

                    @foreach ($footerMenuItems as $item)

                        @php
                            // Get menu item metadata
                            $url = $item->postMeta
                                ->firstWhere('meta_key', 'menu_item_url')
                                ->meta_value ?? '';

                            $objectType = $item->postMeta
                                ->firstWhere('meta_key', 'menu_item_object')
                                ->meta_value ?? '';

                            $objectId = $item->postMeta
                                ->firstWhere('meta_key', 'menu_item_object_id')
                                ->meta_value ?? '';

                            // Generate URL for page menu items
                            if ($objectType === 'page' && $objectId) {
                                $page = \App\Models\Post::find($objectId);

                                if ($page) {
                                    $url = url($page->slug);
                                }
                            }
                        @endphp

                        <a href="{{ $url ?: '#' }}">
                            {{ $item->post_title }}
                        </a>

                    @endforeach

                </nav>

            @endif

            <span class="co-ft-editor">
                प्रधान सम्पादक : <strong>Amrita Bhandari</strong>
            </span>

        </div>
    </div>

  </footer>

  <!-- Mobile sticky bottom ad -->
  <div class="co-ad-sticky-bottom d-lg-none" id="coStickyAd" role="region" aria-label="विज्ञापन"
    data-ad-slot="mobile-sticky">
    <button class="co-ad-close" type="button" aria-label="विज्ञापन बन्द गर्नुहोस्"><i class="bi bi-x"></i></button>
    <a href="#" class="co-ad-box co-cr co-cr-h co-cr--novanet" rel="sponsored noopener"><span class="co-cr-in"><span
          class="co-cr-brand"><i class="bi bi-wifi"></i> NovaNet</span><span class="co-cr-copy"><strong>३०० Mbps · रु.
            ९९९/महिना</strong></span><span class="co-cr-cta">जडान <i class="bi bi-arrow-right"></i></span></span></a>
  </div>

  <button class="co-to-top" id="coToTop" type="button" aria-label="माथि जानुहोस्"><i
      class="bi bi-arrow-up"></i></button>