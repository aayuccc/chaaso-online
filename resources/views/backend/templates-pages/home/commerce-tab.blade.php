                <!-- COMMERCE/TRADE NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'rajniti') === 'commerce' ? 'show active' : '' }}"
                    id="commerce" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Left News Category</label>

                            <select name="commerce_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['commerce_cat']) && $metaDatas['commerce_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- RIGHT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Right News Category</label>

                            <select name="lifestyle_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['lifestyle_cat']) && $metaDatas['lifestyle_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END COMMERCE/TRADE NEWS -->