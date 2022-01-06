@extends('back.layouts.master')
@section('title', 'Kullanıcı Oluştur')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
            <form method="post" action="{{route('admin.user.create.post')}}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Kullanıcı E-Posta</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Kullanıcı Şifre</label>
                    <input type="text" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Kullanıcıyı Oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
