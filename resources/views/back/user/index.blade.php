@extends('back.layouts.master')
@section('title', 'Tüm Kullanıcılar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title') <span class="float-right">Siz dahil {{$users->count()}} kullanıcı var.</span></h6>
            <a href="{{route('admin.user.create')}}" class="btn btn-success btn-sm float-right" style="margin: 5px"><i class="fa fa-plus"> Yeni Kullanıcı</i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Adı</th>
                        <th>E-Posta</th>
                        <th>Şifre</th>
                        <th>Yetki</th>
                        <th>Durum</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if($user->id != 1)
                        <tr>
                            <td class="text-center align-middle">{{$user->id}}</td>
                            <td class="text-center align-middle">{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td class="text-center align-middle">
                                <input class="switch-authority" users-id="{{$user->id}}" type="checkbox" data-on="Var" data-off="Yok" data-offstyle="danger" data-onstyle="success" @if($user->authority == 1) checked @endif data-toggle="toggle">
                            </td>
                            <td class="text-center align-middle">
                                <input class="switch" user-id="{{$user->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-offstyle="danger" data-onstyle="success" @if($user->status == 1) checked @endif data-toggle="toggle">
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{route('admin.user.delete', $user->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch-authority').change(function() {
                id = $(this)[0].getAttribute('users-id')
                authority = $(this).prop('checked');
                $.get("{{route('admin.user.authority')}}", {id:id, authority:authority}, function (data, authority) {});
            });

            $('.switch').change(function() {
                id = $(this)[0].getAttribute('user-id')
                statu = $(this).prop('checked');
                $.get("{{route('admin.user.switch')}}", {id:id, statu:statu}, function (data, status) {});
            });
        });
    </script>
@endsection
