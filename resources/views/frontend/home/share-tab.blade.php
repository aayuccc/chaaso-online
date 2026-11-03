    @php
      $triCols = collect([
        [$share_cat, $share_posts],
        [$auto_cat, $auto_posts],
        [$agriculture_cat, $agriculture_posts],
      ])->filter(fn($col) => $col[1]->isNotEmpty());
    @endphp
    @if ($triCols->isNotEmpty())
    <section class="co-section">
      <div class="container co-container">
        <div class="co-tri-cols">
          @foreach ($triCols as [$cat, $posts])
            @php $feature = $posts->first(); @endphp
            <div class="co-tri-col">
              <div class="co-section-head">
                <h2 class="co-section-title">{{ $cat->name }}</h2><span class="co-hatch co-hatch-sm"></span>
                <a href="{{ $catUrl($cat) }}" class="co-more co-more-icon" aria-label="{{ $cat->name }} थप"><i class="bi bi-arrow-right"></i></a>
              </div>
              <a href="{{ $url($feature) }}" class="co-overlay co-tri-feature">
                <img src="{{ $img($feature) }}" alt="{{ $feature->post_title }}" loading="lazy">
                <div class="co-overlay-body">
                  <h3 class="co-mark-title co-mark-sm"><span class="co-mark">{{ $feature->post_title }}</span></h3>
                </div>
              </a>
              <div class="co-mini-list co-mini-list-sm">
                @foreach ($posts->slice(1, 3) as $p)
                  <article class="co-mini"><a href="{{ $url($p) }}" class="co-mini-thumb co-img"><img src="{{ $img($p) }}" alt="{{ $p->post_title }}" loading="lazy"></a>
                    <div>
                      <h3 class="co-title-sm"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
                    </div>
                  </article>
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif