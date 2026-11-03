    @if ($interview_posts->isNotEmpty() || $idea_posts->isNotEmpty())
    <section class="co-section">
      <div class="container co-container">
        <div class="co-split">
          <div class="co-split-main">
            @if ($interview_posts->isNotEmpty())
            @php $feature = $interview_posts->first(); @endphp
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $interview_cat->name }}</h2><span class="co-hatch"></span>
              <a href="{{ $catUrl($interview_cat) }}" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
            </div>
            <article class="co-interview co-grow">
              <div class="co-interview-body">
                <i class="bi bi-quote co-interview-quote"></i>
                <h3 class="co-interview-title"><a href="{{ $url($feature) }}">{{ $feature->post_title }}</a></h3>
                @if ($excerpt($feature))<p>{{ $excerpt($feature, 200) }}</p>@endif
                <div class="co-interview-foot">
                  <div class="co-meta co-meta-light"><span><i class="bi bi-clock-history"></i> {{ $date($feature) }}</span>
                  </div>
                  <a href="{{ $url($feature) }}" class="co-btn-light">पूरा पढ्नुहोस् <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
              <a href="{{ $url($feature) }}" class="co-interview-media co-img"><img src="{{ $img($feature) }}" alt="{{ $feature->post_title }}"></a>
            </article>
            @endif
            @php
              $websiteName = SettingHelper::get_field('site_title');
              $after_interview_img = SettingHelper::get_field('after_interview_img');
              $featuredmedia = $after_interview_img ? MediaHelper::getImageById($after_interview_img) : null;
              if (!empty($featuredmedia) && !empty($featuredmedia->file_name)) {
                $ad_image_url = MediaHelper::WsrvService($featuredmedia);
              }
              else {
                $ad_image_url = null;
              }
              $after_interview_url     = SettingHelper::get_field('after_interview_url');
            @endphp
            @if ($after_interview_url || $featuredmedia)
            <div class="co-ad co-ad-infeed co-ad-under" data-ad-slot="under-interview">
              <span class="co-ad-tag">विज्ञापन</span>
              <a href="{{$after_interview_url}}" class="co-ad-box co-cr co-cr-h co-cr--careshield" rel="sponsored noopener"><img
                  class="co-cr-img" src="{{ $ad_image_url }}" alt="" loading="lazy"></a>
            </div>
            @endif
          </div>

          <div class="co-split-aside">
            @if ($idea_posts->isNotEmpty())
            <div class="co-section-head">
              <h2 class="co-section-title">{{ $idea_cat->name }}</h2><span class="co-hatch co-hatch-sm"></span>
            </div>
            <div class="co-opinion-card co-grow co-spread">
              @foreach ($idea_posts->take(4) as $p)
                <article class="co-opinion">
                  <img class="co-opinion-avatar" src="{{ $img($p) }}" alt="" loading="lazy">
                  <div>
                    <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                    <span class="co-opinion-author"><i class="bi bi-pen"></i> {{ $p->authors->first()?->name ?? '' }}</span>
                  </div>
                </article>
              @endforeach
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    @endif