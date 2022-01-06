@extends('front.layouts.master')
@section('title', $article->content)
@section('bg', $article->image)
@section('content')
    <!-- Post Content-->

    <div class="col-md-10 col-lg-8 col-xl-9">
        {!!$article->content!!}
        <br>
        <br>
        <span class="text-danger">Okunma sayısı: <b>{{$article->hit}}</b></span>
    </div>
    @include('front.widgets.categoryWidget')
@endsection
