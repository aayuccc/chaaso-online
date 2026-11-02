@extends('frontend.layouts.app', ['payload' => $cat, 'payloadMeta' => $catMeta, 'title' => $cat->name])


@section('main-section')
  <main class="co-main">

    <!-- ================= CATEGORY HEADER ================= -->
    <section class="co-cat-hero">
      <div class="container co-container">
        <nav class="co-crumbs" aria-label="ब्रेडक्रम्ब">
          <a href="{{url('/')}}"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
          <i class="bi bi-chevron-right" aria-hidden="true"></i>
          <span aria-current="page">{{$cat->name}}</span>
        </nav>
        <div class="co-cat-head">
          <div>
            <h1 class="co-cat-title">{{$cat->name}}</h1>
            <p class="co-cat-desc">{{$cat->description}}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= FEATURED ================= -->
    @if ($featuredPosts->isNotEmpty())
        @php
            $lead = $featuredPosts->first();
            $side = $featuredPosts->slice(1, 2);
            $lead_image = MediaHelper::WsrvService(MediaHelper::getImageById($lead->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
            $lead_url = route('frontend.news.show', $lead->id);
            $lead_excerpt = $lead->post_content ?: $lead->postMeta->firstWhere('meta_key', 'short_desc')?->meta_value;
        @endphp

        <!-- ================= FEATURED ================= -->
        <section class="co-section co-cat-featured">
          <div class="container co-container">
            <div class="co-cat-top">

              {{-- Lead post --}}
              <article class="co-cat-lead">
                @if ($lead_image)
                <a href="{{ $lead_url }}" class="co-cat-lead-media co-img">
                  <img src="{{ $lead_image }}" alt="{{ $lead->post_title }}">
                </a>
                @endif
                <h2 class="co-title-xl"><a href="{{ $lead_url }}">{{ $lead->post_title }}</a></h2>
                @if ($lead_excerpt)
                  <p class="co-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($lead_excerpt), 220) }}</p>
                @endif
                <div class="co-meta">
                  <span class="co-meta-author">{{ $lead->authors->first()?->name ?? 'चासो संवाददाता' }}</span>
                  <span>{{ $lead->created_at->format('M d, Y') }}</span>
                </div>
              </article>

              {{-- Two side posts --}}
              <div class="co-cat-side">
                @foreach ($side as $post)
                  @php
                      $item_image = MediaHelper::WsrvService(MediaHelper::getImageById($post->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
                      $item_url = route('frontend.news.show', $post->id);
                  @endphp
                  <article class="co-card">
                    @if ($item_image)
                    <a href="{{ $item_url }}" class="co-card-media co-img">
                      <img src="{{ $item_image }}" alt="{{ $post->post_title }}" loading="lazy">
                    </a>
                    @endif
                    <h3 class="co-title-md"><a href="{{ $item_url }}">{{ $post->post_title }}</a></h3>
                    <div class="co-meta"><span>{{ $post->created_at->format('M d, Y') }}</span></div>
                  </article>
                @endforeach
              </div>

            </div>
          </div>
        </section>
    @endif

@php
    $websiteName = SettingHelper::get_field('site_title');
 
    $brandId = SettingHelper::get_field('after_featured_news_brand');
    $brandmedia = $brandId ? MediaHelper::getImageById($brandId) : null;
 
    $adImageId = SettingHelper::get_field('after_featured_news');
    $media = $adImageId ? MediaHelper::getImageById($adImageId) : null;

    // separate variables so the brand logo no longer overwrites the ad image
    if (!empty($brandmedia) && !empty($brandmedia->file_name)) {
      $brand_url = MediaHelper::WsrvService($brandmedia);
    }
    else {
      $brand_url = null;
    }
    if (!empty($media) && !empty($media->file_name)) {
      $ad_image_url = MediaHelper::WsrvService($media);
    }
    else {
      $ad_image_url = null;
    }
 
    $ad_title    = SettingHelper::get_field('after_featured_news_ad_title');
    $ad_subtitle = SettingHelper::get_field('after_featured_news_ad_subtitle');
    $ad_link     = SettingHelper::get_field('after_featured_news_url');
    $ad_cta      = SettingHelper::get_field('after_featured_news_cta_text');
@endphp
 
@if ($ad_title || $ad_subtitle || $ad_link || $ad_cta || $brandmedia || $media)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="category-top">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{$ad_link}}" class="co-ad-box co-cr co-cr-h co-cr--sunrise" rel="sponsored noopener">
            <img class="co-cr-img" src="{{$ad_image_url}}" alt="" loading="lazy">
            <span class="co-cr-in">
              <span class="co-cr-brand"><i class="bi bi-house-heart-fill"></i> Sunrise Homes</span>
              <span class="co-cr-copy"><strong>{{$ad_title}}</strong><small>{{$ad_subtitle}}</small></span>
              <span class="co-cr-cta">{{$ad_cta}} <i class="bi bi-arrow-right"></i></span>
            </span>
          </a>
        </div>
      </div>
    </div>
@endif
    <!-- ================= LIST + SIDEBAR ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">

            <div class="co-cat-list">
              @foreach ($listPosts as $post)
                @php
                    $item_image = MediaHelper::WsrvService(MediaHelper::getImageById($post->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
                    $item_url = route('frontend.news.show', $post->id);
                @endphp
                <article class="co-card co-cat-card">
                  @if ($item_image)
                  <a href="{{ $item_url }}" class="co-card-media co-img"><img src="{{ $item_image }}" alt="{{ $post->post_title }}" loading="lazy"></a>
                  @endif
                  <h3 class="co-title-md"><a href="{{ $item_url }}">{{ $post->post_title }}</a></h3>
                  <div class="co-meta"><span class="co-meta-author">{{ $post->authors->first()?->name ?? 'चासो संवाददाता' }}</span><span>{{ $post->created_at->format('M d, Y') }}</span></div>
                </article>

                @if ($loop->iteration === 6)
                <div class="co-ad co-ad-infeed" data-ad-slot="category-infeed">
                  <span class="co-ad-tag">विज्ञापन</span>
                  <a href="#" class="co-ad-box co-cr co-cr-h co-cr--pahadpay" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/phone.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-phone-fill"></i> PahadPay</span><span class="co-cr-copy"><strong>बिल भुक्तानीमा ५% क्यासब्याक</strong><small>बिजुली, पानी, इन्टरनेट — सबै एकै एपमा</small></span><span class="co-cr-cta">एप डाउनलोड <i class="bi bi-arrow-right"></i></span></span></a>
                </div>
                @endif
              @endforeach
            </div>

            <nav class="co-pager" aria-label="पृष्ठहरू">
              <a href="#" class="co-pager-btn is-disabled" aria-disabled="true"><i class="bi bi-arrow-left"></i> अघिल्लो</a>
              <div class="co-pager-pages">
                <a href="#" class="is-active" aria-current="page">१</a>
                <a href="#">२</a>
                <a href="#">३</a>
                <span>…</span>
                <a href="#">६२</a>
              </div>
              <a href="#" class="co-pager-btn">अर्को <i class="bi bi-arrow-right"></i></a>
            </nav>
          </div>

          <aside class="co-split-aside">
            <div class="co-ad co-ad-square" data-ad-slot="category-aside-sq-1">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--voltride" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/ev.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-lightning-charge-fill"></i> VoltRide EV</span><span class="co-cr-copy"><strong>दशैं अफर: ०% ब्याजमा इलेक्ट्रिक कार</strong><small>५ वर्ष ब्याट्री वारेन्टी · निःशुल्क होम चार्जर</small></span><span class="co-cr-cta">टेस्ट ड्राइभ <i class="bi bi-arrow-right"></i></span></span></a>
            </div>

            <div class="co-ad co-ad-square" data-ad-slot="category-aside-sq-2">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--techhub" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/laptop.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-laptop"></i> TechHub</span><span class="co-cr-copy"><strong>ल्यापटपमा १५% सम्म छुट</strong><small>सजिलो किस्ता · २ वर्ष वारेन्टी</small></span><span class="co-cr-cta">अहिले किन्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
            </div>

            <div class="co-ad co-ad-rect" data-ad-slot="category-aside">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--skyyatra" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/plane.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-airplane-fill"></i> Sky Yatra</span><span class="co-cr-copy"><strong>काठमाडौं–पोखरा रु. ३,९९९ बाट</strong><small>सीमित सिट · अहिले नै बुक गर्नुहोस्</small></span><span class="co-cr-cta">टिकट बुक गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
            </div>

            <!-- fills the rest of the sidebar: stays in view while the list scrolls -->
            <div class="co-ad co-ad-sticky co-aside-sticky" data-ad-slot="category-aside-sticky">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="#" class="co-ad-box co-cr co-cr-v co-cr--lakebreeze" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/resort.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-water"></i> Lake Breeze Resort</span><span class="co-cr-copy"><strong>पोखरामा परिवारसँग बिदा — २५% छुट</strong><small>नास्ता सहित · ३ रात बस्दा १ रात निःशुल्क</small></span><span class="co-cr-cta">बुक गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
            </div>
          </aside>
        </div>
      </div>
    </section>
  </main>
@endsection
