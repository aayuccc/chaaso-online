                <!-- SPORTS/EDUCATION NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'sports') === 'sports' ? 'show active' : '' }}"
                    id="sports" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Left News Category</label>

                            <select name="sports_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['sports_cat']) && $metaDatas['sports_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- RIGHT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Right News Category</label>

                            <select name="education_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['education_cat']) && $metaDatas['education_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END SPORTS/EDUCATION NEWS -->