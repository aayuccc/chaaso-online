<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                <h4 class="header-title">About Page Builder</h4>
            </div>
            <div class="tab-heading">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#main-content" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            Our Story
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#counters" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            Counters
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#values" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            Values
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#editorial-process" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            Editorial Process
                        </a>
                    </li>

                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane show active" id="main-content">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Editor Name</label>
                                <input type="text" name="about_editor" class="form-control"
                                    value="{{ isset($metaDatas['about_editor']) ? $metaDatas['about_editor'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Editor Designation</label>
                                <input type="text" name="editor_designation" class="form-control"
                                    value="{{ isset($metaDatas['editor_designation']) ? $metaDatas['editor_designation'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Registration Number</label>
                                <input type="text" name="registration_number" class="form-control"
                                    value="{{ isset($metaDatas['registration_number']) ? $metaDatas['registration_number'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Editor's Quote</label>
                            <textarea name="editor_quote" class="form-control" rows="2">{{ $metaDatas['editor_quote'] ?? '' }}</textarea>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Editor's Image</label>
                            <span>(Recommended Size : 270 x 255 px)</span>
                            <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="editor_image" data-select="single">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                            </div>
                            <div class="preview-closer">
                                @php
                                    $storyImageId = isset($metaDatas['editor_image'])
                                        ? $metaDatas['editor_image']
                                        : null;
                                    $storyImage = $storyImageId
                                        ? \App\Helpers\MediaHelper::getModel()->where('id', $storyImageId)->first()
                                        : null;
                                @endphp
                                @if ($storyImage)
                                    <input type="hidden" id="editor_image" name="editor_image"
                                        class="selected-files" value="{{ $storyImageId }}" />
                                    <div id="editor_image_select" class="mt-2">
                                        <div class="file-preview box sm">
                                            <div
                                                class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                <div
                                                    class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                    <img class="img-fit"
                                                        src="{{ asset('storage/' . $storyImage->file_name) }}"
                                                        alt="" />
                                                </div>
                                                <div class="col body">
                                                    <h6 class="d-flex">
                                                        <span
                                                            class="text-truncate title">{{ $storyImage->file_original_name }}</span>
                                                        <span
                                                            class="flex-shrink-0 ext">.{{ $storyImage->extension }}</span>
                                                    </h6>
                                                    <p>{{ \App\Helpers\MediaHelper::getKBorMB($storyImage->file_size) }}
                                                    </p>
                                                </div>
                                                <div class="remove">
                                                    <button data-id="{{ $storyImage->id }}"
                                                        data-slug="editor_image"
                                                        class="btn btn-sm btn-link remove-attachment" type="button">
                                                        <i class="bi bi-x-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" id="editor_image" name="editor_image"
                                        class="selected-files" value="" />
                                    <div id="editor_image_select"></div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">First Additional Image</label>
                            <span>(Recommended Size : 270 x 255 px)</span>
                            <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="first_additional_image" data-select="single">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                            </div>
                            <div class="preview-closer">
                                @php
                                    $storyImageId = isset($metaDatas['first_additional_image'])
                                        ? $metaDatas['first_additional_image']
                                        : null;
                                    $storyImage = $storyImageId
                                        ? \App\Helpers\MediaHelper::getModel()->where('id', $storyImageId)->first()
                                        : null;
                                @endphp
                                @if ($storyImage)
                                    <input type="hidden" id="first_additional_image" name="first_additional_image"
                                        class="selected-files" value="{{ $storyImageId }}" />
                                    <div id="first_additional_image_select" class="mt-2">
                                        <div class="file-preview box sm">
                                            <div
                                                class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                <div
                                                    class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                    <img class="img-fit"
                                                        src="{{ asset('storage/' . $storyImage->file_name) }}"
                                                        alt="" />
                                                </div>
                                                <div class="col body">
                                                    <h6 class="d-flex">
                                                        <span
                                                            class="text-truncate title">{{ $storyImage->file_original_name }}</span>
                                                        <span
                                                            class="flex-shrink-0 ext">.{{ $storyImage->extension }}</span>
                                                    </h6>
                                                    <p>{{ \App\Helpers\MediaHelper::getKBorMB($storyImage->file_size) }}
                                                    </p>
                                                </div>
                                                <div class="remove">
                                                    <button data-id="{{ $storyImage->id }}"
                                                        data-slug="first_additional_image"
                                                        class="btn btn-sm btn-link remove-attachment" type="button">
                                                        <i class="bi bi-x-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" id="first_additional_image" name="first_additional_image"
                                        class="selected-files" value="" />
                                    <div id="first_additional_image_select"></div>
                                @endif
                            </div>

                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Second Additional Image</label>
                            <span>(Recommended Size : 270 x 255 px)</span>
                            <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="second_additional_image" data-select="single">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                            </div>
                            <div class="preview-closer">
                                @php
                                    $storyImageId = isset($metaDatas['second_additional_image'])
                                        ? $metaDatas['second_additional_image']
                                        : null;
                                    $storyImage = $storyImageId
                                        ? \App\Helpers\MediaHelper::getModel()->where('id', $storyImageId)->first()
                                        : null;
                                @endphp
                                @if ($storyImage)
                                    <input type="hidden" id="second_additional_image" name="second_additional_image"
                                        class="selected-files" value="{{ $storyImageId }}" />
                                    <div id="second_additional_image_select" class="mt-2">
                                        <div class="file-preview box sm">
                                            <div
                                                class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                                <div
                                                    class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                                    <img class="img-fit"
                                                        src="{{ asset('storage/' . $storyImage->file_name) }}"
                                                        alt="" />
                                                </div>
                                                <div class="col body">
                                                    <h6 class="d-flex">
                                                        <span
                                                            class="text-truncate title">{{ $storyImage->file_original_name }}</span>
                                                        <span
                                                            class="flex-shrink-0 ext">.{{ $storyImage->extension }}</span>
                                                    </h6>
                                                    <p>{{ \App\Helpers\MediaHelper::getKBorMB($storyImage->file_size) }}
                                                    </p>
                                                </div>
                                                <div class="remove">
                                                    <button data-id="{{ $storyImage->id }}"
                                                        data-slug="second_additional_image"
                                                        class="btn btn-sm btn-link remove-attachment" type="button">
                                                        <i class="bi bi-x-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" id="second_additional_image" name="second_additional_image"
                                        class="selected-files" value="" />
                                    <div id="second_additional_image_select"></div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>

                <div class="tab-pane show" id="counters">
                    <div class="form-group row">
                        <div class="col-md-12 mb-3">
                            <label for="feature" class="form-label">Add Counter</label>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="custom-table-sno">S.No</th>
                                            <th>Number</th>
                                            <th>Title</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMorefeature">
                                        @isset($metaDatas['feature'])
                                        @php
                                        $chooseUs = is_string($metaDatas['feature'])? unserialize($metaDatas['feature']): $metaDatas['feature'];
                                        @endphp
                                        @if (is_array($chooseUs))
                                        @foreach ($chooseUs as $index => $item)
                                        <tr>
                                            <td class="custom-table-no">{{ $loop->iteration }}</td>
                                            <td><input type="text" name="feature[{{ $index }}][number]" class="form-control" value="{{ $item['number'] ?? '' }}"></td>
                                            <td><input type="text" name="feature[{{ $index }}][title]" class="form-control" value="{{ $item['title'] ?? '' }}"></td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" class="text-reset fs-16 px-1 add_more_feature" title="Add"><i class="bi bi-plus-circle"></i></a>
                                                <a href="javascript:void(0)" class="text-reset fs-16 px-1 remove_feature" title="Remove"><i class="bi bi-x-circle"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        @endisset
                                    </tbody>
                                </table>
                                <div class="text-end mt-2">
                                    <button type="button" class="btn btn-primary btn-sm add_new_feature">Add New</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane show" id="values">
                    <div class="form-group row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Add Values</label>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="custom-table-sno">S.No</th>
                                            <th>Icon</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="addMoreValueFeature">

                                        @isset($metaDatas['values_feature'])
                                            @php
                                                $features = is_string($metaDatas['values_feature'])
                                                    ? unserialize($metaDatas['values_feature'])
                                                    : $metaDatas['values_feature'];
                                            @endphp

                                            @if (is_array($features))
                                                @foreach ($features as $index => $item)
                                                    <tr>
                                                        <td class="value-table-no">{{ $loop->iteration }}</td>

                                                        <td>
                                                            <select name="values_feature[{{ $index }}][icon]" class="form-control">
                                                                <option value="">Select Icon</option>
                                                                <option value="shield-check" {{ ($item['icon'] ?? '') == 'shield-check' ? 'selected' : '' }}>Shield Check</option>
                                                                <option value="symmetry-vertical" {{ ($item['icon'] ?? '') == 'symmetry-vertical' ? 'selected' : '' }}>Symmetry Vertical</option>
                                                                <option value="people" {{ ($item['icon'] ?? '') == 'people' ? 'selected' : '' }}>People</option>
                                                                <option value="arrow-repeat" {{ ($item['icon'] ?? '') == 'arrow-repeat' ? 'selected' : '' }}>Arrow Repeat</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <textarea name="values_feature[{{ $index }}][description]" class="form-control editor" rows="5">{{ $item['description'] ?? '' }}</textarea>
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" class="text-reset fs-16 px-1 add_more_value_feature" title="Add">
                                                                <i class="bi bi-plus-circle"></i>
                                                            </a>

                                                            <a href="javascript:void(0)" class="text-reset fs-16 px-1 remove_value_feature" title="Remove">
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
                                    <button type="button" class="btn btn-primary btn-sm add_new_value_feature">Add New</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane show" id="editorial-process">
                    <div class="form-group row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Add Steps</label>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="custom-table-sno">S.No</th>
                                            <th>Icon</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="addMoreValueStep">

                                        @isset($metaDatas['values_step'])
                                            @php
                                                $steps = is_string($metaDatas['values_step'])
                                                    ? unserialize($metaDatas['values_step'])
                                                    : $metaDatas['values_step'];
                                            @endphp

                                            @if (is_array($steps))
                                                @foreach ($steps as $index => $item)
                                                    <tr>
                                                        <td class="value-table-no">{{ $loop->iteration }}</td>

                                                        <td>
                                                            <select name="values_step[{{ $index }}][icon]" class="form-control">
                                                                <option value="">Select Icon</option>
                                                                <option value="broadcast" {{ ($item['icon'] ?? '') == 'broadcast' ? 'selected' : '' }}>Broadcast</option>
                                                                <option value="search" {{ ($item['icon'] ?? '') == 'search' ? 'selected' : '' }}>Search</option>
                                                                <option value="pencil-square" {{ ($item['icon'] ?? '') == 'pencil-square' ? 'selected' : '' }}>Pencil</option>
                                                                <option value="send-check" {{ ($item['icon'] ?? '') == 'send-check' ? 'selected' : '' }}>Send Message</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <textarea name="values_step[{{ $index }}][description]" class="form-control editor" rows="5">{{ $item['description'] ?? '' }}</textarea>
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" class="text-reset fs-16 px-1 add_more_value_step" title="Add">
                                                                <i class="bi bi-plus-circle"></i>
                                                            </a>

                                                            <a href="javascript:void(0)" class="text-reset fs-16 px-1 remove_value_step" title="Remove">
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
                                    <button type="button" class="btn btn-primary btn-sm add_new_value_step">Add New</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- counter field -->
<script>
    $(document).ready(function () {

        function updateFeatureRows() {
            $('.addMorefeature tr').each(function (index) {
                let row = $(this);

                row.find('.custom-table-no').text(index + 1);

                row.find('input[name*="[number]"]')
                    .attr('name', 'feature[' + index + '][number]');

                row.find('input[name*="[title]"]')
                    .attr('name', 'feature[' + index + '][title]');
            });
        }

        function createFeatureRow() {
            let index = $('.addMorefeature tr').length;

            let row = `
                <tr>
                    <td class="custom-table-no">${index + 1}</td>
                    <td>
                        <input type="text"
                            name="feature[${index}][number]"
                            class="form-control"
                            value="">
                    </td>
                    <td>
                        <input type="text"
                            name="feature[${index}][title]"
                            class="form-control"
                            value="">
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 add_more_feature"
                            title="Add">
                            <i class="bi bi-plus-circle"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 remove_feature"
                            title="Remove">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    </td>
                </tr>
            `;

            return row;
        }

        // Add New button
        $(document).on('click', '.add_new_feature', function (e) {
            e.preventDefault();

            $('.addMorefeature').append(createFeatureRow());

            updateFeatureRows();
        });

        // Plus button - Add row after current row
        $(document).on('click', '.add_more_feature', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest('tr');

            currentRow.after(createFeatureRow());

            updateFeatureRows();
        });

        // Remove button
        $(document).on('click', '.remove_feature', function (e) {
            e.preventDefault();

            $(this).closest('tr').remove();

            updateFeatureRows();
        });

        // Initial numbering
        updateFeatureRows();

    });
</script>

<!-- values field -->
<script>
    $(document).ready(function () {

        function updateValueFeatureRows() {
            $('.addMoreValueFeature tr').each(function (index) {
                let row = $(this);

                row.find('.value-table-no').text(index + 1);

                row.find('select[name*="[icon]"]')
                    .attr('name', 'values_feature[' + index + '][icon]');

                row.find('textarea[name*="[description]"]')
                    .attr('name', 'values_feature[' + index + '][description]');
            });
        }

        function createValueFeatureRow() {
            let index = $('.addMoreValueFeature tr').length;

            let row = `
                <tr>
                    <td class="value-table-no">${index + 1}</td>

                    <td>
                        <select name="values_feature[${index}][icon]" class="form-control">
                            <option value="">Select Icon</option>
                            <option value="shield-check">Shield Check</option>
                            <option value="symmetry-vertical">Symmetry Vertical</option>
                            <option value="people">People</option>
                            <option value="arrow-repeat">Arrow Repeat</option>
                        </select>
                    </td>

                    <td>
                        <textarea name="values_feature[${index}][description]"
                            class="form-control editor"
                            rows="5"></textarea>
                    </td>

                    <td class="text-center">
                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 add_more_value_feature"
                            title="Add">
                            <i class="bi bi-plus-circle"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 remove_value_feature"
                            title="Remove">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    </td>
                </tr>
            `;

            return row;
        }

        // Add New button
        $(document).on('click', '.add_new_value_feature', function (e) {
            e.preventDefault();

            let newRow = $(createValueFeatureRow());
            $('.addMoreValueFeature').append(newRow);
            initEditor(newRow.find('textarea.editor'));

            updateValueFeatureRows();
        });

        // Plus button
        $(document).on('click', '.add_more_value_feature', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest('tr');

            let newRow = $(createValueFeatureRow());
            currentRow.after(newRow);
            initEditor(newRow.find('textarea.editor'));

            updateValueFeatureRows();
        });

        // Remove button
        $(document).on('click', '.remove_value_feature', function (e) {
            e.preventDefault();

            $(this).closest('tr').remove();

            updateValueFeatureRows();
        });

        // Initial numbering
        updateValueFeatureRows();

    });
</script>

<!-- steps field -->
<script>
    $(document).ready(function () {

        function updateValueStepRows() {
            $('.addMoreValueStep tr').each(function (index) {
                let row = $(this);

                row.find('.value-table-no').text(index + 1);

                row.find('select[name*="[icon]"]')
                    .attr('name', 'values_step[' + index + '][icon]');

                row.find('textarea[name*="[description]"]')
                    .attr('name', 'values_step[' + index + '][description]');
            });
        }

        function createValueStepRow() {
            let index = $('.addMoreValueStep tr').length;

            let row = `
                <tr>
                    <td class="value-table-no">${index + 1}</td>

                    <td>
                        <select name="values_step[${index}][icon]" class="form-control">
                            <option value="">Select Icon</option>
                            <option value="broadcast">Broadcast</option>
                            <option value="search">Search</option>
                            <option value="pencil-square">Pencil</option>
                            <option value="send-check">Sent Message</option>
                        </select>
                    </td>

                    <td>
                        <textarea name="values_step[${index}][description]"
                            class="form-control editor"
                            rows="5"></textarea>
                    </td>

                    <td class="text-center">
                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 add_more_value_step"
                            title="Add">
                            <i class="bi bi-plus-circle"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 remove_value_step"
                            title="Remove">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    </td>
                </tr>
            `;

            return row;
        }

        // Add New button
        $(document).on('click', '.add_new_value_step', function (e) {
            e.preventDefault();

            let newRow = $(createValueStepRow());
            $('.addMoreValueStep').append(newRow);
            initEditor(newRow.find('textarea.editor'));

            updateValueStepRows();
        });

        // Plus button
        $(document).on('click', '.add_more_value_step', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest('tr');

            let newRow = $(createValueStepRow());
            currentRow.after(newRow);
            initEditor(newRow.find('textarea.editor'));

            updateValueStepRows();
        });

        // Remove button
        $(document).on('click', '.remove_value_step', function (e) {
            e.preventDefault();

            $(this).closest('tr').remove();

            updateValueStepRows();
        });

        // Initial numbering
        updateValueStepRows();

    });
</script>