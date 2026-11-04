                <!-- SHARE/SPORTS/EDUCATION NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'rajniti') === 'share' ? 'show active' : '' }}"
                    id="share" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-4">
                            <label class="form-label">Choose Left News Category</label>

                            <select name="share_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['share_cat']) && $metaDatas['share_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- MIDDLE CATEGORY -->
                        <div class="col-md-4">
                            <label class="form-label">Choose Middle News Category</label>

                            <select name="auto_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['auto_cat']) && $metaDatas['auto_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- RIGHT CATEGORY -->
                        <div class="col-md-4">
                            <label class="form-label">Choose Right News Category</label>

                            <select name="agriculture_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['agriculture_cat']) && $metaDatas['agriculture_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END SHARE/SPORTS/EDUCATION NEWS -->