@extends('layouts.vertical', ['page_title' => 'Edit Team', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Team</h4>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('backend.team.update', $post->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    {{-- main content --}}
                    <x-backend.post.main-section :title="$post->post_title" :slug="$post->slug" :content="$post->post_content" />

                    {{-- excerpt --}}
                    {{-- <x-backend.post.excerpt :content="$post->post_excerpt" /> --}}

                    @include('backend.team.fields-team')

                    {{-- SEO --}}
                    {{-- <x-backend.seo.seo-section :metaDatas="$metaDatas" /> --}}
                </div>
                <input type="hidden" id="pageID" value="{{ $post->id }}" />
                <div class="col-md-3">
                    {{-- publish / submit --}}
                    <x-backend.post.status :post="$post" route="" button="Update" />

                    {{-- featured image --}}
                    <x-backend.post.featured-image :metaDatas="$metaDatas" />
                    {{-- departments --}}
                    <x-backend.post.category title="Departments" name="departments[]" type="multiple"
                        :categories="$departments" :post="$post" />
                </div>
            </div>
        </form>
        <livewire:backend.medias />
    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/demo.form-advanced.js'])
    @vite(['resources/js/media.js'])
@endsection
