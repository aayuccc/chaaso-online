<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                <h4 class="header-title">About Page Builder</h4>
            </div>
            <div class="tab-heading">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#faq" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            FAQ
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">

                <div class="tab-pane show active" id="faq">
                    <div class="form-group row">
                        <div class="col-md-12 mb-3">
                            <label for="faq" class="form-label">Add FAQ</label>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th class="custom-table-sno">S.No</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreFaq">
                                        @isset($metaDatas['faq'])
                                            @php
                                                $faqs = is_string($metaDatas['faq']) ? unserialize($metaDatas['faq']) : $metaDatas['faq'];
                                            @endphp
                                            @if (is_array($faqs))
                                                @foreach ($faqs as $index => $item)
                                                    <tr>
                                                        <td class="custom-table-no no">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            <input type="text" name="faq[{{ $index }}][question]" class="form-control" value="{{ $item['question'] ?? '' }}">
                                                        </td>
                                                        <td>
                                                            <textarea name="faq[{{ $index }}][answer]" class="form-control" rows="3">{{ $item['answer'] ?? '' }}</textarea>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0);" class="text-reset fs-16 px-1 add_more"><i class="bi bi-plus-circle"></i></a>
                                                            <a href="javascript:void(0);" class="text-reset fs-16 px-1 remove"><i class="bi bi-x-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end mt-2">
                                <button type="button" class="btn btn-primary btn-sm add_new">Add New</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    var faq = '#faq';

    function updateFaqSerialNumbers() {
        $('.addMoreFaq tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
            $(this).find('input[name*="[question]"]').attr('name', 'faq[' + index + '][question]');
            $(this).find('textarea[name*="[answer]"]').attr('name', 'faq[' + index + '][answer]');
        });
    }

    function addFaqRowData() {
        let numberOfRow = $('.addMoreFaq tr').length;
        let tr = `
            <tr>
                <td class="custom-table-sno no">
                    ${numberOfRow + 1}
                </td>
                <td>
                    <input type="text" name="faq[${numberOfRow}][question]" class="form-control">
                </td>
                <td>
                    <textarea name="faq[${numberOfRow}][answer]" class="form-control" rows="3"></textarea>
                </td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="text-reset fs-16 px-1 add_more"><i class="bi bi-plus-circle"></i></a>
                    <a href="javascript:void(0);" class="text-reset fs-16 px-1 remove"><i class="bi bi-x-circle"></i></a>
                </td>
            </tr>
        `;
        return tr;
    }

    $(document).on('click', faq + ' .add_more', function() {
        let clickedRow = $(this).closest('tr');
        let row = addFaqRowData();
        clickedRow.after(row);
        updateFaqSerialNumbers();
    });

    $(document).on('click', faq + ' .add_new', function() {
        let row = addFaqRowData();
        $('.addMoreFaq').append(row);
        updateFaqSerialNumbers();
    });

    $(document).on('click', faq + ' td.text-center > a.remove', function(e) {
        e.stopPropagation();
        $(this).closest('tr').remove();
        updateFaqSerialNumbers();
    });

    $(document).ready(function() {
        updateFaqSerialNumbers();
    });
</script>