    @if ($commerce_posts->isNotEmpty() || $lifestyle_posts->isNotEmpty())
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            @if ($commerce_posts->isNotEmpty())
            @php
              $feature = $commerce_posts->first();
              $minis = $commerce_posts->slice(1, 5);
              $trio = $commerce_posts->slice(6, 3);
            @endphp
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $commerce_cat->name }}</h2><span class="co-hatch"></span>
              <a href="{{ $catUrl($commerce_cat) }}" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="co-econ-top co-grow">
              <a href="{{ $url($feature) }}" class="co-overlay co-econ-feature">
                <img src="{{ $img($feature) }}" alt="{{ $feature->post_title }}">
                <div class="co-overlay-body">
                  <h3 class="co-mark-title co-mark-md"><span class="co-mark">{{ $feature->post_title }}</span></h3>
                  <div class="co-meta co-meta-light"><span>{{ $feature->authors->first()?->name ?? '' }}</span><span>{{ $date($feature) }}</span></div>
                </div>
              </a>
              <div class="co-mini-list">
                @foreach ($minis as $p)
                  <article class="co-mini">
                    <a href="{{ $url($p) }}" class="co-mini-thumb co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"></a>
                    <div>
                      <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                      <div class="co-meta"><span><i class="bi bi-clock-history"></i> {{ $date($p) }}</span></div>
                    </div>
                  </article>
                @endforeach
              </div>
            </div>
            <div class="co-trio">
              @foreach ($trio as $p)
                <article class="co-card">
                  <a href="{{ $url($p) }}" class="co-card-media co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"></a>
                  <h3 class="co-title-md"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                  <div class="co-meta"><span>{{ $date($p) }}</span></div>
                </article>
              @endforeach
            </div>
            @endif
          </div>

          <div class="co-split-aside">
            @if ($lifestyle_posts->isNotEmpty())
            @php $feature = $lifestyle_posts->first(); @endphp
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $lifestyle_cat->name }}</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <a href="{{ $url($feature) }}" class="co-overlay co-aside-feature">
              <img src="{{ $img($feature) }}" alt="{{ $feature->post_title }}">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">{{ $feature->post_title }}</span></h3>
              </div>
            </a>
            <ol class="co-num-list co-grow co-spread">
              @foreach ($lifestyle_posts->slice(1, 6) as $p)
                <li><a href="{{ $url($p) }}">{{ $p->post_title }}</a></li>
              @endforeach
            </ol>
            @endif
            @php
              $websiteName = SettingHelper::get_field('site_title');
              $after_jiwansaili = SettingHelper::get_field('after_jiwansaili');
              $featuredmedia = $after_jiwansaili ? MediaHelper::getImageById($after_jiwansaili) : null;
              if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                $ad_image_url = MediaHelper::WsrvService($featuredmedia);
              }
              else {
                $ad_image_url = null;
              }
              $after_jiwansaili_url     = SettingHelper::get_field('after_jiwansaili_url');
            @endphp
            @if ($after_jiwansaili_url || $featuredmedia)
            <div class="co-ad co-ad-rect" data-ad-slot="aside-lifestyle">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="{{ $after_jiwansaili_url }}" class="co-ad-box co-cr co-cr-v co-cr--gurans" rel="sponsored noopener"><img class="co-cr-img"
                  src="{{ $ad_image_url }}" alt="" loading="lazy">
              </a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    @endif