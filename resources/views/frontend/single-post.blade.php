@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $postMeta, 'title' => $post->post_title])

@push('schema')
@php
  $schemaWebsiteName = $settings['site_title'] ?? '';
  $schemaLogoId = $settings['header_logo'] ?? null;
  $schemaLogoMedia = $schemaLogoId ? MediaHelper::getImageById($schemaLogoId) : null;
  $schemaLogoUrl = ($schemaLogoMedia && !empty($schemaLogoMedia->file_name))
      ? asset($schemaLogoMedia->file_name)
      : '';

  // Google's NewsArticle publisher logo does not accept SVG.
  if ($schemaLogoUrl !== '' && str_ends_with(strtolower(parse_url($schemaLogoUrl, PHP_URL_PATH) ?: ''), '.svg')) {
      $schemaLogoUrl = '';
  }

  $schemaFeaturedId = $postMeta['featured_image'] ?? null;
  $schemaFeaturedMedia = MediaHelper::getImageById($schemaFeaturedId);
  $schemaImageUrl = ($schemaFeaturedMedia && !empty($schemaFeaturedMedia->file_name))
      ? asset($schemaFeaturedMedia->file_name)
      : '';

  $schemaAuthorType = $author ? 'Person' : 'Organization';
  $schemaAuthorName = $author ? $author->name : ($schemaWebsiteName ?: 'चासो');
  $schemaAuthorUrl = ($author && Route::has('frontend.author.index'))
      ? route('frontend.author.index', $author->slug)
      : url('/');
  $schemaCanonicalUrl = url()->current();

  $schemaData = [
    '@context' => 'https://schema.org',
    '@type'    => 'NewsArticle',
    'headline' => $post->post_title,
    'author'   => [
      '@type' => $schemaAuthorType,
      'name'  => $schemaAuthorName,
      'url'   => $schemaAuthorUrl,
    ],
    'publisher' => [
      '@type' => 'Organization',
      'name'  => $schemaWebsiteName,
    ],
    'datePublished'   => $post->created_at->toIso8601String(),
    'dateModified'    => $post->updated_at->toIso8601String(),
    'mainEntityOfPage' => [
      '@type' => 'WebPage',
      '@id'   => $schemaCanonicalUrl,
    ],
  ];

  if ($schemaLogoUrl !== '') {
    $schemaData['publisher']['logo'] = [
      '@type' => 'ImageObject',
      'url'   => $schemaLogoUrl,
    ];
  }

  if (!empty($postMeta['short_desc'])) {
    $schemaData['description'] = $postMeta['short_desc'];
  }

  if ($schemaImageUrl !== '') {
    $schemaData['image'] = $schemaImageUrl;
  }

  $schemaJson = json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

  $schemaCrumbs = [
      'गृहपृष्ठ' => route('frontend.home'),
  ];
  if (!empty($category_name) && $category && Route::has('frontend.category.index')) {
      $schemaCrumbs[$category_name] = route('frontend.category.index', $category->slug);
  }
  $schemaCrumbs[$post->post_title] = $schemaCanonicalUrl;
@endphp
<script type="application/ld+json">{!! $schemaJson !!}</script>
@endpush

@include('frontend.common.breadcrumb-schema', ['breadcrumbs' => $schemaCrumbs])

@section('main-section')
  <main class="co-main">
    <!-- Floating reading bar (appears once the cover scrolls away) -->
    <div class="co-readbar" id="coReadbar" aria-hidden="true">
      <div class="container co-container co-readbar-in">
        <svg class="co-ring" viewBox="0 0 36 36" aria-hidden="true"><circle cx="18" cy="18" r="15.5"/><circle class="co-ring-fill" id="coRing" cx="18" cy="18" r="15.5"/></svg>
        <span class="co-readbar-title">{{$post->post_title}}</span>

        <div class="co-fontsize">
          <button type="button" data-font="-1" aria-label="अक्षर सानो गर्नुहोस्" tabindex="-1">अ−</button>
          <button type="button" data-font="1" aria-label="अक्षर ठूलो गर्नुहोस्" tabindex="-1">अ+</button>
          <button type="button" class="co-fontsize-reset" data-font-reset aria-label="अक्षरको आकार पहिलेजस्तै बनाउनुहोस्" title="रिसेट" tabindex="-1"><i class="bi bi-arrow-counterclockwise"></i></button>
        </div>

        <div class="co-share co-readbar-share">
          <span class="co-readbar-share-label">सेयर</span>
          <a href="#" class="co-share-fb" aria-label="Facebook मा सेयर गर्नुहोस्" tabindex="-1"><i class="bi bi-facebook"></i></a>
          <a href="#" class="co-share-x" aria-label="X मा सेयर गर्नुहोस्" tabindex="-1"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="co-share-wa" aria-label="WhatsApp मा सेयर गर्नुहोस्" tabindex="-1"><i class="bi bi-whatsapp"></i></a>
          <button type="button" class="co-share-copy" aria-label="लिङ्क कपी गर्नुहोस्" data-copy-link tabindex="-1"><i class="bi bi-link-45deg"></i><span class="co-share-done">कपी भयो</span></button>
        </div>
        
      </div>
    </div>

    <article class="co-article">

      <!-- ================= ARTICLE HEAD: headline block, then photo ================= -->
      <header class="co-cover">
        <div class="container co-container">
          @php
              // no frontend category route yet, so fall back to '#' instead of throwing
              $category_url = ($category && Route::has('frontend.category.index'))
                  ? route('frontend.category.index', $category->slug)
                  : '#';
          @endphp
          <nav class="co-crumbs" aria-label="ब्रेडक्रम्ब">
            <a href="{{ route('frontend.home') }}"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
            @if(!empty($category_name))<i class="bi bi-chevron-right" aria-hidden="true"></i>
            <a href="{{ $category_url }}">{{ $category_name }}</a>@endif
          </nav>
          <div class="co-cover-panel">

            <h1 class="co-art-title">{{$post->post_title}}</h1>
            @php
                $short_desc = $metaData['short_desc'] ?? '';
            @endphp
            @if($short_desc)
            <p class="co-art-dek">{{ $short_desc }}</p>
            @endif
            <div class="co-cover-bar">
              @php
                $author_name = $author->name ?? '';
                $authordesc = $author->description ?? '';
                $author_url = ($author && Route::has('frontend.author.index')) ? route('frontend.author.index', $author->slug) : '#';
              @endphp
              @if($author_name || $authordesc)
              <div class="co-art-byline">
                <span class="co-art-av" aria-hidden="true">{{ mb_substr($author_name, 0, 2) }}</span>
                <div>
                  <strong>{{$author_name}}</strong>
                  <span class="co-art-meta"><span>{{ NepaliDateHelper::format($post->created_at, true) }}</span><span>६ मिनेट पढाइ</span><span><i class="bi bi-eye"></i> {{ NepaliDateHelper::digits(number_format($post->views ?? 0)) }}</span></span>
                </div>
              </div>
              @endif

              <div class="co-share">
                  <a href="#" class="co-share-fb" aria-label="Facebook मा सेयर गर्नुहोस्"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="co-share-x" aria-label="X मा सेयर गर्नुहोस्"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" class="co-share-wa" aria-label="WhatsApp मा सेयर गर्नुहोस्"><i class="bi bi-whatsapp"></i></a>
                  <button type="button" class="co-share-copy" aria-label="लिङ्क कपी गर्नुहोस्" data-copy-link><i class="bi bi-link-45deg"></i><span class="co-share-done">कपी भयो</span></button>
              </div>

            </div>
          </div>
          <!-- cover photo + ad column: ads stretch to the photo's height, label sits on the caption line -->
          <div class="co-cover-row">
            @php
                $featured_image = $postMeta['featured_image'] ?? null;
                $media = MediaHelper::getImageById($featured_image);
                if (!empty($featured_image) && !empty($media->file_name)) {
                    $featured_image_url = MediaHelper::WsrvService($media);
                }
                else {
                    $featured_image_url = null;
                }
            @endphp
            @if($featured_image_url)
            <figure class="co-cover-media">
              <div class="co-img"><img src="{{ $featured_image_url }}" alt="{{$post->post_title}}"></div>
              <figcaption><i class="bi bi-camera"></i> {{$post->post_title}} · चासो अनलाइन</figcaption>
            </figure>
            @endif

            <!-- ad section -->
             @php
                $header_popup_ads = SettingHelper::get_field('header_popup_ads');

                $header_popup_ads = $header_popup_ads
                    ? (is_string($header_popup_ads) ? unserialize($header_popup_ads) : $header_popup_ads)
                    : [];

                $header_popup_ads = is_array($header_popup_ads) ? $header_popup_ads : [];
            @endphp

            @if(count($header_popup_ads))
            <div class="co-cover-ads" role="complementary" aria-label="विज्ञापन">
              <div class="co-cover-ads-list">
                @foreach($header_popup_ads as $index => $ad)
                  @php
                    $featuredmedia = !empty($ad['image']) ? MediaHelper::getImageById($ad['image']) : null;
                      if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                        $ad_image_url = MediaHelper::WsrvService($featuredmedia);
                      } else {
                        $ad_image_url = null;
                      }
                  @endphp
                  @if($ad_image_url)
                    <div class="co-ad" data-ad-slot="detail-cover-{{ $loop->iteration }}">
                      <!-- <span class="co-ad-tag">विज्ञापन</span> -->
                        @php
                          $adClasses = [
                          0 => 'co-ad-box co-cr co-cr-h co-cr--novanet',
                          1 => 'co-ad-box co-cr co-cr-h co-cr--pahadpay',
                          2 => 'co-ad-box co-cr co-cr-h co-cr--skyyatra',
                          ];
                          $adClass = $adClasses[$index] ?? 'co-ad-box co-cr co-cr-h';
                        @endphp
                        <a href="{{ $ad['link'] ?? '#' }}" class="{{ $adClass }}" rel="sponsored noopener" target="_blank">
                          <img class="co-cr-img" src="{{ $ad_image_url }}" alt="विज्ञापन" loading="lazy">
                        </a>
                    </div>
                  @endif
                @endforeach
              </div>
              <span class="co-ad-tag">विज्ञापन</span>
            </div>
            @endif
          </div>
        </div>
      </header>

      <!-- ================= READING COLUMN + CONTENTS ================= -->
      <div class="co-section co-art-wrap">
        <div class="container co-container">
          <div class="co-read">
            <div class="co-read-main">
              @php
                  $summary = $metaData['summary'] ?? '';
              @endphp
              @if($summary)
                <!-- summary -->
              <details class="co-summary" open>
                <summary><span class="co-summary-label"><span class="co-summary-ic"><i class="bi bi-stars"></i></span> समाचार सारांश <small>३० सेकेन्डमा</small></span><i class="bi bi-chevron-down co-summary-caret"></i></summary>
                {!! $summary !!}
              </details>
              @endif

              <div class="co-art-body" id="coArtBody">
                {!!$post->post_content!!}
              </div>

              <div class="co-art-foot">
                @if ($tags->isNotEmpty())
                <div class="co-art-tags">
                  <span><i class="bi bi-tags"></i> विषय</span>
                  @foreach ($tags as $tag)<a href="{{ route('frontend.tag.index', $tag->slug) }}">#{{ $tag->name }}</a>@endforeach
                </div>
                @endif
              </div>

                @php
                    $author_name = $author->name ?? '';
                    $authordesc = $author->description ?? '';
                    $author_url = ($author && Route::has('frontend.author.index'))
                        ? route('frontend.author.index', $author->slug)
                        : '#';
                @endphp
                @if($author_name || $authordesc)
                    <div class="co-author-box">
                        <span class="co-art-av co-art-av-lg" aria-hidden="true">{{ mb_substr($author_name, 0, 2) }}</span>
                        <div>
                        <small>लेखक</small>
                        <strong>{{ $author_name }}</strong>
                        @if(!empty($author->description))
                        <p>{{ $author->description }}</p>
                        @endif
                        </div>
                        <a href="{{ $author_url }}" class="co-more">थप समाचार <i class="bi bi-arrow-right"></i></a>
                    </div>
                @endif

            </div>

            <aside class="co-read-side">

                <div class="co-section-head">
                    <h2 class="co-section-title">यो पनि हेर्नुहोस्</h2><span class="co-hatch co-hatch-sm"></span>
                </div>
                <div class="co-mini-list co-mini-list-sm">
                    @foreach($latestNews as $item)
                    @php
                        $item_image = MediaHelper::WsrvService(MediaHelper::getImageById($item->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
                        $item_url = route('frontend.news.show', $item->id);
                    @endphp
                    <article class="co-mini">
                        @if($item_image)
                        <a href="{{ $item_url }}" class="co-mini-thumb co-img"><img src="{{ $item_image }}" alt="{{ $item->post_title }}" loading="lazy"></a>
                        @endif
                        <div><h3 class="co-title-sm"><a href="{{ $item_url }}">{{ $item->post_title }}</a></h3><div class="co-meta"><span>{{ NepaliDateHelper::format($item->created_at) }}</span></div></div>
                    </article>
                    @endforeach
                </div>
                <!-- ads section -->
                @php
                  $websiteName = SettingHelper::get_field('site_title');
                  $after_relatednews_long = SettingHelper::get_field('after_relatednews_long');
                  $featuredmedia = $after_relatednews_long ? MediaHelper::getImageById($after_relatednews_long) : null;
                  if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                    $ad_image_url = MediaHelper::WsrvService($featuredmedia);
                  }
                  else {
                  $ad_image_url = null;
                  }
                  $after_relatednews_long_url     = SettingHelper::get_field('after_relatednews_long_url');
                @endphp
                @if ($after_relatednews_long_url || $featuredmedia)
                <div class="co-ad co-ad-sticky co-aside-sticky" data-ad-slot="article-aside-sticky">
                    <span class="co-ad-tag">विज्ञापन</span>
                    <a href="{{ $after_relatednews_long_url }}" class="co-ad-box co-cr co-cr-v co-cr--lakebreeze" rel="sponsored noopener"><img class="co-cr-img" src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
                </div>
                @endif

            </aside>
          </div>
        </div>
      </div>
    </article>

    <!-- ================= RELATED ================= -->
    @if($relatedPosts->isNotEmpty())
    <section class="co-section co-related">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">सम्बन्धित समाचार</h2><span class="co-hatch"></span>
          <a href="{{ $category_url }}" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-related-grid">
          @foreach($relatedPosts->take(4) as $item)
          @php
              $item_image = MediaHelper::WsrvService(MediaHelper::getImageById($item->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
              $item_url = route('frontend.news.show', $item->id);
          @endphp
          <article class="co-card co-cat-card">
            @if($item_image)
            <a href="{{ $item_url }}" class="co-card-media co-img"><img src="{{ $item_image }}" alt="{{ $item->post_title }}" loading="lazy"></a>
            @endif
            <h3 class="co-title-md"><a href="{{ $item_url }}">{{ $item->post_title }}</a></h3>
            <div class="co-meta">
                @php
                    $author_name = $author->name ?? '';
                @endphp
                @if($author_name)<span class="co-meta-author">{{$author_name}}</span>@endif<span>{{ NepaliDateHelper::format($item->created_at) }}</span></div>
          </article>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  </main>
@endsection
