                <!-- INTERVIEW NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'interview') === 'interview' ? 'show active' : '' }}"
                    id="interview" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Left News Category</label>

                            <select name="interview_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['interview_cat']) && $metaDatas['interview_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- RIGHT CATEGORY -->
                        <div class="col-md-6">
                            <label class="form-label">Choose Right News Category</label>

                            <select name="idea_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['idea_cat']) && $metaDatas['idea_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END INTERVIEW NEWS -->