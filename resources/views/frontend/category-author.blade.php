@extends('frontend.layouts.app', ['payload' => $cat, 'payloadMeta' => $catMeta, 'title' => $cat->name])


@section('main-section')
<main class="co-main">

    <!-- ================= AUTHOR HEADER ================= -->
    <section class="co-cat-hero">
      <div class="container co-container">
        <nav class="co-crumbs" aria-label="ब्रेडक्रम्ब">
          <a href="{{ url('/') }}"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
          <i class="bi bi-chevron-right" aria-hidden="true"></i>
          <span aria-current="page">{{ $cat->name }}</span>
        </nav>
        <div class="co-cat-head">
            <div style=" display: flex; gap: 16px; align-items: center;">
            <span class="co-art-av co-art-av-lg" aria-hidden="true">{{ mb_substr($cat->name, 0, 2) }}</span>
            <h1 class="co-cat-title">{{ $cat->name }}</h1>
            <p class="co-cat-desc">{{ $cat->description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="category-top">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="#" class="co-ad-box co-cr co-cr-h co-cr--sunrise" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/house.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-house-heart-fill"></i> Sunrise Homes</span><span class="co-cr-copy"><strong>काठमाडौंमा आफ्नै घर, किस्ताबन्दीमा</strong><small>२०% डाउन पेमेन्टमा बुकिङ खुला</small></span><span class="co-cr-cta">साइट भ्रमण <i class="bi bi-arrow-right"></i></span></span></a>
        </div>
      </div>
    </div>

    <!-- ================= LIST + SIDEBAR ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">

            <div class="co-cat-list">
              @forelse ($posts as $post)
                @php
                    $item_image = MediaHelper::WsrvService(MediaHelper::getImageById($post->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
                    $item_url = route('frontend.news.show', $post->id);
                    $item_cat = $post->categories->where('type', 'category')->first();
                @endphp
                <article class="co-card co-cat-card">
                  @if ($item_image)
                  <a href="{{ $item_url }}" class="co-card-media co-img">
                    <img src="{{ $item_image }}" alt="{{ $post->post_title }}" loading="lazy">
                    @if ($item_cat)
                      <span class="co-tag co-tag-blue co-tag-abs">{{ $item_cat->name }}</span>
                    @endif
                  </a>
                  @endif
                  <h3 class="co-title-md"><a href="{{ $item_url }}">{{ $post->post_title }}</a></h3>
                  <div class="co-meta">
                    <span class="co-meta-author">{{ $cat->name }}</span>
                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                  </div>
                </article>

                @if ($loop->iteration === 6)
                <div class="co-ad co-ad-infeed" data-ad-slot="category-infeed">
                  <span class="co-ad-tag">विज्ञापन</span>
                  <a href="#" class="co-ad-box co-cr co-cr-h co-cr--pahadpay" rel="sponsored noopener"><img class="co-cr-img" src="assets/images/ads/phone.jpg" alt="" loading="lazy"><span class="co-cr-in"><span class="co-cr-brand"><i class="bi bi-phone-fill"></i> PahadPay</span><span class="co-cr-copy"><strong>बिल भुक्तानीमा ५% क्यासब्याक</strong><small>बिजुली, पानी, इन्टरनेट — सबै एकै एपमा</small></span><span class="co-cr-cta">एप डाउनलोड <i class="bi bi-arrow-right"></i></span></span></a>
                </div>
                @endif
              @empty
                <p class="co-excerpt">यस लेखकका समाचार अहिलेसम्म उपलब्ध छैन।</p>
              @endforelse
            </div>

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