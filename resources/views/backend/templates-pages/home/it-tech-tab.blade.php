                <!-- IT/TECH NEWS -->
                <div class="tab-pane fade {{ request()->query('tab', 'rajniti') === 'it-tech' ? 'show active' : '' }}"
                    id="it-tech" role="tabpanel">

                    <div class="row mb-3">

                        <!-- LEFT CATEGORY -->
                        <div class="col-md-12">
                            <label class="form-label">Choose News Category</label>

                            <select name="it_tech_cat" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($metaDatas['it_tech_cat']) && $metaDatas['it_tech_cat'] == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                    </div>

                </div>
                <!-- END IT/TECH NEWS -->