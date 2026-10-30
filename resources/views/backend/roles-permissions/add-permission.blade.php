@extends('layouts.vertical', ['page_title' => 'Add New Role', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box py-3 d-flex justify-content-start align-content-center  gap-2">
                    <div class="align-self-center">
                        <h4 class="page-title" style="line-height: unset;">Add/Edit Permission to Role</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Role: {{ $role->name }}</h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('givePermissionToRole', $role->id) }}" method="POST">
                                    @csrf
                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-2">
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="{{ $permission->id }}" name="permission[]"
                                                            value="{{ $permission->name }}"
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
@endsection
