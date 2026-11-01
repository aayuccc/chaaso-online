@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])
@section('main-section')
  <main class="co-main co-page">

    <!-- ================= PAGE HEADER ================= -->
    @include('frontend.common.banner')

    @php
      $featured_image = $metaData['featured_image'] ?? '';
      $featured_media = $featured_image ? MediaHelper::getImageById($featured_image) : null;
      $content = $post->post_content;
      $chiefeditor_name = $metaData['chiefeditor_name'] ?? ($post->post_title ?? '');
      $chiefeditor_exp = $metaData['chiefeditor_exp'] ?? ($post->post_title ?? '');
      $chiefeditor_topic = $metaData['chiefeditor_topic'] ?? ($post->post_title ?? '');
      $chiefeditor_lang = $metaData['chiefeditor_lang'] ?? ($post->post_title ?? '');
      $facebook = $metaData['facebook'] ?? ($post->post_title ?? '');
      $instagram = $metaData['instagram'] ?? ($post->post_title ?? '');
      $twitter = $metaData['twitter'] ?? ($post->post_title ?? '');
      $youtube = $metaData['youtube'] ?? ($post->post_title ?? '');
      $tiktok = $metaData['tiktok'] ?? ($post->post_title ?? '');
      $team_email = $metaData['team_email'] ?? ($post->post_title ?? '');
    @endphp
    @if ($chiefeditor_name ||$chiefeditor_exp|| $chiefeditor_topic||$chiefeditor_lang||$facebook||$instagram||$twitter||$youtube||$tiktok||$team_email )
    <!-- ================= LEADERSHIP ================= -->
    <section class="co-section">
      <div class="container co-container">
        <article class="co-tm-lead">
          @if ($featured_media)
          <div class="co-img co-tm-lead-photo"><img src="{{ asset($featured_media->file_name) }}" alt="{{$chiefeditor_name}}"></div>
          @endif
          <div class="co-tm-lead-body">
            <span class="co-pg-eyebrow"><i class="bi bi-award"></i> नेतृत्व</span>
            <h2 class="co-tm-lead-name">{{$chiefeditor_name}}</h2>
            <span class="co-tm-lead-role">प्रधान सम्पादक</span>
            {!!$post->post_content!!}
            <ul class="co-tm-lead-facts">
              @if($chiefeditor_exp)
                <li><i class="bi bi-briefcase"></i> {{$chiefeditor_exp}}</li>
              @endif
              @if($chiefeditor_topic)
                <li><i class="bi bi-pen"></i> {{$chiefeditor_topic}}</li>
              @endif
              @if($chiefeditor_lang)
                <li><i class="bi bi-translate"></i> {{$chiefeditor_lang}}</li>
              @endif
            </ul>
            <div class="co-tm-lead-foot">
              <a href="mailto:{{$team_email}}" class="co-btn"><i class="bi bi-envelope"></i> सम्पर्क गर्नुहोस्</a>
              <div class="co-tm-social">
                @if(!empty($facebook))
                  <a href="{{$facebook}}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                @endif
                @if(!empty($twitter))
                  <a href="{{$twitter}}" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                @endif
                @if(!empty($instagram))
                  <a href="{{$instagram}}" aria-label="instagram"><i class="bi bi-instagram"></i></a>
                @endif
                @if(!empty($youtube))
                  <a href="{{$youtube}}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                @endif
                @if(!empty($tiktok))
                  <a href="{{$tiktok}}" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                @endif
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>
    @endif

    <!-- ================= NEWSROOM ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head co-tm-head">
          <h2 class="co-section-title">न्युजरुम</h2><span class="co-hatch"></span>
          <div class="co-tm-filter" role="group" aria-label="डेस्क अनुसार छान्नुहोस्">
            <button type="button" class="is-active" aria-pressed="true" data-desk="all">सबै</button>
            @foreach ($departments as $department)
            <button type="button" aria-pressed="false" data-desk="dept-{{ $department->id }}">{{ $department->name }}</button>
            @endforeach
          </div>
        </div>

        <div class="co-tm-grid" id="coTeamGrid">
          @foreach ($teams as $team)
          @php
            $teamMeta = $team->postMeta->pluck('meta_value', 'meta_key');
            $teamMedia = $teamMeta->get('featured_image') ? MediaHelper::getImageById($teamMeta->get('featured_image')) : null;
            $teamDesks = $team->categories->map(fn ($department) => 'dept-' . $department->id)->implode(' ');
            $teamInitials = collect(preg_split('/\s+/u', trim($team->post_title)))->take(2)->map(fn ($word) => mb_substr($word, 0, 1))->implode('');
            $teamSocials = [
              'facebook' => ['icon' => 'bi-facebook', 'label' => 'Facebook'],
              'twitter' => ['icon' => 'bi-twitter-x', 'label' => 'X'],
              'instagram' => ['icon' => 'bi-instagram', 'label' => 'Instagram'],
              'youtube' => ['icon' => 'bi-youtube', 'label' => 'YouTube'],
              'tiktok' => ['icon' => 'bi-tiktok', 'label' => 'TikTok'],
            ];
          @endphp
          <article class="co-tm-card" data-desk="{{ $teamDesks }}">
            @if ($teamMedia)
            <div class="co-img co-tm-photo"><img src="{{ asset($teamMedia->file_name) }}" alt="{{ $team->post_title }}" loading="lazy"></div>
            @else
            <div class="co-tm-photo co-tm-initials" aria-hidden="true"><span>{{ $teamInitials }}</span></div>
            @endif
            <div class="co-tm-info">
              @if ($team->categories->isNotEmpty())
              <span class="co-tm-desk">{{ $team->categories->pluck('name')->implode(' · ') }}</span>
              @endif
              <h3>{{ $team->post_title }}</h3>
              @if ($teamMeta->get('designation'))
              <p>{{ $teamMeta->get('designation') }}</p>
              @endif
              <div class="co-tm-social">
                @foreach ($teamSocials as $key => $social)
                @if ($teamMeta->get($key))
                <a href="{{ $teamMeta->get($key) }}" target="_blank" rel="noopener" aria-label="{{ $social['label'] }}"><i class="bi {{ $social['icon'] }}"></i></a>
                @endif
                @endforeach
                @if ($teamMeta->get('team_email'))
                <a href="mailto:{{ $teamMeta->get('team_email') }}" aria-label="इमेल"><i class="bi bi-envelope"></i></a>
                @endif
              </div>
            </div>
          </article>
          @endforeach
        </div>
        <p class="co-tm-empty" id="coTeamEmpty" @if ($teams->isNotEmpty()) hidden @endif>यस डेस्कमा अहिले कुनै सदस्य छैनन्।</p>
      </div>
    </section>

    <!-- ================= JOIN ================= -->
    @php
      $career_section_label = $metaData['career_section_label'] ?? ($post->post_title ?? '');
      $career_section_title = $metaData['career_section_title'] ?? ($post->post_title ?? '');
      $career_section_description = $metaData['career_section_description'] ?? ($post->post_title ?? '');
      $cta_url = $metaData['cta_url'] ?? ($post->post_title ?? '');
      $cta_btn_text = $metaData['cta_btn_text'] ?? ($post->post_title ?? '');
      $career_job_listingss = $metaData['career_job_listings'];
      $career_job_listingssArray = $career_job_listingss ? (is_string($career_job_listingss) ? unserialize($career_job_listingss) : $career_job_listingss) : [];
    @endphp
    @if ($career_section_label ||$career_section_title|| $career_section_description||$cta_url||$cta_btn_text||$career_job_listingssArray)
    <section class="co-section">
      <div class="container co-container">
        <div class="co-tm-join">
          <div class="co-tm-join-text">
            @if($career_section_label)
              <span class="co-pg-eyebrow"><i class="bi bi-stars"></i> {{$career_section_label}}</span>
            @endif
            @if($career_section_title)
              <h2 class="co-pg-lead">{{ $career_section_title }}</h2>
            @endif
            @if($career_section_description)
              <p>{{ $career_section_description }}</p>
            @endif
            @if($cta_btn_text || $cta_url)
              <a href="mailto:{{ $cta_url }}" class="co-btn"><i class="bi bi-send"></i> {{ $cta_btn_text }}</a>
            @endif
          </div>
          @if($career_job_listingss)
          <ul class="co-tm-jobs">
            @foreach ($career_job_listingssArray as $index => $job)
            <li>
              <div><strong>{{ $job['job_title'] ?? '' }}</strong><span><i class="bi bi-geo-alt"></i> {{ $job['job_location'] ?? '' }}</span></div>
              <span class="co-tm-job-type">{{ $job['job_type'] ?? '' }}</span>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </section>
    @endif

  </main>

@endsection