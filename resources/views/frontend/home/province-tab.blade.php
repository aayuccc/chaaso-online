    @if ($provinces->isNotEmpty() || $tourism_posts->isNotEmpty())
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            @if ($provinces->isNotEmpty())
            <div class="co-section-head co-section-head-tabs">
              <h2 class="co-section-title">प्रदेश</h2><span class="co-hatch co-hatch-sm"></span>
              <div class="co-tabs" role="tablist" aria-label="प्रदेश छान्नुहोस्">
                <span class="co-tabs-pill" aria-hidden="true"></span>
                @foreach ($provinces as $province)
                  <button class="co-tab {{ $loop->first ? 'is-active' : '' }}" type="button" role="tab" id="coProvinceTab-{{ $province->category->slug }}" aria-controls="coProvince-{{ $province->category->slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $province->category->name }}</button>
                @endforeach
              </div>
            </div>
            @foreach ($provinces as $province)
              @php
                $label = $province->category->name;
                $feature = $province->posts->first();
                $minis = $province->posts->slice(1, 4);
                $trio = $province->posts->slice(5, 3);
              @endphp
              <div class="co-province-panel" id="coProvince-{{ $province->category->slug }}" role="tabpanel" aria-labelledby="coProvinceTab-{{ $province->category->slug }}" @unless ($loop->first) hidden @endunless>
                @if ($feature)
                <div class="co-province">
                  <article class="co-province-feature">
                    <a href="{{ $url($feature) }}" class="co-img co-province-media"><img src="{{ $img($feature) }}" alt="{{ $feature->post_title }}" @unless ($loop->first) loading="lazy" @endunless><span class="co-tag co-tag-red co-tag-abs co-province-label">{{ $label }}</span></a>
                    <h3 class="co-title-lg"><a href="{{ $url($feature) }}">{{ $feature->post_title }}</a></h3>
                    <div class="co-meta"><span class="co-meta-author">{{ $feature->authors->first()?->name ?? '' }}</span><span>{{ $date($feature) }}</span></div>
                  </article>
                  <div class="co-mini-list">
                    @foreach ($minis as $p)
                      <article class="co-mini">
                        <a href="{{ $url($p) }}" class="co-mini-thumb co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"></a>
                        <div>
                          <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                          <div class="co-meta"><span>{{ $date($p) }}</span></div>
                        </div>
                      </article>
                    @endforeach
                  </div>
                </div>
                @if ($trio->isNotEmpty())
                <div class="co-trio co-trio-sm co-province-more">
                  @foreach ($trio as $p)
                    <article class="co-card">
                      <a href="{{ $url($p) }}" class="co-card-media co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"><span class="co-tag {{ $tagColors[($loop->index + 3) % 4] }} co-tag-abs co-province-label">{{ $label }}</span></a>
                      <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                    </article>
                  @endforeach
                </div>
                @endif
                @else
                <p class="co-meta">{{ $label }} प्रदेशका समाचार छैनन्।</p>
                @endif
              </div>
            @endforeach
            @endif
          </div>

          <div class="co-split-aside">
            @if ($tourism_posts->isNotEmpty())
            @php $feature = $tourism_posts->first(); @endphp
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $tourism_cat->name }}</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <a href="{{ $url($feature) }}" class="co-overlay co-aside-feature">
              <img src="{{ $img($feature) }}" alt="{{ $feature->post_title }}">
              <div class="co-overlay-body">
                <h3 class="co-mark-title co-mark-sm"><span class="co-mark">{{ $feature->post_title }}</span></h3>
              </div>
            </a>
            <ul class="co-bullet-list co-grow co-spread">
              @foreach ($tourism_posts->slice(1, 3) as $p)
                <li><a href="{{ $url($p) }}">{{ $p->post_title }}</a></li>
              @endforeach
            </ul>
            @endif
            @php
              $websiteName = SettingHelper::get_field('site_title');
              $after_tourism = SettingHelper::get_field('after_tourism');
              $featuredmedia = $after_tourism ? MediaHelper::getImageById($after_tourism) : null;
              if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                $ad_image_url = MediaHelper::WsrvService($featuredmedia);
              }
              else {
                $ad_image_url = null;
              }
              $after_tourism_url     = SettingHelper::get_field('after_tourism_url');
            @endphp
            @if ($after_tourism_url || $featuredmedia)
            <div class="co-ad co-ad-rect" data-ad-slot="aside-tourism">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="{{ $after_tourism_url }}" class="co-ad-box co-cr co-cr-v co-cr--skyyatra" rel="sponsored noopener"><img
                  class="co-cr-img" src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
            </div>
            @endif
            
          </div>
        </div>
      </div>
    </section>
    @endif