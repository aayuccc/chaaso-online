@extends('frontend.layouts.app', ['payload' => null, 'payloadMeta' => null, 'title' => 'फोटो फिचर'])

@include('frontend.common.breadcrumb-schema', ['breadcrumbs' => [
    'गृहपृष्ठ' => route('frontend.home'),
    'फोटो फिचर' => url()->current(),
]])

@section('main-section')
  
<main class="co-main">
    <article class="co-pf" id="coPf">

      <!-- ================= HEAD: title block + photo mosaic ================= -->
      <header class="co-pf-hero">
        <div class="container co-container">
          <nav class="co-crumbs" aria-label="ब्रेडक्रम्ब">
            <a href="{{url('/')}}"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
            <i class="bi bi-chevron-right" aria-hidden="true"></i>
            <a href="{{url('/')}}#photo-feature">फोटो फिचर</a>
            <i class="bi bi-chevron-right" aria-hidden="true"></i>
            <span aria-current="page">{{$post->post_title}}</span>
          </nav>

          <div class="co-pf-head">
            <div class="co-pf-kicker mb-3">
              <span class="co-pf-badge"><i class="bi bi-images"></i> फोटो फिचर</span>
              @php
                $photo_location = $metaData['photo_location'] ?? '';
              @endphp
              @if($photo_location)<span><i class="bi bi-geo-alt"></i> {{$photo_location}}</span>@endif
              <!-- <span><span data-pf-total>७</span> तस्बिर</span> -->
            </div>
            <h1 class="co-pf-title">{{$post->post_title}}</h1>

            <div class="co-pf-bar">
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
                  <span class="co-art-meta"><span>{{ NepaliDateHelper::format($post->created_at, true) }}</span></span>
                </div>
              </div>
              @endif
              <div class="co-pf-actions">
                <!-- <a href="story.html?s=0" class="co-pf-btn co-pf-btn-dark"><i class="bi bi-play-circle-fill"></i> स्टोरी मोडमा हेर्नुहोस्</a> -->
                <div class="co-share">
                  <a href="#" class="co-share-fb" aria-label="Facebook मा सेयर गर्नुहोस्"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="co-share-x" aria-label="X मा सेयर गर्नुहोस्"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" class="co-share-wa" aria-label="WhatsApp मा सेयर गर्नुहोस्"><i class="bi bi-whatsapp"></i></a>
                  <button type="button" class="co-share-copy" aria-label="लिङ्क कपी गर्नुहोस्" data-copy-link><i class="bi bi-link-45deg"></i><span class="co-share-done">कपी भयो</span></button>
                </div>
              </div>
            </div>
          </div>

          <!-- mosaic: leave empty in the backend — photo-feature.js fills it from the photos below (first 5); hidden if there are fewer than 3 -->
          <div class="co-pf-mosaic" id="pfMosaic" aria-label="तस्बिर झलक"></div>
        </div>
      </header>

      <div class="co-section co-pf-wrap">
        <div class="container co-container">
          <div class="co-pf-layout">

            <!-- desktop: sticky contact strip that follows the reader -->
            <aside class="co-pf-rail" aria-label="तस्बिर सूची">
              <div class="co-pf-rail-in">
                <span class="co-pf-rail-count"><strong id="pfNow">०१</strong><small>/ <span data-pf-total>०७</span></small></span>
                <ol class="co-pf-rail-list" id="pfRail"></ol>
                <button type="button" class="co-pf-rail-all" data-pf-open="0" aria-label="सबै तस्बिर ठूलो गरी हेर्नुहोस्"><i class="bi bi-grid-3x3-gap"></i></button>
              </div>
            </aside>

            <div class="co-pf-main" id="pfMain">
              {!!$post->post_content!!}

              @foreach ($documents as $item)
                <figure class="co-pf-shot">
                  <img src="{{ asset($item['media']->file_name) }}" alt="{{ strip_tags($item['title']) ?: $post->post_title }}" @if (!$loop->first) loading="lazy" @endif>
                  @if($item['media']->caption)<figcaption> {{ $item['media']->caption ?? '' }}</figcaption>@endif
                </figure>
                @if (trim(strip_tags($item['title'])) !== '')
                    <div class="co-art-body co-pf-text">
                        {!! $item['title'] !!}
                    </div>
                @endif
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </article>

    <!-- ================= MORE PHOTO FEATURES ================= -->
    @if ($morePhotoFeatures->isNotEmpty())
    <section class="co-section co-pf-more">
      <div class="container co-container">

        <div class="co-section-head">
          <h2 class="co-section-title">थप फोटो फिचर</h2><span class="co-hatch"></span>
          <a href="{{ url('/photo-feature') }}/" class="co-more">सबै हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-pf-grid">
          @foreach ($morePhotoFeatures as $item)
            @php
                $item_document = @unserialize((string) $item->postMeta->firstWhere('meta_key', 'document')?->meta_value);
                $item_photos = is_array($item_document) ? array_values(array_filter(array_column($item_document, 'image'))) : [];
                $item_count = count($item_photos);
                // no featured image field on photo features, so fall back to the first photo
                $item_image_id = $item->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value ?: ($item_photos[0] ?? null);
                $item_image = $item_image_id ? MediaHelper::WsrvService(MediaHelper::getImageById($item_image_id)) : null;
            @endphp
            <a href="{{ route('frontend.photo_feature.show', $item->id) }}" class="co-pf-card">
              @if ($item_image)
                <img src="{{ $item_image }}" alt="{{ $item->post_title }}" loading="lazy">
              @endif
              @if ($item_count)
                <span class="co-pf-card-count"><i class="bi bi-images"></i> {{ strtr((string) $item_count, ['0' => '०', '1' => '१', '2' => '२', '3' => '३', '4' => '४', '5' => '५', '6' => '६', '7' => '७', '8' => '८', '9' => '९']) }}</span>
              @endif
              <strong>{{ $item->post_title }}</strong>
            </a>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  </main>

  <!-- ================= PHOTO VIEWER (lightbox) ================= -->
  <dialog class="co-pf-lb" id="pfLb" aria-label="तस्बिर हेर्नुहोस्">
    <div class="co-pf-lb-bg" aria-hidden="true"><img id="pfLbBg" src="" alt=""></div>
    <div class="co-pf-lb-top">
      <span class="co-pf-lb-count" id="pfLbCount"></span>
      <strong class="co-pf-lb-title">{{ $post->post_title }}</strong>
      <!-- <a href="story.html?s=0" class="co-pf-lb-ic" aria-label="स्टोरी मोडमा हेर्नुहोस्" title="स्टोरी मोड"><i class="bi bi-play-circle"></i></a> -->
      <button type="button" class="co-pf-lb-ic" id="pfLbClose" aria-label="बन्द गर्नुहोस्"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="co-pf-lb-stage" id="pfLbStage">
      <button type="button" class="co-pf-lb-nav co-pf-lb-prev" id="pfLbPrev" aria-label="अघिल्लो तस्बिर"><i class="bi bi-chevron-left"></i></button>
      <img class="co-pf-lb-img" id="pfLbImg" src="" alt="">
      <button type="button" class="co-pf-lb-nav co-pf-lb-next" id="pfLbNext" aria-label="अर्को तस्बिर"><i class="bi bi-chevron-right"></i></button>
    </div>
    <p class="co-pf-lb-cap" id="pfLbCap" aria-live="polite"></p>
    <div class="co-pf-lb-strip" id="pfLbStrip"></div>
  </dialog>
@endsection