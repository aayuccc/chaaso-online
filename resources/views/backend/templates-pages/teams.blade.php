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
                            Chief Editor Details
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#team-cta" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            Career CTA
                        </a>
                    </li>

                </ul>
            </div>

            <div class="tab-content">

                <div class="tab-pane show active" id="main-content">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Chief Editor Name</label>
                                <input type="text" name="chiefeditor_name" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_name']) ? $metaDatas['chiefeditor_name'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Experience</label>
                                <input type="text" name="chiefeditor_exp" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_exp']) ? $metaDatas['chiefeditor_exp'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Topic</label>
                                <input type="text" name="chiefeditor_topic" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_topic']) ? $metaDatas['chiefeditor_topic'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Language</label>
                                <input type="text" name="chiefeditor_lang" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_lang']) ? $metaDatas['chiefeditor_lang'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ isset($metaDatas['facebook']) ? $metaDatas['facebook'] : '' }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" id="twitter" name="twitter" value="{{ isset($metaDatas['twitter']) ? $metaDatas['twitter'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ isset($metaDatas['instagram']) ? $metaDatas['instagram'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="youtube" class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" id="youtube" name="youtube" value="{{ isset($metaDatas['youtube']) ? $metaDatas['youtube'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tiktok" class="form-label">TikTok URL</label>
                                <input type="url" class="form-control" id="tiktok" name="tiktok" value="{{ isset($metaDatas['tiktok']) ? $metaDatas['tiktok'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="team_email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="team_email" name="team_email" value="{{ isset($metaDatas['team_email']) ? $metaDatas['team_email'] : '' }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane show" id="team-cta">

                    <div class="row">

                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Label</label>
                                <input type="text" name="career_section_label" class="form-control"
                                    value="{{ isset($metaDatas['career_section_label']) ? $metaDatas['career_section_label'] : '' }}" />
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="career_section_title" class="form-control"
                                    value="{{ isset($metaDatas['career_section_title']) ? $metaDatas['career_section_title'] : '' }}" />
                            </div>
                        </div>

                        <div class="col-4">
                            <label class="form-label">Short Description</label>
                            <textarea name="career_section_description" class="form-control" rows="2">{{ $metaDatas['career_section_description'] ?? '' }}</textarea>
                        </div>
                        
                    </div>

                    <div class="row">
                        {{-- Button URL --}}
                        <div class="col-md-6">
                            <label for="cta_url">Email Address</label>

                            <input
                                type="mail"
                                id="cta_url"
                                class="form-control mb-3"
                                name="cta_url"
                                value="{{ isset($metaDatas['cta_url']) ? $metaDatas['cta_url'] : '' }}">
                        </div>

                        {{-- Button Text --}}
                        <div class="col-md-6">
                            <label for="cta_btn_text">Button Text</label>

                            <input
                                type="text"
                                id="cta_btn_text"
                                class="form-control"
                                name="cta_btn_text"
                                value="{{ isset($metaDatas['cta_btn_text']) ? $metaDatas['cta_btn_text'] : '' }}"
                                placeholder="Read More">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Add Job Listings</label>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="custom-table-sno">S.No</th>
                                            <th>Job Position</th>
                                            <th>Job Location</th>
                                            <th>Job Type / Duration</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="addMoreCareer">

                                        @isset($metaDatas['career_job_listings'])
                                            @php
                                                $careerJobs = is_string($metaDatas['career_job_listings'])
                                                    ? unserialize($metaDatas['career_job_listings'])
                                                    : $metaDatas['career_job_listings'];
                                            @endphp

                                            @if (is_array($careerJobs))
                                                @foreach ($careerJobs as $index => $item)
                                                    <tr>
                                                        <td class="custom-table-no">
                                                            {{ $loop->iteration }}
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="career_job_listings[{{ $index }}][job_title]"
                                                                class="form-control"
                                                                value="{{ $item['job_title'] ?? '' }}">
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="career_job_listings[{{ $index }}][job_location]"
                                                                class="form-control"
                                                                value="{{ $item['job_location'] ?? '' }}">
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="career_job_listings[{{ $index }}][job_type]"
                                                                class="form-control"
                                                                value="{{ $item['job_type'] ?? '' }}">
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="javascript:void(0)"
                                                                class="text-reset fs-16 px-1 add_more_career"
                                                                title="Add">
                                                                <i class="bi bi-plus-circle"></i>
                                                            </a>

                                                            <a href="javascript:void(0)"
                                                                class="text-reset fs-16 px-1 remove_career"
                                                                title="Remove">
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
                                    <button type="button" class="btn btn-primary btn-sm add_new_career">
                                        Add New
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Career Job Listings Script -->
<script>
    $(document).ready(function () {

        function updateCareerRows() {
            $('.addMoreCareer tr').each(function (index) {
                let row = $(this);

                row.find('.custom-table-no').text(index + 1);

                row.find('input[name*="[job_title]"]')
                    .attr('name', 'career_job_listings[' + index + '][job_title]');

                row.find('input[name*="[job_location]"]')
                    .attr('name', 'career_job_listings[' + index + '][job_location]');

                row.find('input[name*="[job_type]"]')
                    .attr('name', 'career_job_listings[' + index + '][job_type]');
            });
        }

        function createCareerRow() {
            let index = $('.addMoreCareer tr').length;

            let row = `
                <tr>
                    <td class="custom-table-no">${index + 1}</td>

                    <td>
                        <input type="text"
                            name="career_job_listings[${index}][job_title]"
                            class="form-control"
                            value="">
                    </td>

                    <td>
                        <input type="text"
                            name="career_job_listings[${index}][job_location]"
                            class="form-control"
                            value="">
                    </td>

                    <td>
                        <input type="text"
                            name="career_job_listings[${index}][job_type]"
                            class="form-control"
                            value="">
                    </td>

                    <td class="text-center">
                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 add_more_career"
                            title="Add">
                            <i class="bi bi-plus-circle"></i>
                        </a>

                        <a href="javascript:void(0)"
                            class="text-reset fs-16 px-1 remove_career"
                            title="Remove">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    </td>
                </tr>
            `;

            return row;
        }

        // Add New button
        $(document).on('click', '.add_new_career', function (e) {
            e.preventDefault();

            $('.addMoreCareer').append(createCareerRow());

            updateCareerRows();
        });

        // Plus button - Add row after current row
        $(document).on('click', '.add_more_career', function (e) {
            e.preventDefault();

            let currentRow = $(this).closest('tr');

            currentRow.after(createCareerRow());

            updateCareerRows();
        });

        // Remove button
        $(document).on('click', '.remove_career', function (e) {
            e.preventDefault();

            $(this).closest('tr').remove();

            updateCareerRows();
        });

        // Initial numbering
        updateCareerRows();

    });
</script>