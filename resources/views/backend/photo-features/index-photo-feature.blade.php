@extends('layouts.vertical', ['page_title' => 'All Photo Features', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css', 'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css', 'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css', 'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css', 'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'])
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box py-3 d-flex justify-content-start align-content-center  gap-2">
                    <div>
                        <a href="{{ route('backend.photo_feature.create') }}" class="btn btn-outline-primary">Add New Photo Feature</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="row-action">
                                <span class="edit">
                                    <a href="{{ route('backend.photo_feature') }}">
                                        <span class="@if ($status == 'all') text-black fw-700 @endif">
                                            All
                                        </span>
                                        ({{ count($all) }})</a>
                                </span>
                                @if ($publishPosts > 0)
                                    <span class="publish">
                                        |
                                        <a href="{{ route('backend.photo_feature', ['status' => 'publish']) }}" class="">
                                            <span class="@if ($status == 'publish') text-black fw-700 @endif">
                                                Publish
                                            </span> ({{ $publishPosts }})</a>
                                    </span>
                                @endif
                                @if ($draftPosts > 0)
                                    <span class="draft">
                                        |
                                        <a href="{{ route('backend.photo_feature', ['status' => 'draft']) }}" class="">
                                            <span
                                                class="@if ($status == 'draft') text-black fw-700 @endif">Draft</span>
                                            ({{ $draftPosts }})</a>
                                    </span>
                                @endif

                                @if ($trashPosts > 0)
                                    <span class="delete">
                                        |
                                        <a href="{{ route('backend.post.trash', $postType) }}" class="">
                                            <span
                                                class="@if ($status == 'trash') text-black fw-700 @endif">Trashed</span>
                                            ({{ $trashPosts }})</a>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Photos</th>
                                        <th>User</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        @php
                                            $galleryIds = $post->postMeta->firstWhere('meta_key', 'photo_gallery')?->meta_value;
                                            $photoCount = count(array_filter(explode(',', (string) $galleryIds)));
                                        @endphp
                                        <tr>
                                            <td>
                                                <span class="fw-600">{{ $post->post_title }}</span>
                                                {{ $post->post_status != 'publish' ? ' — Draft' : '' }}
                                                <br />
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('backend.photo_feature.edit', $post->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                    <span class="delete">
                                                        |
                                                        <a href="{{ route('backend.post.delete', $post->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete?');"
                                                            class="text-danger">Delete</a>
                                                    </span>
                                                    <span class="view">
                                                        |
                                                        <a href="{{ route('frontend.photo_feature.show', $post->id) }}"
                                                            target="_blank" class="text-primary">View</a>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>{{ $photoCount }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('backend.user.profile', $post->user->id) }}">{{ $post->user->name }}</a>
                                                <p class="form-text text-muted" style="font-size: 0.7rem;">
                                                    {{ $post->user->email }}</p>
                                            </td>
                                            <td>
                                                {{ $post->post_status == 'publish' ? 'Published' : 'Last Modified' }}
                                                <br>
                                                {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d h:i a') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div> <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.datatable-init.js'])
@endsection
