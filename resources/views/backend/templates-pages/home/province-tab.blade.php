                <!-- PROVINCE/TOURISM NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'rajniti') === 'province' ? 'show active' : '' }}"
                    id="province" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT: province tabs -->
                        <div class="col-md-6">
                            <label class="form-label">Province News</label>
                            <p class="form-text mb-0">Each tab is its own category, matched by slug:
                                {{ implode(', ', \App\Models\Category::PROVINCE_SLUGS) }}</p>
                        </div>

                        <!-- RIGHT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Right News Category</label>

                            <select name="tourism_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['tourism_cat']) && $metaDatas['tourism_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END PROVINCE/TOURISM NEWS -->