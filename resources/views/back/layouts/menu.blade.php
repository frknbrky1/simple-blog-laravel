<body id="page-top">

<div id="wrapper">
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Sa Bremin<sup>2</sup></div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item @if(Request::segment(2)=="panel") active @endif">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Panel</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">İçerik Yönetimi</div>

        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2)=="makaleler") in @else collapsed @endif" href="#"
               data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-edit"></i>
                <span>Makeleler</span>
            </a>
            <div id="collapseTwo" class="collapse @if(Request::segment(2)=="makaleler") show @endif"
                 aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Makele İşlemleri:</h6>
                    <a class="collapse-item @if(Request::segment(2)=="makaleler" and !Request::segment(3)) active @endif"
                       href="{{route('admin.makaleler.index')}}">Tüm Makaleler</a>
                    <a class="collapse-item @if(Request::segment(2)=="makaleler" and Request::segment(3)=="olustur") active @endif"
                       href="{{route('admin.makaleler.create')}}">Makale Oluştur</a>
                </div>
            </div>
        </li>

        <li class="nav-item @if(Request::segment(2)=="kategoriler") active @endif">
            <a class="nav-link" href="{{route('admin.category.index')}}">
                <i class="fas fa-fw fa-list"></i>
                <span>Kategoriler</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2)=="sayfalar") in @else collapsed @endif" href="#"
               data-toggle="collapse" data-target="#collapsePage"
               aria-expanded="true" aria-controls="collapsePage">
                <i class="fas fa-fw fa-folder"></i>
                <span>Sayfalar</span>
            </a>
            <div id="collapsePage" class="collapse @if(Request::segment(2)=="sayfalar") show @endif"
                 aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sayfa İşlemleri:</h6>
                    <a class="collapse-item @if(Request::segment(2)=="sayfalar" and !Request::segment(3)) active @endif"
                       href="{{route('admin.page.index')}}">Tüm Sayfalar</a>
                    <a class="collapse-item @if(Request::segment(2)=="sayfalar" and Request::segment(3)=="olustur") active @endif"
                       href="{{route('admin.page.create')}}">Sayfa Oluştur</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">Site Ayarları</div>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.config.index')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Ayarlar</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!--form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form-->

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="{{asset('back')}}/#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                <!--li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="{{asset('back')}}/#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>

                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>

                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="{{asset('back')}}/#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="{{asset('back')}}/#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="{{asset('back')}}/#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="{{asset('back')}}/#">Show All
                                Alerts</a>
                        </div>
                    </li-->

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="{{asset('back')}}/#" id="messagesDropdown"
                           role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>

                            <span class="badge badge-danger badge-counter">{{$emails->count()}}</span>
                        </a>

                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header text-center">
                                @if($emails->count() > 0)
                                    Okunmayan Mesajlar
                                @else
                                    Tüm Mesajlar Okundu
                                @endif
                            </h6>

                            @foreach($emails as $email)
                                <a class="dropdown-item d-flex align-items-center"
                                   href="{{route('admin.contact.read', $email->id)}}">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">
                                            {{\Illuminate\Support\Str::limit($email->message, 10)}}
                                        </div>
                                        <div class="small text-gray-500">{{$email->email}}
                                            · {{$email->created_at->diffForHumans()}}</div>
                                    </div>
                                </a>
                            @endforeach
                            <a class="dropdown-item text-center small text-gray-500"
                               href="{{route('admin.contact.index')}}">Tüm Mesajları Gör</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="{{asset('back')}}/#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 small">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset('back')}}/img/undraw_profile.svg">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            @if(\Illuminate\Support\Facades\Auth::user()->authority == 1)
                                <a class="dropdown-item" href="{{route('admin.user.index')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Kullanıcılar
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{route('admin.admin.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Senin Ayarların
                            </a>
                            <a class="dropdown-item" href="{{route('admin.logout')}}" data-toggle="modal"
                               data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıkış
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                    <a href="{{route('homepage')}}" target="_blank"
                       class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-globe fa-sm text-white-50"></i> Siteyi Görüntüle
                    </a>
                </div>
