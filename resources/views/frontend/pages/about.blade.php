@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])
@section('main-section')
  <main class="co-main co-page">

    <!-- ================= PAGE HEADER ================= -->
    @include('frontend.common.banner')

    @php
      $featured_image = $metaData['featured_image'] ?? '';
      $content = $post->post_content;
      $about_editor = $metaData['about_editor'] ?? ($post->post_title ?? '');
      $editor_designation = $metaData['editor_designation'] ?? ($post->post_title ?? '');
      $editor_image = $metaData['editor_image'] ?? null;
      $first_additional_image = $metaData['first_additional_image'] ?? null;
      $second_additional_image = $metaData['second_additional_image'] ?? null;
      $featured_media = $featured_image ? MediaHelper::getImageById($featured_image) : null;
      $first_media = $first_additional_image ? MediaHelper::getImageById($first_additional_image) : null;
      $second_media = $second_additional_image ? MediaHelper::getImageById($second_additional_image) : null;
      $editor_media = $editor_image ? MediaHelper::getImageById($editor_image) : null;
      $features = $metaData['feature'];
      $featuresArray = $features ? (is_string($features) ? unserialize($features) : $features) : [];
    @endphp
    @if ($about_editor ||$editor_designation|| $featured_image || $content|| $first_additional_image || $second_additional_image || !empty($featuresArray) || $editor_image)
    <!-- ================= STORY ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-ab-story">
          @if($post->post_content)
          <div class="co-ab-story-text">
            <span class="co-pg-eyebrow"><i class="bi bi-bookmark-star"></i> हाम्रो कथा</span>
            <h2 class="co-pg-lead">समाचार केवल सूचना होइन, <em>सरोकार</em> हो।</h2>
            {!! $post->post_content !!}
            @if(!empty($editor_designation) || !empty($about_editor) || $editor_media)
            <div class="co-ab-sign">
              <img src="{{ asset('storage/' . $editor_media->file_name) }}" alt="" width="52" height="52" loading="lazy">
              <div>
                <strong>{{$about_editor}}</strong>
                <span>{{$editor_designation}}</span>
              </div>
            </div>
            @endif
          </div>
          @endif
          @if ($featured_media || $first_media || $second_media)
          <div class="co-ab-mosaic">
            @if ($featured_media)
            <div class="co-img co-ab-mosaic-a"><img src="{{ asset('storage/' . $featured_media->file_name) }}" alt="चासो अनलाइनको न्युजरुम" loading="lazy"></div>
            @endif
            @if ($first_media)
            <div class="co-img co-ab-mosaic-b"><img src="{{ asset('storage/' . $first_media->file_name) }}" alt="पत्रकार सम्मेलनमा रिपोर्टिङ" loading="lazy"></div>
            @endif
            @if ($second_media)
            <div class="co-img co-ab-mosaic-c"><img src="{{ asset('storage/' . $second_media->file_name) }}" alt="सम्पदकीय बैठक" loading="lazy"></div>
            @endif
            <div class="co-ab-badge">
              <i class="bi bi-patch-check-fill"></i>
              <span><small>सूचना विभाग दर्ता नं.</small>2423/077-78</span>
            </div>
          </div>
          @endif
        </div>
        @if($features)
        <ul class="co-ab-figures mt-5">
          @foreach ($featuresArray as $index => $feature)
            <li><strong>{{$feature['number']}}</strong><span>{{$feature['title']}}</span></li>
          @endforeach
        </ul>
        @endif
      </div>
    </section>
    @endif

    @php
        $values_features = $metaData['values_feature'] ?? [];

        $values_featuresArray = is_string($values_features)
            ? (unserialize($values_features) ?: [])
            : $values_features;
    @endphp

    @if (!empty($values_featuresArray) && is_array($values_featuresArray))
    
    <!-- ================= VALUES ================= -->
    <section class="co-section">
        <div class="container co-container">
            <div class="co-section-head">
                <h2 class="co-section-title">हाम्रा मूल्य</h2>
                <span class="co-hatch"></span>
            </div>

            <div class="co-ab-values">
                @foreach ($values_featuresArray as $index => $values_feature)
                    <article class="co-ab-value">
                        <span class="co-ab-value-no">
                            {{ sprintf('%02d', $index + 1) }}
                        </span>

                        <span class="co-pg-ic">
                            <i class="bi bi-{{ $values_feature['icon'] ?? '' }}"></i>
                        </span>

                        {!! $values_feature['description'] ?? '' !!}
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @php
        $values_steps = $metaData['values_step'] ?? [];

        $values_stepsArray = is_string($values_steps)
            ? (unserialize($values_steps) ?: [])
            : $values_steps;
    @endphp

    @if (!empty($values_stepsArray) && is_array($values_stepsArray))
    <!-- ================= EDITORIAL PROCESS ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">समाचार कसरी बन्छ?</h2><span class="co-hatch"></span>
        </div>
        <ol class="co-ab-steps">
          @foreach ($values_stepsArray as $index => $values_step)
          <li>
            <span class="co-ab-step-dot"><i class="bi bi-{{$values_step['icon'] ?? ''}}"></i></span>
            {!!$values_step['description'] ?? ''!!}
          </li>
          @endforeach
        </ol>
      </div>
    </section>
    @endif

    <!-- ================= COVERAGE ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">हामी के कभर गर्छौं</h2><span class="co-hatch"></span>
        </div>
        <div class="co-ab-cover">
          <a href="#"><i class="bi bi-newspaper"></i><span>समाचार</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="category.html"><i class="bi bi-bank"></i><span>राजनीति</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-graph-up-arrow"></i><span>अर्थ वाणिज्य</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-cup-hot"></i><span>जीवनशैली</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-globe2"></i><span>विश्वव्यापी</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-heart-pulse"></i><span>स्वास्थ्य</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-cpu"></i><span>प्रविधि</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-mortarboard"></i><span>शिक्षा</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-trophy"></i><span>खेलकुद</span><i class="bi bi-arrow-up-right"></i></a>
          <a href="#"><i class="bi bi-grid"></i><span>विविध</span><i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>
    </section>

    <!-- ================= EDITOR'S NOTE + NEXT STEPS ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-ab-close">
          @php
            $editor_quote = $metaData['editor_quote'] ?? ($post->post_title ?? '');
          @endphp
          @if($editor_image ||$editor_designation || $about_editor || $editor_quote)
          <blockquote class="co-quote-card co-ab-quote">
            <i class="bi bi-quote" aria-hidden="true"></i>
            <p>{{$editor_quote}}</p>
            <cite class="co-ab-cite">
              @if($editor_media)
                <img src="{{ asset('storage/' . $editor_media->file_name) }}" alt="" width="44" height="44" loading="lazy">
              @else
                <img src="assets/images/np/woman1.jpg" alt="" width="44" height="44" loading="lazy">
              @endif
              <span><strong>{{ $about_editor }}</strong>{{$editor_designation}}</span>
            </cite>
          </blockquote>
          @endif
          <div class="co-pg-links">
            <a href="{{url('/teams/')}}" class="co-pg-link">
              <span class="co-pg-ic"><i class="bi bi-people"></i></span>
              <span><strong>हाम्रो टिम</strong><small>न्युजरुमका अनुहारहरूलाई चिन्नुहोस्</small></span>
              <i class="bi bi-arrow-right"></i>
            </a>
            <a href="{{url('/contact/')}}" class="co-pg-link">
              <span class="co-pg-ic"><i class="bi bi-chat-dots"></i></span>
              <span><strong>सम्पर्क</strong><small>समाचार टिप, विज्ञापन वा सुझाव पठाउनुहोस्</small></span>
              <i class="bi bi-arrow-right"></i>
            </a>
            <a href="#" class="co-pg-link">
              <span class="co-pg-ic"><i class="bi bi-megaphone"></i></span>
              <span><strong>विज्ञापन</strong><small>लाखौं पाठकसम्म तपाईंको ब्रान्ड पुर्‍याउनुहोस्</small></span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection