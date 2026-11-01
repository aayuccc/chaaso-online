@extends('frontend.layouts.app', ['payload' => $cat, 'payloadMeta' => $catMeta, 'title' => $cat->name])


@section('main-section')
    <h1>Single Category</h1>
@endsection
