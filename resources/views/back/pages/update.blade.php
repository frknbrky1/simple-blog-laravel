@extends('back.layouts.master')
@section('title', $pages->title.' sayfasını gücelle')
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
            <form method="post" action="{{route('admin.page.edit.post', $pages->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Sayfa Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$pages->title}}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Sayfa Fotoğrafı</label><br>
                    <div class="row align-items-center">
                        <input type="file" name="image" class="form-control-file col-md-2">
                        @if(!empty($pages->image))
                            <img src="{{$pages->image}}" class="rounded col-md-1">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Sayfa İçeriği</label>
                    <textarea id="editor" name="content" class="form-control" rows="4">{!! $pages->content !!}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Sayfa Sırası</label>
                    <select class="form-control orderPage" name="orderselect">
                        <option value="0">Anasayfa 'dan sonra</option>
                        @foreach($pagess as $pgs)
                            <option @if($pgs->order == $pages->order-1) selected @endif value="{{$pgs->id}}">{{$pgs->title}} 'dan sonra</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sayfayı Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                'height':300
            });
        })
    </script>
@endsection
