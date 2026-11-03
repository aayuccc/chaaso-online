                <!-- VIDEO NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'video') === 'video' ? 'show active' : '' }}"
                    id="video" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-12">
                            <label class="form-label">Choose News Category</label>

                            <select name="video_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['video_cat']) && $metaDatas['video_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END VIDEO NEWS -->
