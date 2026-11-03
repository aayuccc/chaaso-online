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
  $after_featured_news = SettingHelper::get_field('after_featured_news');
  $featuredmedia = $after_featured_news ? MediaHelper::getImageById($after_featured_news) : null;
  if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
  $ad_image_url = MediaHelper::WsrvService($featuredmedia);
  }
  else {
  $ad_image_url = null;
  }
  $after_featured_news_url     = SettingHelper::get_field('after_featured_news_url');
@endphp
@if ($after_featured_news_url || $featuredmedia)
    <!-- Ad row -->
    <div class="co-ad-row">
      <div class="container co-container">
        <div class="co-ad co-ad-leader" data-ad-slot="category-top">
          <span class="co-ad-tag">विज्ञापन</span>
          <a href="{{$after_featured_news_url}}" class="co-ad-box co-cr co-cr-h co-cr--sunrise" rel="sponsored noopener">
            <img class="co-cr-img" src="{{$ad_image_url}}" alt="" loading="lazy">
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
                @php
                  $websiteName = SettingHelper::get_field('site_title');
                  $between_category_news = SettingHelper::get_field('between_category_news');
                  $featuredmedia = $between_category_news ? MediaHelper::getImageById($between_category_news) : null;
                  if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                  $ad_image_url = MediaHelper::WsrvService($featuredmedia);
                  }
                  else {
                  $ad_image_url = null;
                  }
                  $between_category_news_url     = SettingHelper::get_field('between_category_news_url');
                @endphp
                @if ($between_category_news_url || $featuredmedia)
                <div class="co-ad co-ad-infeed" data-ad-slot="category-infeed">
                  <span class="co-ad-tag">विज्ञापन</span>
                  <a href="{{ $between_category_news_url }}" class="co-ad-box co-cr co-cr-h co-cr--pahadpay" rel="sponsored noopener"><img class="co-cr-img" src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
                </div>
                @endif
                @endif
              @endforeach
            </div>
            @if ($posts->lastPage() > 1)
              @php
                  $currentPage = $posts->currentPage();
                  $lastPage = $posts->lastPage();

                  $startPage = max(1, $currentPage - 2);
                  $endPage = min($lastPage, $currentPage + 2);

                  // Convert English numbers into Nepali numbers
                  $toNepali = fn($number) => strtr((string) $number, [
                      '0' => '०',
                      '1' => '१',
                      '2' => '२',
                      '3' => '३',
                      '4' => '४',
                      '5' => '५',
                      '6' => '६',
                      '7' => '७',
                      '8' => '८',
                      '9' => '९',
                  ]);
              @endphp

              <nav class="co-pager" aria-label="पृष्ठहरू">

                  {{-- Previous --}}
                  <a href="{{ $posts->previousPageUrl() ?: '#' }}"
                      class="co-pager-btn {{ $posts->onFirstPage() ? 'is-disabled' : '' }}"
                      @if ($posts->onFirstPage()) aria-disabled="true" @endif>
                      <i class="bi bi-arrow-left"></i> अघिल्लो
                  </a>

                  {{-- Page Numbers --}}
                  <div class="co-pager-pages">

                      {{-- First Page --}}
                      @if ($startPage > 1)
                          <a href="{{ $posts->url(1) }}">
                              {{ $toNepali(1) }}
                          </a>

                          @if ($startPage > 2)
                              <span class="dots">...</span>
                          @endif
                      @endif

                      {{-- Middle Pages --}}
                      @for ($page = $startPage; $page <= $endPage; $page++)
                          <a href="{{ $posts->url($page) }}"
                              class="{{ $page === $currentPage ? 'is-active' : '' }}"
                              @if ($page === $currentPage) aria-current="page" @endif>
                              {{ $toNepali($page) }}
                          </a>
                      @endfor

                      {{-- Last Page --}}
                      @if ($endPage < $lastPage)
                          @if ($endPage < $lastPage - 1)
                              <span class="dots">...</span>
                          @endif

                          <a href="{{ $posts->url($lastPage) }}">
                              {{ $toNepali($lastPage) }}
                          </a>
                      @endif

                  </div>

                  {{-- Next --}}
                  <a href="{{ $posts->nextPageUrl() ?: '#' }}"
                      class="co-pager-btn {{ !$posts->hasMorePages() ? 'is-disabled' : '' }}"
                      @if (!$posts->hasMorePages()) aria-disabled="true" @endif>
                      अर्को <i class="bi bi-arrow-right"></i>
                  </a>

              </nav>
          @endif

          </div>

          <aside class="co-split-aside">
            @php
                $belowMastheadAds = SettingHelper::get_field('below_masthead_ads');

                $belowMastheadAds = $belowMastheadAds
                    ? (is_string($belowMastheadAds) ? unserialize($belowMastheadAds) : $belowMastheadAds)
                    : [];

                $belowMastheadAds = is_array($belowMastheadAds) ? $belowMastheadAds : [];
            @endphp

            @if(count($belowMastheadAds))
                @foreach($belowMastheadAds as $index => $ad)

                    @php
                        $featuredmedia = !empty($ad['image'])
                            ? MediaHelper::getImageById($ad['image'])
                            : null;

                        if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                            $ad_image_url = MediaHelper::WsrvService($featuredmedia);
                        } else {
                            $ad_image_url = null;
                        }
                    @endphp

                    @if($ad_image_url)
                        <div class="co-ad {{ $loop->iteration <= 2 ? 'co-ad-square' : 'co-ad-rect' }}"
                            data-ad-slot="category-aside-{{ $loop->iteration }}">

                            <span class="co-ad-tag">विज्ञापन</span>

                            @php
                                $adClasses = [
                                    0 => 'co-ad-box co-cr co-cr-v co-cr--voltride',
                                    1 => 'co-ad-box co-cr co-cr-v co-cr--techhub',
                                    2 => 'co-ad-box co-cr co-cr-v co-cr--skyyatra',
                                ];

                                $adClass = $adClasses[$index] ?? 'co-ad-box co-cr co-cr-v';
                            @endphp

                            <a href="{{ $ad['link'] ?? '#' }}"
                              class="{{ $adClass }}"
                              rel="sponsored noopener"
                              target="_blank">

                                <img
                                    class="co-cr-img"
                                    src="{{ $ad_image_url }}"
                                    alt="विज्ञापन"
                                    loading="lazy">
                            </a>
                        </div>
                    @endif

                @endforeach
            @endif

            <!-- fills the rest of the sidebar: stays in view while the list scrolls -->
            @php
              $websiteName = SettingHelper::get_field('site_title');
              $sidebar_category_long = SettingHelper::get_field('sidebar_category_long');
              $featuredmedia = $sidebar_category_long ? MediaHelper::getImageById($sidebar_category_long) : null;
              if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                $ad_image_url = MediaHelper::WsrvService($featuredmedia);
              }
              else {
              $ad_image_url = null;
              }
              $sidebar_category_long_url     = SettingHelper::get_field('sidebar_category_long_url');
            @endphp
            @if ($sidebar_category_long_url || $featuredmedia)
            <div class="co-ad co-ad-sticky co-aside-sticky" data-ad-slot="category-aside-sticky">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="{{ $sidebar_category_long_url }}" class="co-ad-box co-cr co-cr-v co-cr--lakebreeze" rel="sponsored noopener"><img class="co-cr-img" src="{{ $ad_image_url }}" alt="" loading="lazy"><span class="co-cr-in"></a>
            </div>
            @endif

          </aside>
        </div>
      </div>
    </section>
  </main>
@endsection
