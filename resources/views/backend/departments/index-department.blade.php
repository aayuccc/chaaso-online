@extends('layouts.vertical', ['page_title' => 'Departments', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css', 'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css', 'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css', 'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css', 'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Departments</h4>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Add Department Form --}}
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-2">Add New Department</h4>

                        <form method="POST" action="{{ route('backend.department.store') }}">
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}" />

                            <div class="mb-3">
                                <label class="form-label" for="category-name">Name <span
                                        class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control" id="category-name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="category-slug">Slug</label>
                                <input name="slug" type="text" class="form-control" id="category-slug">
                            </div>

                            <div class="mb-3">
                                <label for="category-description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="category-description" rows="5"></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit">Add New Department</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Department List Table --}}
            <div class="col-lg-7">
                @php $siteURL = SettingHelper::get_field('site_url'); @endphp

                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="row-action">
                                <span class="edit">
                                    <a href="{{ route('backend.department') }}">
                                        <span class="{{ $status == 'all' ? 'text-black fw-700' : '' }}">All</span>
                                        ({{ $all }})
                                    </a>
                                </span>
                                @if ($trashPosts > 0)
                                    <span class="delete">
                                        |
                                        <a href="{{ route('backend.department', ['status' => 'trash']) }}">
                                            <span
                                                class="{{ $status == 'trash' ? 'text-black fw-700' : '' }}">Trashed</span>
                                            ({{ $trashPosts }})
                                        </a>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <livewire:data-table.department-data-table :siteURL="$siteURL" :status="$status" />

                    </div>
                </div>
            </div>
        </div>

        <livewire:backend.medias :multiple="false" :openModal="false" />
    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/demo.datatable-init.js', 'resources/js/media.js'])
@endsection
