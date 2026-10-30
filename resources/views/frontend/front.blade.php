@extends('frontend.layouts.app', ['payload' => $news, 'payloadMeta' => $postMeta, 'title' => $news->post_title])

@section('main-section')
    <h1>Front Page</h1>
@endsection
