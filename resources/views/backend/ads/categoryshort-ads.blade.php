<div class="tab-pane fade {{ request()->query('tab') == 'category-short-ads' ? 'active show' : '' }}" id="category-short-ads" role="tabpanel" aria-labelledby="category-short-ads-tab">
    <div class="row">
        <div class="col-md-12">

            <div class="mb-3">
                <label class="form-label">Sidebar Ads</label>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="custom-table-sno">S.No</th>
                                <th>Ad Details</th>
                                <th style="width:10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="addMoreSliderGalleryBelowMastheadAds">
                            @isset($settings['below_masthead_ads'])
                                @php
                                    $chooseUs = unserialize($settings['below_masthead_ads']);
                                @endphp
                                @foreach ($chooseUs as $index => $item)
                                    <tr>
                                        <td class="custom-table-no">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="row" style="background-color: #b3b9c01c; padding: 20px 20px 0; border-radius: 10px; margin: 0;">
                                                @include('backend.ads.partials.repeater-image', ['prefix' => 'below_masthead_ads', 'index' => $index, 'key' => 'image', 'label' => 'Ad Image', 'imageId' => $item['image'] ?? null, 'col' => 'col-6'])

                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Ad URL</label>
                                                    <input type="url" name="below_masthead_ads[{{ $index }}][link]" class="form-control" value="{{ $item['link'] ?? '' }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_slider_gallery_below_masthead_ads">
                                                <i class="bi bi-plus-circle"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_slider_gallery_below_masthead_ads">
                                                <i class="bi bi-x-circle"></i>
                                            </a>
                                            <hr>
                                            <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-up-below-masthead-ads" title="Move Up">
                                                <i class="bi bi-arrow-up-circle"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-down-below-masthead-ads" title="Move Down">
                                                <i class="bi bi-arrow-down-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    <div class="text-end mt-2">
                        <button type="button" class="btn btn-primary btn-sm add_slider_gallery_below_masthead_ads">Add Ad</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- repeater script for Sidebar Ads -->
<script>
    (function() {
        const PREFIX = 'below_masthead_ads';
        const $body = () => $('.addMoreSliderGalleryBelowMastheadAds');

        $(document).on('click', '.add_slider_gallery_below_masthead_ads', function() {
            $body().append(buildRowBelowMastheadAds());
            refreshBelowMastheadAds();
            initMediaBelowMastheadAds($body().find('tr:last'));
        });

        $(document).on('click', '.add_more_slider_gallery_below_masthead_ads', function() {
            let clickedRow = $(this).closest('tr');
            clickedRow.after(buildRowBelowMastheadAds());
            refreshBelowMastheadAds();
            initMediaBelowMastheadAds(clickedRow.next());
        });

        $(document).on('click', '.addMoreSliderGalleryBelowMastheadAds .remove_slider_gallery_below_masthead_ads', function() {
            $(this).closest('tr').remove();
            refreshBelowMastheadAds();
        });

        $(document).on('click', '.addMoreSliderGalleryBelowMastheadAds .move-up-below-masthead-ads', function() {
            let row = $(this).closest('tr');
            let prev = row.prev('tr');
            if (prev.length) { row.insertBefore(prev); refreshBelowMastheadAds(); }
        });

        $(document).on('click', '.addMoreSliderGalleryBelowMastheadAds .move-down-below-masthead-ads', function() {
            let row = $(this).closest('tr');
            let next = row.next('tr');
            if (next.length) { row.insertAfter(next); refreshBelowMastheadAds(); }
        });

        function buildRowBelowMastheadAds() {
            let n = $body().find('tr').length;

            return `
            <tr>
                <td class="custom-table-no no">${n + 1}</td>
                <td>
                    <div class="row" style="background-color: #b3b9c01c; padding: 20px 20px 0; border-radius: 10px; margin: 0;">
                        <div class="mb-3 col-6">
                            <label class="form-label">Ad Image</label>
                            <div class="media-input image-input">
                                <div class="input-group open-media-manager" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;" data-field="${PREFIX}${n}_image" data-select="single">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control file-amount">Choose File</div>
                                </div>
                                <div class="preview-closer">
                                    <input type="hidden" id="${PREFIX}${n}_image" name="${PREFIX}[${n}][image]" class="selected-files" value="" />
                                    <div id="${PREFIX}${n}_image_select"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Ad URL</label>
                            <input type="url" name="${PREFIX}[${n}][link]" class="form-control" />
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="text-success fs-16 px-1 add_more_slider_gallery_below_masthead_ads">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-danger fs-16 px-1 remove_slider_gallery_below_masthead_ads">
                        <i class="bi bi-x-circle"></i>
                    </a>
                    <hr>
                    <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-up-below-masthead-ads" title="Move Up">
                        <i class="bi bi-arrow-up-circle"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-primary fs-16 px-1 move-down-below-masthead-ads" title="Move Down">
                        <i class="bi bi-arrow-down-circle"></i>
                    </a>
                </td>
            </tr>`;
        }

        // Renumber rows and re-index every name / id / data-field / data-slug
        function refreshBelowMastheadAds() {
            $body().find('tr').each(function(index) {
                let $row = $(this);
                $row.find('.custom-table-no').text(index + 1);

                $row.find('[name^="' + PREFIX + '["]').each(function() {
                    $(this).attr('name', $(this).attr('name').replace(/^[^\[]+\[\d+\]/, `${PREFIX}[${index}]`));
                });

                const idRe = new RegExp('^' + PREFIX + '\\d+_');
                $row.find('[id]').each(function() {
                    let id = $(this).attr('id');
                    if (idRe.test(id)) $(this).attr('id', id.replace(idRe, `${PREFIX}${index}_`));
                });
                $row.find('[data-field]').each(function() {
                    let v = $(this).attr('data-field');
                    if (idRe.test(v)) {
                        let nv = v.replace(idRe, `${PREFIX}${index}_`);
                        $(this).attr('data-field', nv).data('field', nv);
                    }
                });
                $row.find('[data-slug]').each(function() {
                    let v = $(this).attr('data-slug');
                    if (idRe.test(v)) {
                        let nv = v.replace(idRe, `${PREFIX}${index}_`);
                        $(this).attr('data-slug', nv).data('slug', nv);
                    }
                });
            });
        }

        function initMediaBelowMastheadAds($row) {
            $row.find('.open-media-manager').off('click.belowMastheadAds').on('click.belowMastheadAds', function() {
                var fieldValue = $(this).attr('data-field') || $(this).data('field');
                var dataSelect = $(this).attr('data-select') || $(this).data('select');
                var mediaIds = $('#' + fieldValue).val() ? $('#' + fieldValue).val() : '';
                $('body').attr('data-field', fieldValue).attr('data-select', dataSelect).attr('data-ids', mediaIds);
                $('#exampleModal').attr('data-current-field', fieldValue).attr('data-current-select', dataSelect);
            });
        }

        $(document).ready(function() {
            $body().find('tr').each(function() { initMediaBelowMastheadAds($(this)); });
        });
    })();
</script>