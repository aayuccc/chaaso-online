{{-- Params: $prefix, $index, $key, $label, $imageId (nullable), $col (optional, default col-4) --}}
@php $fieldId = $prefix . $index . '_' . $key; @endphp
<div class="mb-3 {{ $col ?? 'col-4' }}">
    <label class="form-label">{{ $label }}</label>
    <div class="media-input image-input">
        <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="{{ $fieldId }}" data-select="single">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
            </div>
            <div class="form-control file-amount">Choose File</div>
        </div>
        <div class="preview-closer">
            @if (!empty($imageId) && ($media = \App\Models\Media::where('id', $imageId)->first()))
                <input type="hidden" id="{{ $fieldId }}" name="{{ $prefix }}[{{ $index }}][{{ $key }}]" class="selected-files" value="{{ $imageId }}" />
                <div id="{{ $fieldId }}_select">
                    <div class="file-preview box sm">
                        <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                            <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                <img class="img-fit" src="{{ Storage::disk('public')->url($media->file_name) }}" alt="">
                            </div>
                            <div class="col body">
                                <h6 class="d-flex">
                                    <span class="text-truncate title">{{ $media->file_original_name }}</span>
                                    <span class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                </h6>
                                <p>{{ \App\Helpers\MediaHelper::getKBorMB($media->file_size) }}</p>
                            </div>
                            <div class="remove">
                                <button data-id="{{ $imageId }}" data-slug="{{ $fieldId }}" class="btn btn-sm btn-link remove-attachment" type="button">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" id="{{ $fieldId }}" name="{{ $prefix }}[{{ $index }}][{{ $key }}]" class="selected-files" value="" />
                <div id="{{ $fieldId }}_select"></div>
            @endif
        </div>
    </div>
</div>