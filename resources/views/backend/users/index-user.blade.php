@extends('layouts.vertical', ['page_title' => 'All Users', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                    <div class="align-self-center">
                        <h4 class="page-title" style="line-height: unset;">Users</h4>
                    </div>
                    <div>
                        <a href="{{ route('backend.user.create') }}" class="btn btn-outline-primary">Add New User</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        {{-- <th>Username</th> --}}
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            {{-- <td>
                                                <span class="fw-600">{{ $user->username }}</span>
                                                <br />
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('backend.user.profile', $user->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                    @if ($user->id != auth()->user()->id)
                                                        <span class="delete">
                                                            |
                                                            <a href="{{ route('backend.user.delete.view', $user->id) }}"
                                                                class="text-danger">Delete</a>
                                                        </span>
                                                    @endif
                                                    <span class="view">
                                                        |
                                                        <a href="#" class="text-primary">View</a>
                                                    </span>
                                                    @if ($user->id != auth()->user()->id)
                                                        <span class="view">
                                                            |
                                                            <a href="{{ route('backend.user.passwordResetLink', $user->id) }}"
                                                                onclick="return confirm('Are you send email for reset password link?');"
                                                                class="text-primary">Send Password Reset</a>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td> --}}
                                            <td>
                                                <span class="fw-600">{{ $user->name }}</span>
                                                <br />
                                                <div class="row-action">
                                                    <span class="edit">
                                                        <a href="{{ route('backend.user.profile', $user->id) }}"
                                                            class="text-primary">Edit</a>
                                                    </span>
                                                    @if ($user->id != auth()->user()->id)
                                                        <span class="delete">
                                                            |
                                                            <a href="{{ route('backend.user.delete.view', $user->id) }}"
                                                                class="text-danger">Delete</a>
                                                        </span>
                                                    @endif
                                                    {{-- <span class="view">
                                                        |
                                                        <a href="#" class="text-primary">View</a>
                                                    </span>
                                                    @if ($user->id != auth()->user()->id)
                                                        <span class="view">
                                                            |
                                                            <a href="{{ route('backend.user.passwordResetLink', $user->id) }}"
                                                                onclick="return confirm('Are you send email for reset password link?');"
                                                                class="text-primary">Send Password Reset</a>
                                                        </span>
                                                    @endif --}}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                            </td>
                                            <td>
                                                @if ($user->getRoleNames())
                                                    @foreach ($user->getRoleNames() as $roleName)
                                                        <b>{{ $roleName }}</b>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                Published
                                                <br>
                                                {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d h:i a') }}
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
