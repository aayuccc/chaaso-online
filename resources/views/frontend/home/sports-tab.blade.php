    @if ($sports_posts->isNotEmpty() || $education_posts->isNotEmpty())
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            @if ($sports_posts->isNotEmpty())
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $sports_cat->name }}</h2><span class="co-hatch"></span>
              <a href="{{ $catUrl($sports_cat) }}" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="co-sport-grid">
              @foreach ($sports_posts->take(6) as $p)
                <article class="co-card">
                  <a href="{{ $url($p) }}" class="co-card-media co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"></a>
                  <h3 class="co-title-md"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                  <div class="co-meta"><span>{{ $date($p) }}</span></div>
                </article>
                @if ($loop->iteration === 3)
                @php
                  $websiteName = SettingHelper::get_field('site_title');
                  $between_sports_img = SettingHelper::get_field('between_sports_img');
                  $featuredmedia = $between_sports_img ? MediaHelper::getImageById($between_sports_img) : null;
                  if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                    $ad_image_url = MediaHelper::WsrvService($featuredmedia);
                  }
                  else {
                    $ad_image_url = null;
                  }
                  $between_sports_url     = SettingHelper::get_field('between_sports_url');
                @endphp
                @if ($between_sports_url || $featuredmedia)
                <div class="co-ad co-ad-infeed" data-ad-slot="in-feed-sports">
                  <span class="co-ad-tag">विज्ञापन</span>
                  <a href="{{ $between_sports_url }}" class="co-ad-box co-cr co-cr-h co-cr--kickon" rel="sponsored noopener"><img
                      class="co-cr-img" src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
                </div>
                @endif
                @endif
              @endforeach
            </div>
            @endif
          </div>

          <div class="co-split-aside">
            @if ($education_posts->isNotEmpty())
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $education_cat->name }}</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <div class="co-mini-list co-mini-list-aside co-grow co-spread">
              @foreach ($education_posts->take(4) as $p)
                <article class="co-mini {{ $loop->iteration === 4 ? 'co-hide-md' : '' }}">
                  <a href="{{ $url($p) }}" class="co-mini-thumb co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"></a>
                  <div>
                    <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                    <div class="co-meta"><span>{{ $date($p) }}</span></div>
                  </div>
                </article>
              @endforeach
            </div>
            @endif
            @php
              $websiteName = SettingHelper::get_field('site_title');
              $after_sikshya = SettingHelper::get_field('after_sikshya');
              $featuredmedia = $after_sikshya ? MediaHelper::getImageById($after_sikshya) : null;
              if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                $ad_image_url = MediaHelper::WsrvService($featuredmedia);
              }
              else {
                $ad_image_url = null;
              }
              $after_sikshya_url     = SettingHelper::get_field('after_sikshya_url');
            @endphp
            @if ($after_sikshya_url || $featuredmedia)
            <div class="co-ad co-ad-rect" data-ad-slot="aside-education">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="{{$after_sikshya_url}}" class="co-ad-box co-cr co-cr-v co-cr--apex" rel="sponsored noopener"><img class="co-cr-img"
                  src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    @endif