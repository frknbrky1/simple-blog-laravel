@extends('front.layouts.master')
@section('title', 'Anasayfa')
@section('content')

    <div class="col-md-10 col-lg-8 col-xl-9">
        <!-- Post preview-->
       @include('front.widgets.articleList')
    </div>
    @include('front.widgets.categoryWidget')
@endsection
