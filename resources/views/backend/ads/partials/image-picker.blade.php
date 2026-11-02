{{-- Params: $field (meta key), $label --}}
<div class="mb-3 col-4">
    <label class="form-label">{{ $label }}</label>
    <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="{{ $field }}" data-select="single">
        <div class="input-group-prepend">
            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
        </div>
        <div class="form-control file-amount">Choose File</div>
    </div>
    <div class="preview-closer">
        @php
            $storyImageId = isset($metaDatas[$field]) ? $metaDatas[$field] : null;
            $storyImage = $storyImageId ? \App\Helpers\MediaHelper::getModel()->where('id', $storyImageId)->first() : null;
        @endphp
        @if ($storyImage)
        <input type="hidden" id="{{ $field }}" name="{{ $field }}" class="selected-files" value="{{ $storyImageId }}" />
        <div id="{{ $field }}_select" class="mt-2">
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
                        <button data-id="{{ $storyImage->id }}" data-slug="{{ $field }}" class="btn btn-sm btn-link remove-attachment" type="button">
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else
        <input type="hidden" id="{{ $field }}" name="{{ $field }}" class="selected-files" value="" />
        <div id="{{ $field }}_select"></div>
        @endif
    </div>
</div>