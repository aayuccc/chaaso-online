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
                            aria-expanded="{{ !request()->has('tab') || request()->query('tab') == 'rajniti' ? 'true' : 'false' }}"
                            class="nav-link {{ !request()->has('tab') || request()->query('tab') == 'rajniti' ? 'active' : '' }}">
                            Rajniti
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <!-- NEWS AND FEATURES NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'rajniti') === 'rajniti' ? 'show active' : '' }}"
                    id="rajniti" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-12">
                            <label class="form-label">Choose News Category</label>

                            <select name="news_n_feature_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['news_n_feature_cat']) && $metaDatas['news_n_feature_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END NEWS AND FEATURES -->
            </div>
        </div>
    </div>
</div>
