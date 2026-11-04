@extends('frontend.layouts.app', ['payload' => $payload, 'payloadMeta' => $payloadMeta, 'title' => $term !== '' ? $term . ' - खोज' : 'खोज'])

@include('frontend.common.breadcrumb-schema', ['breadcrumbs' => [
    'गृहपृष्ठ' => route('frontend.home'),
    'खोज' => route('frontend.search'),
]])

@php
    // Convert English numbers into Nepali numbers
    $toNepali = fn($number) => strtr((string) $number, ['0' => '०', '1' => '१', '2' => '२', '3' => '३', '4' => '४', '5' => '५', '6' => '६', '7' => '७', '8' => '८', '9' => '९']);
@endphp

@section('main-section')
  <main class="co-main">

    <!-- ================= SEARCH HEADER ================= -->
    <section class="co-cat-hero">
      <div class="container co-container">
        <nav class="co-crumbs" aria-label="ब्रेडक्रम्ब">
          <a href="{{url('/')}}"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
          <i class="bi bi-chevron-right" aria-hidden="true"></i>
          <span aria-current="page">खोज</span>
        </nav>
        <div class="co-cat-head">
          <div>
            <h1 class="co-cat-title">{{ $term !== '' ? '“' . $term . '”' : 'खोज्नुहोस्' }}</h1>
            <p class="co-cat-desc">
              @if ($posts)
                {{ $posts->total() ? $toNepali($posts->total()) . ' समाचार भेटियो' : 'कुनै समाचार भेटिएन' }}
              @else
                समाचार, विषय वा श्रेणी खोज्नुहोस्
              @endif
            </p>
          </div>
        </div>
        <form class="co-search" role="search" action="{{ route('frontend.search.store') }}" method="POST">
        @csrf
          <input class="co-search-input" type="search" name="q" value="{{ $term }}" placeholder="खोज्नुहोस्..." aria-label="खोज्नुहोस्" maxlength="100" required>
          <button class="co-search-btn" type="submit" aria-label="खोज्नुहोस्"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </section>

    <!-- ================= RESULTS ================= -->
    @if ($posts && $posts->isNotEmpty())
    <section class="co-section">
      <div class="container co-container">
        <div class="co-cat-list">
          @foreach ($posts as $post)
            @php
                $item_image = MediaHelper::WsrvService(MediaHelper::getImageById($post->postMeta->firstWhere('meta_key', 'featured_image')?->meta_value));
                $item_url = route('frontend.news.show', $post->id);
            @endphp
            <article class="co-card co-cat-card">
              @if ($item_image)
              <a href="{{ $item_url }}" class="co-card-media co-img"><img src="{{ $item_image }}" alt="{{ $post->post_title }}" loading="lazy"></a>
              @endif
              <h3 class="co-title-md"><a href="{{ $item_url }}">{{ $post->post_title }}</a></h3>
              <div class="co-meta">
                <span class="co-meta-author">{{ $post->authors->first()?->name ?? 'चासो संवाददाता' }}</span>
                <span>{{ NepaliDateHelper::format($post->created_at) }}</span>
              </div>
            </article>
          @endforeach
        </div>

        @if ($posts->lastPage() > 1)
          @php
              $currentPage = $posts->currentPage();
              $lastPage = $posts->lastPage();

              $startPage = max(1, $currentPage - 2);
              $endPage = min($lastPage, $currentPage + 2);
          @endphp

          <nav class="co-pager" aria-label="पृष्ठहरू">

              {{-- Previous --}}
              <a href="{{ $posts->previousPageUrl() ?: '#' }}"
                  class="co-pager-btn {{ $posts->onFirstPage() ? 'is-disabled' : '' }}"
                  @if ($posts->onFirstPage()) aria-disabled="true" @endif>
                  <i class="bi bi-arrow-left"></i> अघिल्लो
              </a>

              {{-- Page Numbers --}}
              <div class="co-pager-pages">
                  @if ($startPage > 1)
                      <a href="{{ $posts->url(1) }}">{{ $toNepali(1) }}</a>
                      @if ($startPage > 2)
                          <span class="dots">...</span>
                      @endif
                  @endif

                  @for ($page = $startPage; $page <= $endPage; $page++)
                      <a href="{{ $posts->url($page) }}"
                          class="{{ $page === $currentPage ? 'is-active' : '' }}"
                          @if ($page === $currentPage) aria-current="page" @endif>
                          {{ $toNepali($page) }}
                      </a>
                  @endfor

                  @if ($endPage < $lastPage)
                      @if ($endPage < $lastPage - 1)
                          <span class="dots">...</span>
                      @endif
                      <a href="{{ $posts->url($lastPage) }}">{{ $toNepali($lastPage) }}</a>
                  @endif
              </div>

              {{-- Next --}}
              <a href="{{ $posts->nextPageUrl() ?: '#' }}"
                  class="co-pager-btn {{ !$posts->hasMorePages() ? 'is-disabled' : '' }}"
                  @if (!$posts->hasMorePages()) aria-disabled="true" @endif>
                  अर्को <i class="bi bi-arrow-right"></i>
              </a>

          </nav>
        @endif
      </div>
    </section>
    @endif
  </main>
@endsection
