<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                <h4 class="header-title">Home Page Builder</h4>
            </div>
            <div class="tab-heading">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#rajniti" data-bs-toggle="tab"
                           class="nav-link {{ request()->query('tab', 'rajniti') === 'rajniti' ? 'active' : '' }}">
                            Rajniti
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#commerce" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'commerce') === 'commerce' ? 'active' : '' }}">
                            Commerce/Lifestyle
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#sports" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'sports') === 'sports' ? 'active' : '' }}">
                            Sports/Education
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#province" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'province') === 'province' ? 'active' : '' }}">
                            Province/Tourism
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#it-tech" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'it-tech') === 'it-tech' ? 'active' : '' }}">
                            Information Technology
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#interview" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'interview') === 'interview' ? 'active' : '' }}">
                            Interview/Idea
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#video" data-bs-toggle="tab" class="nav-link {{ request()->query('tab', 'video') === 'video' ? 'active' : '' }}">
                            Video
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#share" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'share') === 'share' ? 'active' : '' }}">
                            Share/Auto/Argiculture
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#left-out" data-bs-toggle="tab"
                            class="nav-link {{ request()->query('tab', 'left-out') === 'left-out' ? 'active' : '' }}">
                            छुटाउनुभयो कि ?
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">

                @include('backend.templates-pages.home.rajniti-tab')
                @include('backend.templates-pages.home.commerce-tab')
                @include('backend.templates-pages.home.sports-tab')
                @include('backend.templates-pages.home.province-tab')
                @include('backend.templates-pages.home.it-tech-tab')
                @include('backend.templates-pages.home.interview-tab')
                @include('backend.templates-pages.home.video-tab')
                @include('backend.templates-pages.home.share-tab')
                @include('backend.templates-pages.home.left-out-tab')
            </div>
        </div>
    </div>
</div>
