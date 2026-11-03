                <!-- Rajniti NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'left-out') === 'left-out' ? 'show active' : '' }}"
                    id="left-out" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-12">
                            <label class="form-label">Choose News Category</label>

                            <select name="left_out_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['left_out_cat']) && $metaDatas['left_out_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END left_out -->