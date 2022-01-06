@extends('back.layouts.master')
@section('title', 'Tüm Mesajlar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title') <span class="float-right">Toplam {{$emails->count()}} okunmamış mesaj var.</span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Gönderen Adı</th>
                        <th>Gönderen E-Posta</th>
                        <th>Konu</th>
                        <th>Mesajı</th>
                        <th>Gönderilme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->topic}}</td>
                            <td>{{\Illuminate\Support\Str::limit($message->message, 50)}}</td>
                            <td>{{$message->created_at->diffForHumans()}}</td>
                            <td class="text-center align-middle">
                                <a href="{{route('admin.contact.read', $message->id)}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.delete.contact', $message->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
