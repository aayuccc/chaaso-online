@extends('layouts.vertical', ['page_title' => 'Ads Management', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/select2/dist/css/select2.min.css', 'node_modules/daterangepicker/daterangepicker.css', 'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css', 'node_modules/flatpickr/dist/flatpickr.min.css'])
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Ads Management</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{ route('backend.ads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="nav  nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link border mb-2 me-1 {{ !request()->has('tab') || request()->query('tab') == 'navbar' ? 'active' : '' }}"
                                            id="navbar-tab" data-bs-toggle="pill" href="#navbar" role="tab"
                                            aria-controls="navbar"
                                            aria-selected="{{ request()->query('tab') == 'navbar' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Navbar Ads 
                                        </a>
                                       
                                        <a class="nav-link border mb-2 me-1 {{ request()->query('tab') == 'homepage-short' ? 'active' : '' }}"
                                            id="homepage-short-tab" data-bs-toggle="pill" href="#homepage-short" role="tab"
                                            aria-controls="homepage-short"
                                            aria-selected="{{ request()->query('tab') == 'homepage-short' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Home Page Short Ads
                                        </a>

                                        <a class="nav-link border mb-2 me-1 {{ request()->query('tab') == 'homepage-long' ? 'active' : '' }}"
                                            id="homepage-long-tab" data-bs-toggle="pill" href="#homepage-long" role="tab"
                                            aria-controls="homepage-long"
                                            aria-selected="{{ request()->query('tab') == 'homepage-long' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Home Page Long Ads
                                        </a>

                                        <a class="nav-link border mb-2 me-1 {{ request()->query('tab') == 'news-single' ? 'active' : '' }}"
                                            id="news-single-tab" data-bs-toggle="pill" href="#news-single" role="tab"
                                            aria-controls="news-single"
                                            aria-selected="{{ request()->query('tab') == 'news-single' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Single Page Long Ads    
                                        </a>
                                        <a class="nav-link border mb-2 me-1 {{ request()->query('tab') == 'news-single-short' ? 'active' : '' }}"
                                            id="news-single-short-tab" data-bs-toggle="pill" href="#news-single-short" role="tab"
                                            aria-controls="news-single-short"
                                            aria-selected="{{ request()->query('tab') == 'news-single-short' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Single Page Short Ads    
                                        </a>
                                        <a class="nav-link border mb-2 me-1 {{ request()->query('tab') == 'category-short-ads' ? 'active' : '' }}"
                                            id="category-short-ads-tab" data-bs-toggle="pill" href="#category-short-ads" role="tab"
                                            aria-controls="category-short-ads"
                                            aria-selected="{{ request()->query('tab') == 'category-short-ads' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Category Short Ads 
                                        </a>
                                        <a class="nav-link border mb-2 me-1 {{ request()->query('tab') == 'category-long-ads' ? 'active' : '' }}"
                                            id="category-long-ads-tab" data-bs-toggle="pill" href="#category-long-ads" role="tab"
                                            aria-controls="category-long-ads"
                                            aria-selected="{{ request()->query('tab') == 'category-long-ads' ? 'true' : 'false' }}"
                                            tabindex="-1">
                                            Category Long Ads 
                                        </a>
                                    </div>
                                </div>
                                <!--<p class="text-muted">Please Insert the URL by clicking on the browse button and edit the file description.</p>-->
                                <!--<hr>-->
                                <div class="col-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @include('backend.ads.navbar-ads')
                                        @include('backend.ads.homepageshort-ads')
                                        @include('backend.ads.homepagelong-ads')        
                                        @include('backend.ads.singlelong-ads')   
                                        @include('backend.ads.singleshort-ads')
                                        @include('backend.ads.categoryshort-ads')
                                        @include('backend.ads.categorylong-ads')                            

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-start">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <livewire:backend.medias />

    </div>
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/media.js'])
@endsection


@push('backend-js')
    <script>
        // tab url
        document.addEventListener('DOMContentLoaded', function() {

            const tabs = document.querySelectorAll('a.nav-link');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = tab.getAttribute('href').substr(1);
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('tab', tabId);
                    const newUrl = window.location.pathname + '?' + urlParams.toString();
                    history.pushState({}, '', newUrl);
                });
            });
        });
    </script>
@endpush