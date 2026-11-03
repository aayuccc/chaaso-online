                <!-- Rajniti NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'rajniti') === 'rajniti' ? 'show active' : '' }}"
                    id="rajniti" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-12">
                            <label class="form-label">Choose News Category</label>

                            <select name="rajniti_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['rajniti_cat']) && $metaDatas['rajniti_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END Rajniti -->