    @if ($it_tech_posts->isNotEmpty())
    @php $techClasses = ['co-tech-big', '', '', 'co-tech-wide']; @endphp
    <section class="co-section co-band-soft">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">{{ $it_tech_cat->name }}</h2><span class="co-hatch"></span>
          <a href="{{ $catUrl($it_tech_cat) }}" class="co-more">थप हेर्नुहोस् <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-tech-grid">
          @foreach ($it_tech_posts->take(4) as $p)
            <a href="{{ $url($p) }}" class="co-overlay co-tech-card {{ $techClasses[$loop->index] }}">
              <img src="{{ $img($p) }}" alt="{{ $p->post_title }}" @unless ($loop->first) loading="lazy" @endunless>
              <div class="co-overlay-body">
                <h3 class="co-mark-title {{ $loop->first ? 'co-mark-lg' : 'co-mark-sm' }}"><span class="co-mark">{{ $p->post_title }}</span></h3>
                @if ($loop->first)<div class="co-meta co-meta-light"><span>{{ $date($p) }}</span></div>@endif
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </section>
    @endif