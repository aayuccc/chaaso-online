@php
    $galleryIds = $metaDatas['photo_gallery'] ?? '';
    $gallery = $gallery ?? collect();
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                    <h4 class="header-title">Photo Feature Builder</h4>
                </div>
                <div class="tab-heading">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#gallery" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                Gallery </a>
                        </li>
                        <li class="nav-item">
                            <a href="#general" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                General </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="gallery">
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group row">
                                    <div class="col-md-12 mb-3">
                                        <label for="document" class="form-label">
                                            Add Images
                                        </label>
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="custom-table-sno">S.No</th>
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addMoredocument">
                                                    @isset($metaDatas['document'])
                                                        @php
                                                            $chooseUs = is_string($metaDatas['document'])
                                                                ? unserialize($metaDatas['document'])
                                                                : $metaDatas['document'];
                                                        @endphp

                                                        @if (is_array($chooseUs))
                                                            @foreach ($chooseUs as $index => $item)
                                                                <tr>
                                                                    <td class="custom-table-no no">{{ $loop->iteration }}</td>
                                                                    <td>
                                                                        <textarea name="document[{{ $index }}][title]"  style="min-width: 250px;" class="form-control editor" rows="3">{{ $item['title'] ?? '' }}</textarea>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <div class="input-group open-media-manager"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                style="cursor: pointer;"
                                                                                data-field="document_image_{{ $index }}"
                                                                                data-select="single">
                                                                                <div class="input-group-prepend">
                                                                                    <div
                                                                                        class="input-group-text bg-soft-secondary font-weight-medium">
                                                                                        Browse</div>
                                                                                </div>
                                                                                <div class="form-control file-amount">Choose File
                                                                                </div>
                                                                            </div>
                                                                            <div class="preview-closer">
                                                                                @if (isset($item['image']) && ($media = \App\Models\Media::find($item['image'])))
                                                                                    <input type="hidden"
                                                                                        id="document_image_{{ $index }}"
                                                                                        name="document[{{ $index }}][image]"
                                                                                        class="selected-files"
                                                                                        value="{{ $item['image'] }}" />
                                                                                    <div
                                                                                        id="document_image_{{ $index }}_select">
                                                                                        <div class="file-preview box sm">
                                                                                            <div
                                                                                                class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                                                                <div
                                                                                                    class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                                                                    <img class="img-fit"
                                                                                                        src="{{ asset($media->file_name) }}"
                                                                                                        alt="">
                                                                                                </div>
                                                                                                <div class="col body">
                                                                                                    <h6 class="d-flex">
                                                                                                        <span
                                                                                                            class="text-truncate title">{{ $media->file_original_name }}</span>
                                                                                                        <span
                                                                                                            class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                                                                                    </h6>
                                                                                                    <p>{{ MediaHelper::getKBorMB($media->file_size) }}
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="image-remove-wrapper">
                                                                                                    <button
                                                                                                        data-id="{{ $item['image'] }}"
                                                                                                        data-slug="document_image_{{ $index }}"
                                                                                                        class="btn btn-sm btn-link remove-attachment"
                                                                                                        type="button">
                                                                                                        <i
                                                                                                            class="bi bi-x-circle"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <input type="hidden"
                                                                                        id="document_image_{{ $index }}"
                                                                                        name="document[{{ $index }}][image]"
                                                                                        class="selected-files" value="" />
                                                                                    <div
                                                                                        id="document_image_{{ $index }}_select">
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="javascript:void(0);"
                                                                            class="text-reset fs-16 px-1 add_more">
                                                                            <i class="bi bi-plus-circle"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0);"
                                                                            class="text-reset fs-16 px-1 remove">
                                                                            <i class="bi bi-x-circle"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    @endisset
                                                </tbody>

                                            </table>
                                            <div class="text-end mt-2">
                                                <button type="button" class="btn btn-primary btn-sm add_new">Add
                                                    New</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="general">
                        <div class="row">
                            <!-- <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea name="short_desc" id="short_desc" rows="3" class="form-control">{{ $metaDatas['short_desc'] ?? '' }}</textarea>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photographer" class="form-label">Photographer</label>
                                    <input name="photographer" type="text" id="photographer" class="form-control"
                                        value="{{ $metaDatas['photographer'] ?? '' }}" />
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo_location" class="form-label">Location</label>
                                    <input name="photo_location" type="text" id="photo_location" class="form-control"
                                        value="{{ $metaDatas['photo_location'] ?? '' }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Update serial numbers and input names
    function updateSerialNumbers() {
        $('.addMoredocument tr').each(function(index) {

            $(this).find('td:first').text(index + 1);

            $(this).find('textarea.editor')
                .attr('name', 'document[' + index + '][title]');

            $(this).find('input.selected-files')
                .attr('name', 'document[' + index + '][image]');

            $(this).find('.open-media-manager')
                .attr('data-field', 'document_image_' + index);

            $(this).find('.preview-closer > div')
                .attr('id', 'document_image_' + index + '_select');

            $(this).find('input.selected-files')
                .attr('id', 'document_image_' + index);
        });
    }

    // Add new row HTML
    function addRowData() {
        let numberOfRow = $('.addMoredocument tr').length;

        let tr = `
            <tr>
                <td class="custom-table-no no">${numberOfRow + 1}</td>

                <td>
                    <textarea
                        name="document[${numberOfRow}][title]"
                        style="min-width: 250px;"
                        class="form-control editor"
                        rows="3"></textarea>
                </td>

                <td>
                    <div>
                        <div class="input-group open-media-manager"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            style="cursor: pointer;"
                            data-field="document_image_${numberOfRow}"
                            data-select="single">

                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">
                                    Browse
                                </div>
                            </div>

                            <div class="form-control file-amount">
                                Choose File
                            </div>
                        </div>

                        <div class="preview-closer">
                            <input
                                type="hidden"
                                id="document_image_${numberOfRow}"
                                name="document[${numberOfRow}][image]"
                                class="selected-files"
                                value=""
                            />

                            <div id="document_image_${numberOfRow}_select"></div>
                        </div>
                    </div>
                </td>

                <td class="text-center">
                    <a href="javascript:void(0);"
                        class="text-reset fs-16 px-1 add_more">
                        <i class="bi bi-plus-circle"></i>
                    </a>

                    <a href="javascript:void(0);"
                        class="text-reset fs-16 px-1 remove">
                        <i class="bi bi-x-circle"></i>
                    </a>
                </td>
            </tr>
        `;

        return tr;
    }

    // Add row after click plus icon
    $(document).on('click', '.add_more', function() {
        let clickedRow = $(this).closest('tr');
        let row = addRowData();
        clickedRow.after(row);
        updateSerialNumbers();
        initializeSummernote();
    });

    // Add row from Add New button
    $(document).on('click', '.add_new', function() {
        let row = addRowData();
        $('.addMoredocument').append(row);
        updateSerialNumbers();
        initializeSummernote();
    });

    // Prevent image remove button from triggering row removal
    $(document).on('click', '.remove-attachment', function(e) {
        e.stopPropagation();
    });

    // Remove row - only target the <a> tag in the action column, not the image remove button
    $(document).on('click', 'td.text-center > a.remove', function(e) {
        e.stopPropagation();
        $(this).closest('tr').remove();
        updateSerialNumbers();
    });

    // Initialize Summernote
    function initializeSummernote() {
        $('.editor').not('.editor.initialized').each(function() {

            let $editor = $(this);

            // Store the existing textarea value before Summernote initializes
            let existingContent = $editor.val();

            $editor.summernote({
                tabsize: 2,
                height: 200,

                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['codeview', 'help']]
                ],

                fontSizes: [
                    '8', '10', '12', '14', '16', '18', '24', '36'
                ],

                lineHeights: [
                    '1.0', '1.2', '1.4', '1.5',
                    '1.6', '1.8', '2.0', '3.0'
                ]
            });

            // Restore existing content
            if (existingContent) {
                $editor.summernote('code', existingContent);
            }

            $editor.addClass('initialized');
        });
    }

    // Initialize on page load
    $(document).ready(function() {
        initializeSummernote();
    });
</script>
