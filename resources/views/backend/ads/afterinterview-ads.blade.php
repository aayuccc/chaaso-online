    <!-- After IT Ad -->
    <label class="form-label" style="margin-top: 20px;">After Interview Ad</label>
    <div class="row" style="background-color: #b3b9c01c; padding: 20px; border-radius: 10px;">
        <div class="mb-3 col-4">
            <label class="form-label">Brand Logo</label>
            <!-- <span>(Recommended Size : 270 x 255 px)</span> -->
            <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="after_interview_brand" data-select="single">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                </div>
                <div class="form-control file-amount">Choose File</div>
            </div>
            <div class="preview-closer">
                @php
                    $storyImageId = isset($metaDatas['after_interview_brand']) ? $metaDatas['after_interview_brand'] : null;
                    $storyImage = $storyImageId ? \App\Helpers\MediaHelper::getModel()->where('id', $storyImageId)->first() : null;
                @endphp
                @if ($storyImage)
                <input type="hidden" id="after_interview_brand" name="after_interview_brand" class="selected-files" value="{{ $storyImageId }}" />
                <div id="after_interview_brand_select" class="mt-2">
                    <div class="file-preview box sm">
                        <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                            <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                <img class="img-fit" src="{{ Storage::disk('public')->url($storyImage->file_name) }}" alt="" />
                            </div>
                            <div class="col body">
                                <h6 class="d-flex">
                                    <span class="text-truncate title">{{ $storyImage->file_original_name }}</span>
                                    <span class="flex-shrink-0 ext">.{{ $storyImage->extension }}</span>
                                </h6>
                                <p>{{ \App\Helpers\MediaHelper::getKBorMB($storyImage->file_size) }}</p>
                            </div>
                            <div class="remove">
                                <button data-id="{{ $storyImage->id }}" data-slug="after_interview_brand" class="btn btn-sm btn-link remove-attachment" type="button">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <input type="hidden" id="after_interview_brand" name="after_interview_brand" class="selected-files" value="" />
                <div id="after_interview_brand_select"></div>
                @endif
            </div>
        </div>

        <div class="mb-3 col-4">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="after_interview_ad_title" class="form-control" value="{{ isset($metaDatas['after_interview_ad_title']) ? $metaDatas['after_interview_ad_title'] : '' }}" />
            </div>
        </div>

        <div class="mb-3 col-4">
            <label class="form-label">Subtitle</label>
            <textarea name="after_interview_ad_subtitle" class="form-control" rows="2">{{ $metaDatas['after_interview_ad_subtitle'] ?? '' }}</textarea>
        </div>
        
        <div class="mb-3 col-4">
            <label class="form-label">Ad Image</label>
            <!-- <span>(Recommended Size : 270 x 255 px)</span> -->
            <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="after_interview_img" data-select="single">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                </div>
                <div class="form-control file-amount">Choose File</div>
            </div>
            <div class="preview-closer">
                @php
                    $storyImageId = isset($metaDatas['after_interview_img']) ? $metaDatas['after_interview_img'] : null;
                    $storyImage = $storyImageId ? \App\Helpers\MediaHelper::getModel()->where('id', $storyImageId)->first() : null;
                @endphp
                @if ($storyImage)
                <input type="hidden" id="after_interview_img" name="after_interview_img" class="selected-files" value="{{ $storyImageId }}" />
                <div id="after_interview_img_select" class="mt-2">
                    <div class="file-preview box sm">
                        <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                            <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                <img class="img-fit" src="{{ Storage::disk('public')->url($storyImage->file_name) }}" alt="" />
                            </div>
                            <div class="col body">
                                <h6 class="d-flex">
                                    <span class="text-truncate title">{{ $storyImage->file_original_name }}</span>
                                    <span class="flex-shrink-0 ext">.{{ $storyImage->extension }}</span>
                                </h6>
                                <p>{{ \App\Helpers\MediaHelper::getKBorMB($storyImage->file_size) }}</p>
                            </div>
                            <div class="remove">
                                <button data-id="{{ $storyImage->id }}" data-slug="after_interview_img" class="btn btn-sm btn-link remove-attachment" type="button">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <input type="hidden" id="after_interview_img" name="after_interview_img" class="selected-files" value="" />
                <div id="after_interview_img_select"></div>
                @endif
            </div>
        </div>

        <div class="mb-3 col-4">
            <label class="form-label">Button URL</label>
            <input type="url" id="after_interview_url" class="form-control mb-3" name="after_interview_url" value="{{ isset($metaDatas['after_interview_url']) ? $metaDatas['after_interview_url'] : '' }}">
        </div>

        <div class="mb-3 col-4">
            <label class="form-label">Button Text</label>
            <input type="text" id="after_interview_cta_text" class="form-control" name="after_interview_cta_text" value="{{ isset($metaDatas['after_interview_cta_text']) ? $metaDatas['after_interview_cta_text'] : '' }}" placeholder="Read More">
        </div>
    </div>