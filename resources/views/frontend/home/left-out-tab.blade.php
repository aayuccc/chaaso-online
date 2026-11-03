    @if ($left_out_posts->isNotEmpty())
    <section class="co-section co-missed">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">{{ $left_out_cat->name }}</h2><span class="co-hatch"></span>
        </div>
        <div class="row g-4">
        @foreach ($left_out_posts->take(4) as $p)
          <div class="col-12 col-sm-6 col-lg-3">
            <article class="co-card">
              <a href="{{ $url($p) }}" class="co-card-media co-img"><img src="{{ $img($p) }}"
                  alt="{{ $p->post_title }}"></a>
              <h3 class="co-title-md"><a href="{{ $url($p) }}">{{ $p->post_title }}</a></h3>
            </article>
          </div>
        @endforeach
        </div>
      </div>
    </section>
    @endif