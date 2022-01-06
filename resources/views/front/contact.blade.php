@extends('front.layouts.master')
@section('title', 'İletisim')
@section('bg', url('front/assets/img/contact-bg.jpg'))
@section('content')
    <!-- Post Content-->

    <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success" style="border-radius: 50px">
                {{session('success')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" style="border-radius: 50px">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>Benimle iletişime geçebilirsiniz.</p>
        <div class="my-5">
            <form id="contactForm" method="post" action="{{route('contact.post')}}">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="name" name="name" type="text" value="{{old('name')}}"
                           placeholder="Enter your name..."
                           data-sb-validations="required"/>
                    <label for="name">Ad Soyad</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="email" name="email" type="email" value="{{old('email')}}"
                           placeholder="Enter your email..."
                           data-sb-validations="required,email"/>
                    <label for="email">Email Adresiniz</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="phone" name="phone" type="tel"
                           placeholder="Enter your phone number..."
                           data-sb-validations="required"/>
                    <label for="phone">İsterseniz Telefon Numaranız</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                </div>
                <br>
                <div class="form-floating">
                    <select class="form-select" id="topic" name="topic" aria-label="Floating label select example">
                        <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                        <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                        <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                    </select>
                    <label id="topic-label" for="topic">Konu</label>
                </div>
                <br>
                <div class="form-floating">
                    <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..."
                              style="height: 12rem" data-sb-validations="required">{{old('message')}}</textarea>
                    <label for="message">Mesajınız</label>
                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                </div>
                <br/>
                <button class="btn btn-primary text-uppercase float-end" id="submitButton" type="submit"
                        style="border-radius: 50px">Gönder
                </button>
                <br>
            </form>
        </div>
    </div>

    <div class="col-md-4 smediagroup" style="height: min-content; display: none">
        <br>
        <img src="https://gortnm.com/uploads/1627900653.jpg" class="card-img-top" alt="..." style="border-radius: 50px">
        <div class="card-body">
            <h5 class="card-title">Sosyal medya</h5>
            <i style="font-size: 16px">
                Aşağıdakiler benim sosyal medya hesaplarım, bunların herhangi birisinden de bana
                ulaşabilirsiniz.
            </i>
        </div>
        <ul class="list-group list-group-flush">
            @php $socials = ['facebook', 'twitter', 'instagram', 'linkedin', 'github', 'youtube'];  @endphp
            @foreach($socials as $social)
                @if($config->$social != null)
                    <a target="_blank" href="{{$config->$social}}" class="text-end">
                        <li class="smedia" style="list-style: none">
                            <i class="fab fa-{{$social}}"></i>
                            <i>{{\Illuminate\Support\Str::upper($social)}}</i> →
                        </li>
                    </a>
                @endif
            @endforeach
        </ul>
        <br>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            let i = 0;
            $(".smedia").each(function () {
                i++;
            });
            if(i > 0) {
                $(".smediagroup").show();
            }
        });
    </script>
@endsection
