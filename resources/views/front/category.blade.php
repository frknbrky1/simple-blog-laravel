@extends('front.layouts.master')
@section('title', $category->name.' Kategorisi | Toplam '.count($articles).' yazı..')
@section('content')

    <div class="col-md-10 col-lg-8 col-xl-9">
        @include('front.widgets.articleList')
    </div>
    @include('front.widgets.categoryWidget')
@endsection
