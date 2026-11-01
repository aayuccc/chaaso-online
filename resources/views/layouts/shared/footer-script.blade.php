<script>
    jQuery(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<!-- bundle -->
@yield('script')
<!-- App js -->
@yield('script-bottom')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- include summernote css/js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js" defer></script>



{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

<script src="{{ asset('finder/ckfinder.js') }}"></script> --}}


<script>
    toastr.options = {
        'progressBar': false,
        'positionClass': 'toast-bottom-center',
        'closeButton': true,
        'showMethod': 'slideDown',
        'hideMethod': 'slideUp',
        'closeMethod': 'slideUp',
        'preventDuplicates ': true,
    }
    // Holds the Summernote editor context that opened the media manager
    window.summernoteContext = null;

    // Custom "Picture" toolbar button that opens the existing media manager
    // instead of the default file dialog, so users can pick an existing image.
    function summernoteMediaButton(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i>',
            tooltip: 'Insert Image from Media Manager',
            click: function() {
                // Remember which editor invoked the manager and save the caret
                window.summernoteContext = context;
                context.invoke('editor.saveRange');

                // Put the media manager into single-select "summernote" mode
                $('body').attr('data-media-target', 'summernote').attr('data-select', 'single');
                $('.media-manager-box').attr('data-selected', 'false');

                // Reveal the custom image URL bar for this session
                $('#summernote-url-bar').removeClass('d-none');
                $('#summernote-image-url').val('');

                var modalEl = document.getElementById('exampleModal');
                if (modalEl) {
                    bootstrap.Modal.getOrCreateInstance(modalEl).show();
                }
            }
        });
        return button.render();
    }

    $(document).ready(function() {
        $('textarea.editor').not('.editor-features').summernote({
            tabsize: 2,
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']], // Font size dropdown
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'mediaPicture', 'video']],
                ['lineheight', ['lineheight']], // Line spacing dropdown
                ['view', ['codeview', 'help']]
            ],
            fontSizes: ['8', '10', '12', '14', '16', '18', '24', '36'], // Custom font sizes
            lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0',
                '3.0'
            ], // Custom line heights
            buttons: {
                mediaPicture: summernoteMediaButton
            },
            popover: {
                image: [
                    ['imagesize', ['resizeFull', 'resizeHalf', 'resizeQuarter']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ]
            },
            callbacks: {
                onImageUpload: function(files) {
                    const editor = $(this);
                    uploadImage(files[0], editor);
                }
            }
        });

        function uploadImage(file, editor) {
            let formData = new FormData();
            formData.append("file", file);
            // Save cursor position
            editor.summernote('saveRange');

            $.ajax({
                url: "{{ route('summernote.image.upload') }}", // Laravel route
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // editor.summernote('insertImage', response.url);
                    editor.summernote('restoreRange');
                    editor.summernote('focus');
                    editor.summernote('insertImage', response.url, function($image) {
                        $image.css('width', '25%');
                    });
                },
                error: function(xhr) {
                    alert("Upload failed");
                }
            });
        }
    });

    document.addEventListener('livewire:init', () => {

        Livewire.on('success', (event) => {
            toastr.success(event[0].message);
            // setTimeout(function() {
            // toastr.success(event[0].message);
            // }, 500);
        });

        Livewire.on('error', (event) => {
            // console.log('first')
            // setTimeout(function() {
            toastr.error(event[0].message);
            // }, 500);
        });

        Livewire.on('warning', (event) => {
            // setTimeout(function() {
            toastr.warning(event[0].message);
            // }, 500);
        });
        Livewire.on('go_to_media_body', (event) => {
            var mediaBody = document.getElementById('go_to_media_body');
            if (mediaBody) {
                mediaBody.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>


@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif

@if (Session::has('warning'))
    <script>
        toastr.warning("{{ Session::get('warning') }}");
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif


{{-- Media Manager --}}
<script src="{{ asset('dropzone.min.js') }}"></script>

<script>
    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone({
        uploadprogress: function(file, progress, bytesSent) {
            // $("button[type=submit]").prop('disabled', true);
        },
        url: "{{ route('temp-images.create') }}",
        maxFiles: 10,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif,image/svg+xml,image/webp,image/avif,.avif,application/pdf",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxfilesexceeded: function(file) {
            // drop the extra files instead of leaving them as errored previews
            this.removeFile(file);
            toastr.warning('You can upload up to 10 files at a time.');
        },
        queuecomplete: function() {
            // clear the finished batch so the next one gets a fresh limit of 10
            var dz = this;

            // once the whole batch is done, go back to the (reloaded) library so the uploads can be picked
            var libraryTab = document.getElementById('tab1-tab');
            if (libraryTab && dz.getFilesWithStatus(Dropzone.SUCCESS).length) {
                libraryTab.click();
            }

            setTimeout(function() {
                dz.removeAllFiles();
            }, 1500);
        },
        success: function(file, response) {
            toastr.success('Image has been uploaded.', {
                progressBar: true,
                positionClass: 'toast-bottom-center',
                closeButton: true,
                toastClass: 'mt-5',
            });
        }
    });

    function deleteImage(id) {
        if (confirm("Are you sure you want to delete?")) {
            $("#product-image-row-" + id).remove();
        }
    }

    // tab url
    document.addEventListener('DOMContentLoaded', function() {

        const tabs = document.querySelectorAll('a.nav-link');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = tab.getAttribute('href').substr(1);
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('tab', tabId);
                const newUrl = window.location.pathname + '?' + urlParams.toString();
                history.pushState({}, '', newUrl);
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.open-media-manager', function() {
            // $('.open-media-manager').click(function() {
            var fieldValue = $(this).data('field');
            var dataSelect = $(this).data('select');
            var mediaIds = jQuery('#' + fieldValue).val() ? jQuery('#' + fieldValue).val() : '';
            $('body').attr('data-field', fieldValue).attr('data-select', dataSelect).attr('data-ids',
                mediaIds);
            // Not a summernote session: hide the custom URL bar and clear the flag
            $('body').removeAttr('data-media-target');
            $('#summernote-url-bar').addClass('d-none');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
        });

        // Insert an image into the editor from the custom URL bar
        $(document).on('click', '#insertSummernoteUrl', function() {
            var url = ($('#summernote-image-url').val() || '').trim();
            var ctx = window.summernoteContext;

            // Reset summernote session state
            $('body').removeAttr('data-media-target');
            window.summernoteContext = null;

            if (url && ctx) {
                ctx.invoke('editor.restoreRange');
                ctx.invoke('editor.focus');
                ctx.invoke('editor.insertImage', url, function($image) {
                    $image.css('width', '25%');
                });
            }
        });

        // Reset summernote session whenever the media manager closes
        $(document).on('hidden.bs.modal', '#exampleModal', function() {
            $('body').removeAttr('data-media-target');
            $('#summernote-url-bar').addClass('d-none');
            window.summernoteContext = null;
        });
        $('#selectFiles').click(function() {
            var button = $(this);
            var selectedIds = [];
            $('.media-manager-box[data-selected="true"]').each(function() {
                selectedIds.push($(this).attr('data-id'));
            });

            // check single or multiple
            var select = $('body').attr('data-select');
            // console.log(select)

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var selectedIdsString = selectedIds.join(',');
            var fieldId = $('body').attr('data-field');
            // console.log(fieldId);
            // console.log(selectedIdsString)

            // Summernote mode: insert the chosen image(s) into the editor
            // instead of populating a form field.
            if ($('body').attr('data-media-target') === 'summernote') {
                var ctx = window.summernoteContext;

                // Reset the summernote flag regardless of outcome
                $('body').removeAttr('data-media-target');
                window.summernoteContext = null;

                if (selectedIdsString && ctx) {
                    $.ajax({
                        url: '{{ route('select.files') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: {
                            _token: csrfToken,
                            ids: selectedIdsString
                        },
                        success: function(response) {
                            if (response) {
                                ctx.invoke('editor.restoreRange');
                                ctx.invoke('editor.focus');
                                response.forEach(function(file) {
                                    // a pdf cannot be shown as an image in the editor
                                    if (file.extension === 'pdf') {
                                        return;
                                    }
                                    ctx.invoke('editor.insertImage', file.file_name,
                                        function(
                                            $image) {
                                            $image.css('width', '25%');
                                            if (file.alt) {
                                                $image.attr('alt', file.alt);
                                            }
                                        });
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }
                return; // Do not run the form-field flow below
            }

            if (select == 'multiple') {
                // multiple: drop the ids unticked in the modal (ids on pages not loaded are kept)
                // and append the newly chosen ones to the ids already on the field
                var untickedIds = $('.media-manager-box[data-selected="false"]').map(function() {
                    return $(this).attr('data-id');
                }).get();
                var currentIds = ($('#' + fieldId).val() || '').split(',').filter(function(id) {
                    return id && untickedIds.indexOf(id) === -1;
                });
                untickedIds.forEach(function(id) {
                    $('#' + fieldId + '_select').find('.file-preview-item[data-id="' + id +
                            '"]')
                        .closest('.file-preview').remove();
                });
                selectedIds.forEach(function(id) {
                    if (currentIds.indexOf(id) === -1) {
                        currentIds.push(id);
                    }
                });
                $('#' + fieldId).val(currentIds.join(','));
            } else if (selectedIdsString) {
                $('#' + fieldId).val(selectedIdsString);
            }

            if (selectedIdsString) {
                $.ajax({
                    url: '{{ route('select.files') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        _token: csrfToken,
                        ids: selectedIdsString
                    },
                    success: function(response) {
                        if (response) {
                            var multiple = '';
                            response.forEach(function(file) {

                                var img = $('<img>');
                                img.attr('src', file.file_name);
                                if (file.alt) {
                                    img.attr('alt', file.alt);
                                }
                                var formattedSize = '';
                                if (file.file_size < 1048576) {
                                    // If the file size is less than 1 MB (1048576 bytes), it's in KB
                                    formattedSize = (file.file_size / 1024).toFixed(
                                            1) +
                                        ' KB';
                                } else {
                                    // If the file size is greater than or equal to 1 MB, it's in MB
                                    formattedSize = (file.file_size / 1048576)
                                        .toFixed(
                                            1) + ' MB';
                                }
                                var html =
                                    '<div class="file-preview box sm"><div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="' +
                                    file.id + '" title="' + file
                                    .file_original_name +
                                    '.' +
                                    file.extension + '">' +
                                    '<div class="align-items-center align-self-stretch d-flex justify-content-center thumb h-auto">' +
                                    '<img class="img-fit" src="' + (file
                                        .extension === 'pdf' ?
                                        '{{ asset('images/pdf-file.svg') }}' : file
                                        .file_name) +
                                    '" alt="' + (file.alt ?
                                        file.alt : "") + '">' +
                                    '</div>' +
                                    '<div class="col body">' +
                                    '<h6 class="d-flex">' +
                                    '<span class="text-truncate title">' + file
                                    .file_original_name + '</span>' +
                                    '<span class="flex-shrink-0 ext">.' + file
                                    .extension +
                                    '</span>' +
                                    '</h6>' +
                                    '<p>' + formattedSize + '</p>' +
                                    '</div>' +
                                    '<div class="remove">' +
                                    '<button data-id="' + file.id +
                                    '" data-slug="' + fieldId +
                                    '" class="btn btn-sm btn-link remove-attachment" type="button">' +
                                    '<i class="bi bi-x-circle"></i>' +
                                    '</button>' +
                                    '</div>' +
                                    '</div></div>';

                                // $('#' + fieldId).closest(".preview-closer").html(html);
                                if (select == 'single') {
                                    // console.log(html)
                                    $('#' + fieldId + '_select').html(html);
                                    multiple = '';
                                } else if (!$('#' + fieldId + '_select').find(
                                        '.file-preview-item[data-id="' + file.id +
                                        '"]').length) {
                                    // skip files that are already previewed
                                    multiple += html
                                }
                            });

                            if (multiple != '') {
                                $('#' + fieldId + '_select').append(multiple);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
