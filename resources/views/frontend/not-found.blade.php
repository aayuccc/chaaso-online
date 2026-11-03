@extends('frontend.layouts.app', ['title' => 'Page Not Found', 'payload' => null, 'payloadMeta' => null])

@section('main-section')
  <main class="co-main co-page">

    <!-- ================= 404 ================= -->
    <section class="co-section co-nf">
      <div class="container co-container">
        <div class="co-nf-grid">
          <div class="co-nf-text">
            <span class="co-pg-eyebrow"><i class="bi bi-exclamation-octagon"></i> त्रुटि ४०४</span>
            <h1 class="co-nf-title">माफ गर्नुहोस्, यो <em>पृष्ठ</em> भेटिएन।</h1>
            <p class="co-nf-desc">तपाईंले खोज्नुभएको समाचार हटाइएको, सारिएको वा लिङ्क गलत टाइप भएको हुन सक्छ। तल खोजेर हेर्नुहोस् वा गृहपृष्ठबाट ताजा समाचार पढ्नुहोस्।</p>

            <form class="co-nf-search"
                action="{{ route('frontend.search.store') }}"
                method="POST"
                role="search">

                @csrf

                <i class="bi bi-search" aria-hidden="true"></i>

                <label class="visually-hidden" for="nfQuery">
                    समाचार खोज्नुहोस्
                </label>

                <input
                    id="nfQuery"
                    name="q"
                    type="search"
                    placeholder="समाचार, विषय वा व्यक्ति खोज्नुहोस्…"
                    autocomplete="off"
                    maxlength="100"
                    value="{{ request()->routeIs('frontend.search') ? session('search_term') : '' }}"
                    required
                >

                <button type="submit" class="co-btn">
                    खोज्नुहोस्
                </button>
            </form>

            <div class="co-nf-actions">
              <a href="{{ url('/') }}" class="co-btn co-btn-ghost"><i class="bi bi-house-door"></i> गृहपृष्ठ</a>
              <button type="button" class="co-btn co-btn-ghost" data-go-back><i class="bi bi-arrow-left"></i> पछाडि फर्कनुहोस्</button>
            </div>
          </div>

          <!-- visual: big numerals with a "newspaper clipping" in front -->
          <div class="co-nf-art" aria-hidden="true">
            <div class="co-nf-num"><span>४</span><span class="co-nf-zero"><i class="bi bi-search"></i></span><span>४</span></div>
            <div class="co-nf-clip">
              <div class="co-nf-clip-mast">
                <img src="assets/images/sticky-logo.png" alt="" width="28" height="28">
                <strong>चासो अनलाइन</strong>
                <span>विशेष</span>
              </div>
              <div class="co-nf-clip-head">ब्रेकिङ: पृष्ठ बेपत्ता!</div>
              <div class="co-nf-clip-body">
                <div class="co-nf-clip-img"><i class="bi bi-image"></i></div>
                <div class="co-nf-clip-lines"><i></i><i></i><i></i><i></i><i></i></div>
              </div>
              <div class="co-nf-clip-lines co-nf-clip-lines-full"><i></i><i></i><i></i></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @php
        $categories = \App\Models\Category::where('type', 'category')
            ->get();
    @endphp
    <!-- ================= CATEGORIES ================= -->
    <section class="co-section">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">श्रेणी अनुसार हेर्नुहोस्</h2><span class="co-hatch"></span>
        </div>
        <div class="co-ab-cover">
          @foreach ($categories as $category)
            <a href="{{ route('frontend.category.index', $category->slug) }}">
                <i class="bi bi-newspaper"></i>
                <span>{{ $category->name }}</span>
                <i class="bi bi-arrow-up-right"></i>
            </a>
        @endforeach
        </div>
      </div>
    </section>

  </main>

@endsection