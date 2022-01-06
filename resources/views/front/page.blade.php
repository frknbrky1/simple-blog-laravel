@extends('front.layouts.master')
@section('title', $page->title)
@section('bg', $page->image)
@section('content')
    <!-- Post Content-->
    <div class="col-md-10 col-lg-8 col-xl-9">
        {!! $page->content !!}
    </div>
@endsection





