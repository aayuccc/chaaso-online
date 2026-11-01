<div>
    <style>
        /* ===== Media Library (compact modern) ===== */
        .media-modal .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            height: 86vh;
            max-height: 920px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 24px 70px rgba(17, 24, 39, .28);
        }

        @media (max-width: 767.98px) {
            .media-modal .modal-content {
                height: 100vh;
                border-radius: 0;
            }
        }

        /* Header */
        .media-modal .mm-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: .85rem 1.25rem;
            border-bottom: 1px solid #eceef1;
            background: #fff;
        }

        .media-modal .mm-header-left {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            min-width: 0;
        }

        .media-modal .mm-title {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: -.01em;
            color: #111827;
            white-space: nowrap;
        }

        /* Tabs as a segmented control */
        .media-modal .mm-tabs {
            display: flex;
            gap: .25rem;
            background: #f1f3f5;
            padding: .25rem;
            border-radius: 10px;
            margin: 0;
            list-style: none;
        }

        .media-modal .mm-tabs .nav-link {
            border: none;
            background: transparent;
            color: #6b7280;
            font-size: .82rem;
            font-weight: 600;
            padding: .35rem .95rem;
            border-radius: 7px;
            line-height: 1.4;
        }

        .media-modal .mm-tabs .nav-link.active {
            background: #fff;
            color: #111827;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        }

        /* Body */
        .media-modal .mm-body {
            padding: 1rem 1.25rem 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            flex: 1 1 auto;
            min-height: 0;
        }

        /* Tab layout: active library tab fills remaining height, grid scrolls */
        .media-modal .tab-content {
            flex: 1 1 auto;
            min-height: 0;
            display: flex;
            flex-direction: column;
        }

        .media-modal #tab1.tab-pane.active {
            flex: 1 1 auto;
            min-height: 0;
            display: flex;
            flex-direction: column;
        }

        /* Custom URL bar (summernote only) */
        .media-modal .mm-urlbar {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: .85rem 1rem;
            margin-bottom: 1rem;
        }

        .media-modal .mm-urlbar label {
            font-size: .78rem;
            font-weight: 600;
            color: #374151;
        }

        /* Toolbar */
        .media-modal .mm-toolbar {
            display: flex;
            gap: .6rem;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 1rem;
        }

        .media-modal .mm-search {
            position: relative;
            flex: 1 1 240px;
            min-width: 190px;
        }

        .media-modal .mm-search i {
            position: absolute;
            left: .8rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1rem;
        }

        .media-modal .mm-search input {
            width: 100%;
            padding: .55rem .8rem .55rem 2.35rem;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: .875rem;
            background: #f9fafb;
            color: #111827;
        }

        .media-modal .mm-search input:focus {
            outline: none;
            border-color: var(--bs-primary, #2563eb);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
        }

        .media-modal .mm-select {
            width: auto;
            min-width: 128px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            font-size: .84rem;
            padding: .55rem 2rem .55rem .8rem;
            background-color: #f9fafb;
            color: #374151;
            cursor: pointer;
        }

        .media-modal .mm-select:focus {
            border-color: var(--bs-primary, #2563eb);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
        }

        .media-modal .mm-clear {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: #dc2626;
            border-radius: 10px;
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Content = grid + optional edit panel */
        .media-modal .mm-content {
            flex: 1 1 auto;
            display: flex;
            gap: 1.25rem;
            overflow: hidden;
            min-height: 0;
        }

        .media-modal .mm-scroll {
            flex: 1 1 auto;
            overflow-y: auto;
            padding-right: .35rem;
            min-height: 0;
            -ms-overflow-style: none;
            scrollbar-width: thin;
        }

        .media-modal .mm-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(146px, 1fr));
            gap: .9rem;
        }

        .media-modal .mm-content.is-editing .mm-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }

        /* Card */
        .media-modal .mm-card {
            cursor: pointer;
            outline: none;
        }

        .media-modal .mm-thumb {
            position: relative;
            aspect-ratio: 1 / 1;
            border-radius: 12px;
            overflow: hidden;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            transition: border-color .15s ease, box-shadow .15s ease;
        }

        .media-modal .mm-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .media-modal .mm-thumb.is-pdf img {
            object-fit: contain;
            padding: 22%;
        }

        .media-modal .mm-card:hover .mm-thumb {
            border-color: #cbd2da;
        }

        .media-modal .mm-card[data-selected="true"] .mm-thumb {
            border-color: var(--bs-primary, #2563eb);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .28);
        }

        /* Check badge on selection */
        .media-modal .mm-check {
            position: absolute;
            top: .45rem;
            right: .45rem;
            width: 23px;
            height: 23px;
            border-radius: 50%;
            background: var(--bs-primary, #2563eb);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
            opacity: 0;
            transform: scale(.5);
            transition: .15s ease;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .35);
        }

        .media-modal .mm-card[data-selected="true"] .mm-check {
            opacity: 1;
            transform: scale(1);
        }

        /* Hover actions (edit / delete) */
        .media-modal .mm-actions {
            position: absolute;
            top: .45rem;
            left: .45rem;
            display: flex;
            gap: .3rem;
            opacity: 0;
            transition: opacity .15s ease;
        }

        .media-modal .mm-card:hover .mm-actions {
            opacity: 1;
        }

        .media-modal .mm-actions button {
            width: 27px;
            height: 27px;
            border: none;
            border-radius: 8px;
            background: rgba(17, 24, 39, .74);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .82rem;
            line-height: 1;
        }

        .media-modal .mm-actions button:hover {
            background: #111827;
        }

        .media-modal .mm-actions .mm-del:hover {
            background: #dc2626;
        }

        /* File name */
        .media-modal .mm-name {
            margin-top: .4rem;
            font-size: .72rem;
            color: #6b7280;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 .15rem;
        }

        .media-modal .mm-size {
            font-size: .68rem;
            color: #9ca3af;
            text-align: center;
            padding: 0 .15rem;
        }

        /* Edit side panel */
        .media-modal .mm-edit {
            flex: 0 0 310px;
            max-width: 310px;
            overflow-y: auto;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: #fbfcfd;
            padding: 1rem;
        }

        .media-modal .mm-edit .mm-edit-thumb {
            border-radius: 10px;
            overflow: hidden;
            background: #f3f4f6;
            aspect-ratio: 16 / 10;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: .75rem;
        }

        .media-modal .mm-edit .mm-edit-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .media-modal .mm-edit h6.mm-edit-name {
            font-size: .85rem;
            font-weight: 600;
            color: #111827;
            word-break: break-word;
            margin-bottom: .15rem;
        }

        .media-modal .mm-edit .mm-edit-size {
            font-size: .75rem;
            color: #9ca3af;
            margin-bottom: .85rem;
        }

        .media-modal .mm-edit .form-label {
            font-size: .76rem;
            font-weight: 600;
            color: #4b5563;
            margin-bottom: .2rem;
        }

        .media-modal .mm-edit .form-control {
            font-size: .82rem;
            border-radius: 8px;
        }

        @media (max-width: 767.98px) {
            .media-modal .mm-content {
                flex-direction: column;
                overflow-y: auto;
            }

            .media-modal .mm-edit {
                flex: 1 1 auto;
                max-width: 100%;
            }
        }

        /* Footer */
        .media-modal .mm-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: .85rem 1.25rem;
            border-top: 1px solid #eceef1;
            background: #fff;
        }

        .media-modal .mm-hint {
            font-size: .8rem;
            color: #9ca3af;
        }

        .media-modal .mm-footer .btn-select {
            font-weight: 600;
            border-radius: 10px;
            padding: .5rem 1.75rem;
        }

        /* Pagination */
        .media-modal .mm-pager {
            display: flex;
            justify-content: center;
            padding: 1rem 0 .35rem;
        }

        .media-modal .mm-pager p.small.text-muted {
            display: none;
        }

        /* Upload / dropzone tab */
        .media-modal .mm-upload {
            padding: .5rem 0 1.5rem;
        }

        .media-modal .mm-upload #image {
            border: 2px dashed #d1d5db;
            border-radius: 14px;
            background: #f9fafb;
            min-height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #6b7280;
            transition: border-color .15s ease, background .15s ease;
        }

        .media-modal .mm-upload #image:hover {
            border-color: var(--bs-primary, #2563eb);
            background: #f5f8ff;
        }
    </style>

    <div class="modal fade media-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-xl modal-dialog-centered p-0 p-md-3">
            <div class="modal-content">

                {{-- Header --}}
                <div class="mm-header">
                    <div class="mm-header-left">
                        <h5 class="mm-title">Media Library</h5>
                        {{-- wire:ignore: Bootstrap owns the active tab state, Livewire must not reset it on re-render --}}
                        <ul class="mm-tabs" id="myTab" role="tablist" wire:ignore>
                            <li role="presentation">
                                <button wire:click="reloadMedia" class="nav-link active" id="tab1-tab"
                                    data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab"
                                    aria-controls="tab1" aria-selected="true">Library</button>
                            </li>
                            <li role="presentation">
                                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                    type="button" role="tab" aria-controls="tab2" aria-selected="false">Upload
                                    New</button>
                            </li>
                        </ul>
                    </div>
                    <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                {{-- Body --}}
                <div class="modal-body mm-body" id="go_to_media_body">

                    {{-- Custom image URL bar: shown only when opened from Summernote editor --}}
                    <div id="summernote-url-bar" class="d-none mm-urlbar" wire:ignore>
                        <label class="form-label mb-1">Insert image from URL</label>
                        <div class="input-group">
                            <input type="url" id="summernote-image-url" class="form-control"
                                placeholder="https://example.com/image.jpg">
                            <button type="button" class="btn btn-primary" id="insertSummernoteUrl"
                                data-bs-dismiss="modal">Insert image</button>
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">

                        {{-- ===== Library tab ===== --}}
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab"
                            wire:ignore.self>

                            {{-- Toolbar --}}
                            <div class="mm-toolbar">
                                <div class="mm-search">
                                    <i class="ri-search-line"></i>
                                    <input type="text" wire:model.live.debounce.250ms="search"
                                        placeholder="Search files by name">
                                </div>
                                <select wire:model.live="selectedMonth" class="form-select mm-select">
                                    <option value="">All months</option>
                                    @foreach ($availableMonths as $month)
                                        <option value="{{ $month['value'] }}">{{ $month['label'] }}</option>
                                    @endforeach
                                </select>
                                <select wire:model.live="sortOrder" class="form-select mm-select">
                                    <option value="desc">Newest first</option>
                                    <option value="asc">Oldest first</option>
                                </select>
                                <select wire:model.live="perPage" class="form-select mm-select">
                                    <option value="12">12 / page</option>
                                    <option value="24">24 / page</option>
                                    <option value="48">48 / page</option>
                                    <option value="96">96 / page</option>
                                    <option value="144">144 / page</option>
                                </select>
                                @if ($selectedMonth)
                                    <button wire:click="resetMonthFilter" class="mm-clear" type="button"
                                        title="Clear month filter">
                                        <i class="ri-close-line"></i>
                                    </button>
                                @endif
                            </div>

                            {{-- Grid + edit panel --}}
                            <div class="mm-content {{ $editedMedia ? 'is-editing' : '' }}">
                                <div class="mm-scroll">
                                    @if ($medias->count())
                                        <div class="mm-grid">
                                            @foreach ($medias as $media)
                                                <div class="mm-card media-manager-box"
                                                    wire:key="media-{{ $media->id }}"
                                                    data-selected="{{ in_array($media->id, $selectedMedia) ? 'true' : 'false' }}"
                                                    data-id="{{ $media->id }}"
                                                    wire:click="toggleSelect({{ $media->id }})"
                                                    onclick="toggleSelect(this)">
                                                    <div
                                                        class="mm-thumb {{ $media->extension == 'pdf' ? 'is-pdf' : '' }}">
                                                        @if ($media->extension != 'pdf')
                                                            <img loading="lazy"
                                                                src="{{ Storage::disk('public')->url($media->file_name) }}"
                                                                alt="{{ $media->alt }}" />
                                                        @else
                                                            <img loading="lazy"
                                                                src="{{ asset('images/pdf-file.svg') }}"
                                                                alt="PDF" />
                                                        @endif

                                                        <span class="mm-check"><i class="ri-check-line"></i></span>

                                                        <div class="mm-actions">
                                                            <button type="button" title="Edit details"
                                                                onclick="event.stopPropagation();"
                                                                wire:click="editMedia({{ $media->id }})">
                                                                <i class="ri-pencil-line"></i>
                                                            </button>
                                                            <button type="button" class="mm-del" title="Delete"
                                                                onclick="event.stopPropagation();"
                                                                wire:click="deleteMedia({{ $media->id }})"
                                                                wire:confirm.prompt="Delete this file permanently?\n\nType DELETE to confirm|DELETE">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="mm-name"
                                                        title="{{ $media->file_original_name }}.{{ $media->extension }}">
                                                        {{ $media->file_original_name }}.{{ $media->extension }}
                                                    </div>
                                                    <div class="mm-size">
                                                        {{ MediaHelper::getKBorMB($media->file_size) }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center text-muted py-5">
                                            <i class="ri-image-line" style="font-size:2.5rem;opacity:.4"></i>
                                            <p class="mt-2 mb-0">No files found. Try a different search or upload a new
                                                one.</p>
                                        </div>
                                    @endif

                                    @if ($medias->hasPages())
                                        <div class="mm-pager">
                                            {{ $medias->links() }}
                                        </div>
                                    @endif
                                </div>

                                {{-- Edit details panel --}}
                                @if ($editedMedia)
                                    <div class="mm-edit">
                                        <div class="mm-edit-thumb">
                                            @if ($editedMedia->extension != 'pdf')
                                                <img loading="lazy"
                                                    src="{{ Storage::disk('public')->url($editedMedia->file_name) }}"
                                                    alt="" />
                                            @else
                                                <img loading="lazy" src="{{ asset('images/pdf-file.svg') }}"
                                                    alt="PDF" />
                                            @endif
                                        </div>
                                        <h6 class="mm-edit-name">
                                            {{ $editedMedia->file_original_name }}.{{ $editedMedia->extension }}
                                        </h6>
                                        <p class="mm-edit-size">{{ MediaHelper::getKBorMB($editedMedia->file_size) }}
                                        </p>

                                        <form wire:submit="editedMediaSubmit({{ $editedMedia->id }})">
                                            <div class="mb-2">
                                                <label class="form-label">Alt text</label>
                                                <input type="text" class="form-control" wire:model="alt" />
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" wire:model="description" rows="2"></textarea>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Caption</label>
                                                <input type="text" class="form-control" wire:model="caption" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">File URL</label>
                                                <input readonly type="text" class="form-control"
                                                    onclick="this.select()"
                                                    value="{{ Storage::disk('public')->url($editedMedia->file_name) }}">
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-primary btn-sm flex-fill" type="submit">Save
                                                    changes</button>
                                                <button class="btn btn-light btn-sm" type="button"
                                                    wire:click="reloadMedia">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- ===== Upload tab ===== --}}
                        <div class="tab-pane fade mm-upload" id="tab2" role="tabpanel"
                            aria-labelledby="tab2-tab" wire:ignore>
                            <form id="my-dropzone" action="/upload" class="dropzone">
                                <h6 class="mb-3 fw-600">Upload images</h6>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <i class="ri-upload-cloud-2-line d-block mb-2" style="font-size:2rem"></i>
                                        Drop files here or click to upload
                                        <div class="small text-muted mt-1">You can upload up to 10 files at a time.
                                        </div>
                                        <div class="small text-muted">Supported formats: JPG, JPEG, PNG, GIF, SVG,
                                            WEBP,
                                            PDF</div>
                                    </div>
                                </div>
                                <div class="row" id="image-wrapper"></div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="mm-footer">
                    <span class="mm-hint">Click a file to select it, then choose Select.</span>
                    <button type="button" class="btn btn-primary btn-select" data-bs-dismiss="modal"
                        id="selectFiles">Select</button>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- scripts for livewire --}}
@script
    <script>
        $(document).ready(function() {
            $('.open-media-manager').click(function() {
                setTimeout(function() {
                    var select = $('body').attr('data-select');
                    var files = $('body').attr('data-ids');
                    @this.set('select', select);
                    @this.set('selectedMedia', files.split(','));
                    @this.set('openModal', 'true');
                }, 200);
            });
        });
    </script>
@endscript

@push('backend-js')
    <script>
        function toggleSelect(element) {

            // get media single or multiple
            var body = document.querySelector('body');
            var dataSelect = body.getAttribute('data-select');

            const isSelected = element.getAttribute('data-selected') === 'true';
            element.setAttribute('data-selected', isSelected ? 'false' : 'true');

            if (dataSelect == 'single') {
                if (!isSelected) {
                    const allElements = document.querySelectorAll('.media-manager-box');
                    allElements.forEach(el => {
                        if (el !== element) el.setAttribute('data-selected', 'false');
                    });
                }
            }
        }
    </script>
@endpush
