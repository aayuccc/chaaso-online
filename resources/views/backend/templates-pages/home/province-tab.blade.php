                <!-- PROVINCE/TOURISM NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'province') === 'province' ? 'show active' : '' }}"
                    id="province" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Left News Category</label>

                            <select name="province_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['province_cat']) && $metaDatas['province_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
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