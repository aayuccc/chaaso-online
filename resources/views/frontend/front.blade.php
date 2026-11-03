@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@section('main-section')
  @php
    $img = fn($p) => MediaHelper::WsrvService(MediaHelper::getImageById($p->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value)) ?? asset('assets/images/hero.jpg');
    $url = fn($p) => route('frontend.news.show', $p->id);
    $catUrl = fn($c) => $c ? route('frontend.category.index', $c->slug) : '#';
    $date = fn($p) => $p->created_at->format('M d, Y');
    $author = fn($p) => $p->user?->name ?? 'चासो संवाददाता';
    $tag = fn($p) => $p->categories->first()?->name;
    $excerpt = fn($p, $limit = 160) => \Illuminate\Support\Str::limit(strip_tags($p->post_excerpt ?: $p->postMeta->firstWhere('meta_key', 'short_desc')?->meta_value), $limit);
    $tagColors = ['co-tag-red', 'co-tag-blue', 'co-tag-amber', 'co-tag-green'];
  @endphp
  <main class="co-main">


    <!-- ================= 1. मुख्य समाचार ================= -->
    <section class="co-section co-headline">
      <div class="container co-container">
        <!-- Highlights: any number of [headline][optional image] pairs. Desktop: each headline pins, its image slides away behind it, the next headline covers it -->
        <div class="co-lead-stack" id="coLeadStack">
          @foreach ($recent_posts->take(3) as $p)
            <article class="co-lead">
              <span class="co-tag co-tag-red">मुख्य समाचार</span>
              <{{ $loop->first ? 'h1' : 'h2' }} class="co-lead-title"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></{{ $loop->first ? 'h1' : 'h2' }}>
              <div class="co-meta co-meta-center"><span class="co-meta-author"><i class="bi bi-person"></i> {{ $author($p) }}</span><span><i class="bi bi-clock-history"></i> {{ $date($p) }}</span></div>
            </article>
            <a href="{{ $url($p) }}" class="co-lead-media co-img">
              <img src="{{ $img($p) }}" alt="{{ $p->post_title }}" @unless ($loop->first) loading="lazy" @endunless>
            </a>
          @endforeach
        </div>


        <!-- Ad slot -->
          @php
            $websiteName = SettingHelper::get_field('site_title');
            $below_highlighted_img = SettingHelper::get_field('below_highlighted_img');
            $featuredmedia = $below_highlighted_img ? MediaHelper::getImageById($below_highlighted_img) : null;
            if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
              $ad_image_url = MediaHelper::WsrvService($featuredmedia);
            }
            else {
              $ad_image_url = null;
            }
            $highlighted_ad_url     = SettingHelper::get_field('highlighted_ad_url');
          @endphp
          @if ($highlighted_ad_url || $featuredmedia)
          <!-- Ad row -->
          <a href="{{$highlighted_ad_url}}" class="co-ad-banner">
            <span class="co-ad-label">विज्ञापन</span>
            <div class="co-ad-inner"><img class="co-cr-img" src="{{$ad_image_url}}" alt="{{$websiteName}}" loading="lazy">
            </div>
          </a>
          @endif
        

      </div>
    </section>

    <!-- ================= 2. राजनीति ================= -->
    @include('frontend.home.rajniti-tab')

    @php
      $websiteName = SettingHelper::get_field('site_title');
      $below_rajniti_ad = SettingHelper::get_field('below_rajniti_ad');
      $featuredmedia = $below_rajniti_ad ? MediaHelper::getImageById($below_rajniti_ad) : null;
      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
      }
      else {
        $ad_image_url = null;
      }
      $below_rajniti_ad_url     = SettingHelper::get_field('below_rajniti_ad_url');
    @endphp
    @if ($below_rajniti_ad_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-wide" data-ad-slot="after-politics">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{ $below_rajniti_ad_url }}" class="co-ad-box co-cr co-cr-h co-cr--voltride" rel="sponsored noopener"><img class="co-cr-img" src="{{$ad_image_url}}" alt="{{$websiteName}}" loading="lazy"></a>
        </div>
      </div>
    </div>
    @endif
    
    <!-- ================= 3. अर्थ वाणिज्य + जीवनशैली ================= -->
    @include('frontend.home.commerce-tab')


    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad-pair">
          <div class="co-ad co-ad-half" data-ad-slot="after-economy-1">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--pahadpay" rel="sponsored noopener"><img class="co-cr-img"
                src="{{ asset('assets/images/ads/phone.jpg') }}" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-wallet2"></i> PahadPay</span><span class="co-cr-copy"><strong>बिल
                    भुक्तानीमा १०% क्यासब्याक</strong><small>बिजुली, पानी, इन्टरनेट — एकै एपमा</small></span><span
                  class="co-cr-cta">एप डाउनलोड <i class="bi bi-arrow-right"></i></span></span></a>
          </div>
          <div class="co-ad co-ad-half" data-ad-slot="after-economy-2">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--sunrise" rel="sponsored noopener"><img class="co-cr-img"
                src="{{ asset('assets/images/ads/house.jpg') }}" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-house-heart-fill"></i> Sunrise Homes</span><span
                  class="co-cr-copy"><strong>काठमाडौंमा आफ्नै घर, किस्ताबन्दीमा</strong><small>२०% डाउन पेमेन्टमा बुकिङ
                    खुला</small></span><span class="co-cr-cta">साइट भ्रमण <i
                    class="bi bi-arrow-right"></i></span></span></a>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= 4. खेलकुद + शिक्षा ================= -->
    @include('frontend.home.sports-tab')

    <!-- ================= 5. प्रदेश + पर्यटन ================= -->
    @include('frontend.home.province-tab')

    @php
      $websiteName = SettingHelper::get_field('site_title');
      $before_it_img = SettingHelper::get_field('before_it_img');
      $featuredmedia = $before_it_img ? MediaHelper::getImageById($before_it_img) : null;
      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
      }
      else {
        $ad_image_url = null;
      }
      $before_it_url     = SettingHelper::get_field('before_it_url');
    @endphp
    @if ($before_it_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="before-tech">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{ $before_it_url }}" class="co-ad-box co-cr co-cr-h co-cr--techhub" rel="sponsored noopener"><img class="co-cr-img"
              src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
        </div>
      </div>
    </div>
    @endif

    <!-- ================= 6. सूचना प्रविधि ================= -->
    @include('frontend.home.it-tech-tab')

    @php
      $websiteName = SettingHelper::get_field('site_title');
      $after_it_img = SettingHelper::get_field('after_it_img');
      $featuredmedia = $after_it_img ? MediaHelper::getImageById($after_it_img) : null;
      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
      }
      else {
        $ad_image_url = null;
      }
      $after_it_url     = SettingHelper::get_field('after_it_url');
    @endphp
    @if ($after_it_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-wide" data-ad-slot="after-tech">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{ $after_it_url }}" class="co-ad-box co-cr co-cr-h co-cr--beatbox" rel="sponsored noopener"><img class="co-cr-img"
              src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
        </div>
      </div>
    </div>
    @endif

    <!-- ================= 7. अन्तरवार्ता + विचार ================= -->
    @include('frontend.home.interview-tab')

    
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad-pair">
          <div class="co-ad co-ad-half" data-ad-slot="before-video-1">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--momo" rel="sponsored noopener"><img class="co-cr-img"
                src="{{ asset('assets/images/ads/momo.jpg') }}" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-fire"></i> MoMo Magic</span><span class="co-cr-copy"><strong>१
                    प्लेट किन्दा १ प्लेट निःशुल्क</strong><small>हरेक शुक्रबार · सबै शाखामा</small></span><span
                  class="co-cr-cta">अर्डर गर्नुहोस् <i class="bi bi-arrow-right"></i></span></span></a>
          </div>
          <div class="co-ad co-ad-half" data-ad-slot="before-video-2">
            <span class="co-ad-tag">विज्ञापन</span>
            <a href="#" class="co-ad-box co-cr co-cr-h co-cr--yatra" rel="sponsored noopener"><img class="co-cr-img"
                src="{{ asset('assets/images/np/trek.jpg') }}" alt="" loading="lazy"><span class="co-cr-in"><span
                  class="co-cr-brand"><i class="bi bi-compass"></i> Yatra Treks</span><span
                  class="co-cr-copy"><strong>अन्नपूर्ण बेस क्याम्प — ७ दिने प्याकेज</strong><small>गाइड, बास र खाना
                    सहित</small></span><span class="co-cr-cta">बुक गर्नुहोस् <i
                    class="bi bi-arrow-right"></i></span></span></a>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= 8. भिडियो (dark) ================= -->
    @include('frontend.home.video-tab')

    @php
      $websiteName = SettingHelper::get_field('site_title');
      $after_video_img = SettingHelper::get_field('after_video_img');
      $featuredmedia = $after_video_img ? MediaHelper::getImageById($after_video_img) : null;
      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
      }
      else {
        $ad_image_url = null;
      }
      $after_video_url     = SettingHelper::get_field('after_video_url');
    @endphp
    @if ($after_video_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="after-video">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{$after_video_url}}" class="co-ad-box co-cr co-cr-h co-cr--colornest" rel="sponsored noopener"><img class="co-cr-img"
              src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
        </div>
      </div>
    </div>
    @endif

    <!-- ================= 9. सेयर / अटो / कृषि ================= -->
    @include('frontend.home.share-tab')

    @php
      $websiteName = SettingHelper::get_field('site_title');
      $before_photo_img = SettingHelper::get_field('before_photo_img');
      $featuredmedia = $before_photo_img ? MediaHelper::getImageById($before_photo_img) : null;
      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
      }
      else {
        $ad_image_url = null;
      }
      $before_photo_url     = SettingHelper::get_field('before_photo_url');
    @endphp
    @if ($before_photo_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-wide" data-ad-slot="before-photo">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{$before_photo_url}}" class="co-ad-box co-cr co-cr-h co-cr--lakebreeze" rel="sponsored noopener"><img class="co-cr-img"
              src="{{ $ad_image_url }}" alt="" loading="lazy"><span class="co-cr-in"></a>
        </div>
      </div>
    </div>
    @endif

    <!-- ================= 10. फोटो फिचर (dark carousel) ================= -->
    <section class="co-section co-photo" id="photo-feature">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">फोटो फिचर</h2><span class="co-hatch"></span>
          <div class="co-carousel-nav">
            <button class="co-carousel-btn" type="button" data-dir="-1" aria-label="अघिल्लो"><i
                class="bi bi-arrow-left"></i></button>
            <button class="co-carousel-btn" type="button" data-dir="1" aria-label="अर्को"><i
                class="bi bi-arrow-right"></i></button>
          </div>
        </div>
        <div class="co-carousel" id="coPhotoCarousel">
          <a href="story.html?s=0" class="co-overlay co-photo-card">
            <img src="{{ asset('assets/images/np/hotel1.jpg') }}" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ५</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">"कुलेखानी ड्यामसाईड होटल: प्राकृतिक सौन्दर्य र
                  पर्यटकको आकर्षणको केन्द्र"</span></h3>
            </div>
          </a>
          <a href="story.html?s=1" class="co-overlay co-photo-card">
            <img src="{{ asset('assets/images/np/hotel2.jpg') }}" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ४</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">आन्तरिक तथा बाह्य पर्यटकको रोजाई बन्दै -
                  कुलेखानी ड्यामसाईड होटल</span></h3>
            </div>
          </a>
          <a href="story.html?s=2" class="co-overlay co-photo-card">
            <img src="{{ asset('assets/images/np/nepal1.jpg') }}" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ५</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">मुस्ताङ, म्याग्दी, बागलुङ र पर्वतमा पर्यटकको
                  भीड</span></h3>
            </div>
          </a>
          <a href="story.html?s=3" class="co-overlay co-photo-card">
            <img src="{{ asset('assets/images/np/hotelnight.jpg') }}" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ४</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै,
                  रोयल भिल्ला रिर्सोट</span></h3>
            </div>
          </a>
          <a href="story.html?s=4" class="co-overlay co-photo-card">
            <img src="{{ asset('assets/images/np/nepal3.jpg') }}" alt="">
            <span class="co-photo-count"><i class="bi bi-images"></i> ३</span>
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-sm"><span class="co-mark">बौद्धका प्रार्थना चक्र: आस्था र सम्पदाको जीवन्त
                  झलक</span></h3>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- ================= 11. छुटाउनुभयो कि ? ================= -->
    <section class="co-section co-missed">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">छुटाउनुभयो कि ?</h2><span class="co-hatch"></span>
        </div>
        <div class="row g-4">
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="{{ asset('assets/images/np/group.jpg') }}"
                  alt="आदिवासी जनजातिको जलवायु तथा वन शासनमा सहभागिता विषयक प्रदेशस्तरीय कार्यशाला सम्पन्न"><span
                  class="co-tag co-tag-green co-tag-abs">समाज</span></a>
              <h3 class="co-title-md"><a href="#">आदिवासी जनजातिको जलवायु तथा वन शासनमा सहभागिता विषयक प्रदेशस्तरीय
                  कार्यशाला सम्पन्न</a></h3>
            </article>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="{{ asset('assets/images/np/man1.jpg') }}"
                  alt="खै कहाँ छन् जिवी राई ? किन खोज्दैनन् सरकार ?"><span
                  class="co-tag co-tag-red co-tag-abs">समाचार</span></a>
              <h3 class="co-title-md"><a href="#">खै कहाँ छन् जिवी राई ? किन खोज्दैनन् सरकार ?</a></h3>
            </article>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="{{ asset('assets/images/np/flood.jpg') }}"
                  alt="२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह"><span
                  class="co-tag co-tag-blue co-tag-abs">मौसम</span></a>
              <h3 class="co-title-md"><a href="#">२० जिल्लामा बाढीको ‘रेड अलर्ट’, उच्च सतर्कता अपनाउन आग्रह</a></h3>
            </article>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="#" class="co-card-media co-img"><img src="{{ asset('assets/images/np/hotelnight.jpg') }}"
                  alt="पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै, रोयल भिल्ला रिर्सोट"><span
                  class="co-tag co-tag-amber co-tag-abs">पर्यटन</span></a>
              <h3 class="co-title-md"><a href="#">पारिवारिक तथा पर्यटकको आकर्षक गन्तव्य बन्दै, रोयल भिल्ला रिर्सोट</a>
              </h3>
            </article>
          </div>
        </div>
      </div>
    </section>
    
    @php
      $websiteName = SettingHelper::get_field('site_title');
      $before_footer_img = SettingHelper::get_field('before_footer_img');
      $featuredmedia = $before_footer_img ? MediaHelper::getImageById($before_footer_img) : null;
      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
      }
      else {
        $ad_image_url = null;
      }
      $before_footer_url     = SettingHelper::get_field('before_footer_url');
    @endphp
    @if ($before_footer_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="before-footer">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{ $before_footer_url }}" class="co-ad-box co-cr co-cr-h co-cr--novanet" rel="sponsored noopener"><img class="co-cr-img"
              src="{{ $ad_image_url }}" alt="" loading="lazy"><span class="co-cr-in"></a>
        </div>
      </div>
    </div>
    @endif

  </main>
@endsection
