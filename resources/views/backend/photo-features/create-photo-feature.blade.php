@extends('layouts.vertical', ['page_title' => 'Add New Photo Feature', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add New Photo Feature</h4>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('backend.photo_feature.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-9">

                    {{-- main content --}}
                    <x-backend.post.main-section />

                    @include('backend.photo-features.fields-photo-feature')

                    {{-- seo --}}
                    <x-backend.seo.seo-section />
                </div>
                <input type="hidden" name="type" value="{{ $type }}" />
                <div class="col-md-3">
                    {{-- publish / submit --}}
                    <x-backend.post.status button="Submit" />

                    {{-- cover image --}}
                    <x-backend.post.featured-image />
                    
                    <div class="col-12">
                        <x-backend.post.category title="Author" name="authors[]" type="single" :categories="$authors" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <livewire:backend.medias />
@endsection

@section('script')
    @vite(['resources/js/media.js'])
@endsection
