@extends('back.layouts.master')
@section('title', 'Ayarlar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.config.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Site Başlığı
                            </label>
                            <input type="text" name="title" required class="form-control" value="{{$config->title}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Site Aktif mi ?
                            </label>
                            <select class="form-control" name="active">
                                <option @if($config->active == 1) selected @endif value="1">Evet</option>
                                <option @if($config->active == 0) selected @endif value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Site Logosu
                            </label>
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <input type="file" name="logo" />
                                </div>
                                @if($config->logo != "")
                                    <div class="col-md-4  align-self-center">Yüklü Logo:
                                        <img src="{{"/".$config->logo}}" height="64" />
                                    </div>
                                    <div class="col-md-4  align-self-center">
                                        <a href="{{route('admin.config.deleteLogo')}}" title="Sil" class="btn btn-sm btn-danger">Logoyu Sil</a>
                                    </div>
                                @else
                                    <div class="col-md-4  align-self-center">
                                        <i>Logo yüklü değil. Site başlığı kullanılıyor.</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Site Favicon
                            </label>
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <input type="file" name="favicon" />
                                </div>
                                @if($config->favicon != "")
                                    <div class="col-md-4  align-self-center">Yüklü Favicon:
                                        <img src="{{"/".$config->favicon}}" height="32" />
                                    </div>
                                    <div class="col-md-4  align-self-center">
                                        <a href="{{route('admin.config.deleteFavicon')}}" title="Sil" class="btn btn-sm btn-danger">Faviconu Sil</a>
                                    </div>
                                @else
                                    <div class="col-md-4  align-self-center">
                                        <i>Favicon yüklü değil.</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Facebook
                            </label>
                            <input type="text" name="facebook" class="form-control" value="{{$config->facebook}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Twitter
                            </label>
                            <input type="text" name="twitter" class="form-control" value="{{$config->twitter}}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                İnstagram
                            </label>
                            <input type="text" name="instagram" class="form-control" value="{{$config->instagram}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                LinkedIn
                            </label>
                            <input type="text" name="linkedin" class="form-control" value="{{$config->linkedin}}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                GitHub
                            </label>
                            <input type="text" name="github" class="form-control" value="{{$config->github}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                Youtube
                            </label>
                            <input type="text" name="youtube" class="form-control" value="{{$config->youtube}}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-md btn-success">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
