    @if ($rajniti_posts->isNotEmpty())
    @php
      $hero = $rajniti_posts->first();
      $mid = $rajniti_posts->slice(1, 2);
      $list = $rajniti_posts->slice(3, 5);
    @endphp
    <section class="co-section co-politics">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">{{ $rajniti_cat->name }}</h2><span class="co-hatch"></span>
          <a href="{{ $catUrl($rajniti_cat) }}" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-pol">
          <a href="{{ $url($hero) }}" class="co-overlay co-pol-hero">
            <img src="{{ $img($hero) }}" alt="{{ $hero->post_title }}">
            <div class="co-overlay-body">
              <h3 class="co-mark-title co-mark-lg"><span class="co-mark">{{ $hero->post_title }}</span></h3>
              <div class="co-meta co-meta-light"><span>{{ $hero->authors->first()?->name ?? '' }}</span><span>{{ $date($hero) }}</span></div>
            </div>
          </a>

          <div class="co-pol-mid">
            @foreach ($mid as $p)
              <article class="co-pol-card">
                <a href="{{ $url($p) }}" class="co-pol-card-img co-img">
                  <img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy">
                </a>
                <h3 class="co-title-md"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                <div class="co-meta"><span class="co-meta-author">{{ $p->authors->first()?->name ?? '' }}</span><span>{{ $date($p) }}</span></div>
              </article>
            @endforeach
          </div>

          <div class="co-pol-list">
            @foreach ($list as $p)
              <article class="co-pol-item">
                <a href="{{ $url($p) }}" class="co-pol-thumb co-img">
                  <img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy">
                </a>
                <div>
                  <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                  <div class="co-meta"><span class="co-meta-author">{{ $p->authors->first()?->name ?? '' }}</span><span>{{ $date($p) }}</span></div>
                </div>
              </article>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    @endif