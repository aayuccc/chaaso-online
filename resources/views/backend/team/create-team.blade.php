@extends('layouts.vertical', ['page_title' => 'Add New Team', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add New Team</h4>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('backend.store.team') }}">
            @csrf
            <div class="row">
                <div class="col-md-9">

                    {{-- main content --}}
                    <x-backend.post.main-section />

                    {{-- excerpt --}}
                    {{-- <x-backend.post.excerpt /> --}}

                    @include('backend.team.fields-team')

                    {{-- seo --}}
                    {{-- <x-backend.seo.seo-section /> --}}
                </div>
                <input type="hidden" name="type" value="{{ $type }}" />
                <div class="col-md-3">
                    {{-- publish / submit --}}
                    <x-backend.post.status button="Submit" />

                    {{-- feature image --}}
                    <x-backend.post.featured-image />
                    {{-- departments --}}
                    <x-backend.post.category title="Departments" name="departments[]" type="multiple"
                        :categories="$departments" />
                </div>
            </div>
        </form>
    </div>
    <livewire:backend.medias :multiple="false" :openModal="false" />
@endsection

@section('script')
    @vite(['resources/js/media.js'])
@endsection
