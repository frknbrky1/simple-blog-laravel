@extends('back.layouts.master')
@section('title', $message->name.' kişisinden gelen mesaj')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('admin.contact.index')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-inbox"> Tüm Mesajlar</i></a>
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label><b>Gönderen Adı: </b></label>
                {{$message->name}}
            </div>
            <div class="form-group">
                <label><b>Gönderen E-Posta: </b></label>
                {{$message->email}}
            </div>
            <div class="form-group">
                <label><b>Konu: </b></label>
                {{$message->topic}}
            </div>
            <div class="form-group">
                <label><b>Mesaj: </b></label>
                {{$message->message}}
            </div>
            <div class="form-group">
                <label><b>Gönderilme Tarihi: </b></label>
                {{$message->created_at}}
            </div>
            <div class="form-group float-right">
                <a href="{{route('admin.delete.contact', $message->id)}}" title="Sil" class="btn btn-sm btn-danger">Mesajı Sil</a>
            </div>
        </div>
    </div>
@endsection
