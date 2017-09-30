<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    {{ Html::style('css/akademik.css') }}
    {{ Html::style('css/pace-theme-flash.css') }}

</head>
<body>

<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Sistem Akademik
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="#" class="nav-item-link">
                        <span class="nav-item-icon"><i class="fa fa-list-alt"></i></span>
                        <span class="nav-item-title">Kehadiran</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Faisal <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main -->
<div class="container" id="app-main" sty>
    <div class="clearfix-top"></div>

    <index></index>

    <div class="clearfix-bottom"></div>
    <!-- /.Main -->
</div>

<footer class="hidden-xs  navbar-fixed-bottom">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="#">
                    <i class="fa fa-desktop"></i>
                    <small>Home</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.index') }}">
                    <i class="fa fa-graduation-cap"></i>
                    <small>Siswa</small>
                    {{--<span class="label label-danger">3</span>--}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <small>Pegawai</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <small>Mapel</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kelas.index') }}">
                    <i class="fa fa-university"></i>
                    <small>Kelas</small>
                    {{--<span class="label label-danger">3</span>--}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-university"></i>
                    <small>Kehadiran</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tahun-ajaran.index') }}">
                    <i class="fa fa-university"></i>
                    <small>Tahun Ajaran</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-university"></i>
                    <small>Extrakulikuler</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-university"></i>
                    <small>Sarana</small>
                    <span class="label label-danger">3</span>
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="active">
                    <i class="fa fa-gear"></i>
                    <small>Setting</small>
                </a>
            </li>
        </ul>
    </div>
</footer>

<section class="text-slider navbar-fixed-bottom">
    <marquee><small class="danger">Pengumumna</small></marquee>
</section>

{{--<div class="loading-backdrop in"></div>--}}
@stack('js')
</body>
</html>
