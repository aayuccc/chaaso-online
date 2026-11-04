@extends('frontend.layouts.app', ['payload' => $post, 'payloadMeta' => $metaData, 'title' => $post->post_title])
@section('main-section')

  @php
    $address = SettingHelper::get_field('address');
    $email_address = SettingHelper::get_field('email_address');
    $adv_email_address = SettingHelper::get_field('adv_email_address');
    $complaint_email_address = SettingHelper::get_field('complaint_email_address');
    $registration_number = SettingHelper::get_field('registration_number');
    $opening_hours = SettingHelper::get_field('opening_hours');
    $facebook = SettingHelper::get_field('facebook');
    $linkedin = SettingHelper::get_field('linkedin');
    $twitter = SettingHelper::get_field('twitter');
    $instagram = SettingHelper::get_field('instagram');
    $youtube = SettingHelper::get_field('youtube');
    $tiktok = SettingHelper::get_field('tiktok');
    $map_url = SettingHelper::get_field('map_url');
    $map_link = SettingHelper::get_field('map_link');
  @endphp
  <main class="co-main co-page">

    <!-- ================= PAGE HEADER ================= -->
    @include('frontend.common.banner')

    @if($email_address || $adv_email_address || $complaint_email_address)
    <!-- ================= CHANNELS ================= -->
    <section class="co-section co-ct-channels-wrap">
      <div class="container co-container">
        <div class="co-ct-channels">
          @if($email_address)
          <a href="mailto:{{ $email_address }}?subject=समाचार टिप" class="co-ct-channel">
            <span class="co-pg-ic"><i class="bi bi-lightning-charge"></i></span>
            <h2>समाचार टिप</h2>
            <p>तपाईंको वरिपरि भइरहेको घटना वा जानकारी गोप्य रूपमै पठाउनुहोस्।</p>
            <span class="co-ct-channel-cta">टिप पठाउनुहोस् <i class="bi bi-arrow-right"></i></span>
          </a>
          @endif
          @if($adv_email_address)
          <a href="mailto:{{ $adv_email_address }}?subject=विज्ञापन" class="co-ct-channel">
            <span class="co-pg-ic"><i class="bi bi-megaphone"></i></span>
            <h2>विज्ञापन</h2>
            <p>ब्यानर, प्रायोजित सामग्री वा अभियानका लागि दर र प्याकेज सोध्नुहोस्।</p>
            <span class="co-ct-channel-cta">दर सोध्नुहोस् <i class="bi bi-arrow-right"></i></span>
          </a>
          @endif
          @if($complaint_email_address)
          <a href="mailto:{{ $complaint_email_address }}?subject=सुधार अनुरोध" class="co-ct-channel">
            <span class="co-pg-ic"><i class="bi bi-flag"></i></span>
            <h2>सुधार / गुनासो</h2>
            <p>प्रकाशित सामग्रीमा त्रुटि देखे लिङ्कसहित जानकारी दिनुहोस्।</p>
            <span class="co-ct-channel-cta">जानकारी दिनुहोस् <i class="bi bi-arrow-right"></i></span>
          </a>
          @endif
        </div>
      </div>
    </section>
    @endif

    <!-- ================= FORM + INFO ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-ct-grid">

          <livewire:form.contact-form />

          @if($address || $email_address || $registration_number || $opening_hours)
          <aside class="co-ct-side">
            <div class="co-ct-info">
              <h2>न्युजरुम</h2>
              <ul>
                @if($address)
                <li>
                  <span class="co-pg-ic"><i class="bi bi-geo-alt"></i></span>
                  <div><small>ठेगाना</small>{{ $address }}</div>
                </li>
                @endif
                @if($email_address)
                <li>
                  <span class="co-pg-ic"><i class="bi bi-envelope"></i></span>
                  <div><small>इमेल</small><a href="mailto:{{ $email_address }}">{{ $email_address }}</a></div>
                  <button type="button" class="co-ct-copy" data-copy-text="{{ $email_address }}" aria-label="इमेल कपी गर्नुहोस्"><i class="bi bi-copy"></i><span>कपी भयो</span></button>
                </li>
                @endif
                @if($opening_hours)
                <li>
                  <span class="co-pg-ic"><i class="bi bi-clock"></i></span>
                  <div><small>कार्यालय समय</small>{{$opening_hours}}</div>
                </li>
                @endif
                @if($registration_number)
                <li>
                  <span class="co-pg-ic"><i class="bi bi-patch-check"></i></span>
                  <div><small>सूचना विभाग दर्ता नं.</small>{{$registration_number}}</div>
                </li>
                @endif
              </ul>
              @if($facebook || $linkedin || $twitter || $instagram || $youtube || $tiktok)
              <div class="co-ct-follow">
                <span>फलो गर्नुहोस्</span>
                <div class="co-tm-social">
                  <a href="{{ $facebook }}" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $instagram }}" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $twitter }}" aria-label="X"><i class="bi bi-twitter-x"></i></a>
                  <a href="{{ $youtube }}" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                  <a href="{{ $tiktok }}" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                </div>
              </div>
              @endif
            </div>
            @if($map_url)
            <div class="co-ct-map">
              {{$map_url}}
              @if($map_link)
              <a href="{{ $map_link }}" target="_blank" rel="noopener" class="co-ct-map-link"><i class="bi bi-sign-turn-right"></i> दिशा हेर्नुहोस्</a>
              @endif
            </div>
            @endif
          </aside>
          @endif
        </div>
      </div>
    </section>

    @php
        $faqs = $metaData['faq'] ?? [];

        $faqsArray = is_string($faqs)
            ? (unserialize($faqs) ?: [])
            : $faqs;
    @endphp

    @if (!empty($faqsArray) && is_array($faqsArray))
    <!-- ================= FAQ ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">प्रायः सोधिने प्रश्न</h2><span class="co-hatch"></span>
        </div>
        <div class="co-ct-faq">
          @foreach ($faqsArray as $index => $faq)
            <details class="co-ct-q" {{ $index == 1 ? 'open' : '' }}>
                <summary>
                    {{ $faq['question'] ?? '' }}
                    <i class="bi bi-plus-lg"></i>
                </summary>
                <p>{{ $faq['answer'] ?? '' }}</p>
            </details>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  </main>
@endsection