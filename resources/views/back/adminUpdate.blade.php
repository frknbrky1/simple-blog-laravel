@extends('back.layouts.master')
@section('title', 'Admin güncelle')
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
            <form method="post" action="{{route('admin.admin.edit.post', $admin->id)}}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Admin Adı</label>
                    <input type="text" name="name" class="form-control" value="{{$admin->name}}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Admin E-Posta</label>
                    <input type="email" name="email" class="form-control" value="{{$admin->email}}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Admin Şifre</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Admini Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
