<div class="tab-pane fade {{ !request()->has('tab') || request()->query('tab') == 'header' ? 'active show' : '' }}"
    id="header" role="tabpanel" aria-labelledby="header-tab">
    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="header_logo" class="form-label">Header Logo</label>
                    <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="cursor: pointer;" data-field="header_logo" data-select="single">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                    </div>
                    <div class="preview-closer">
                        @if (isset($settings['header_logo']) &&
                                ($media = MediaHelper::getModel()->where('id', $settings['header_logo'])->first()))
                            <input type="hidden" id="header_logo" name="header_logo" class="selected-files"
                                value="{{ $settings['header_logo'] }}">
                            <div id="header_logo_select">
                                <div class="file-preview box sm">
                                    <div
                                        class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                        <div
                                            class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                            <img class="img-fit" src="{{ asset($media->file_name) }}"
                                                alt="image" />
                                        </div>
                                        <div class="col body">
                                            <h6 class="d-flex">
                                                <span
                                                    class="text-truncate title">{{ $media->file_original_name }}</span>
                                                <span class="flex-shrink-0 ext">.{{ $media->extension }}</span>
                                            </h6>
                                            <p>{{ MediaHelper::getKBorMB($media->file_size) }}</p>
                                        </div>
                                        <div class="remove"><button data-id="{{ $media->id }}"
                                                data-slug="header_logo" class="btn btn-sm btn-link remove-attachment"
                                                type="button"><i class="bi bi-x-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <input type="hidden" id="header_logo" name="header_logo" class="selected-files"
                                value="" />
                            <div id="header_logo_select"></div>
                        @endisset
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="header_main_menu" class="form-label">Header Main Menu</label>
                    <select class="form-select" id="header_main_menu" name="header_main_menu">
                        <option value="">Select Menu</option>
                        @foreach ($menus ?? [] as $menu)
                            <option value="{{ $menu->id }}" @selected(($settings['header_main_menu'] ?? null) == $menu->id)>
                                {{ $menu->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Used for the desktop navigation and mobile menu. Add a <code>bi-*</code>
                        class (e.g. <code>bi-trophy</code>) to a menu item's CSS classes to show an icon in the mobile menu.</small>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
