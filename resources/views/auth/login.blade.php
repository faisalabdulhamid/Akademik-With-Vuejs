<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    {{ Html::style('css/login.css') }}
    {{ Html::style('css/pace-theme-flash.css') }}

</head>
<body>
    <div class="container">
        <div class="login" id="app-login">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-lg-6">
                    <h2>Sistem Akademik</h2>
                    <p>SMP - SMA Terpadu</p>
                    <hr class="hidden-xs">
                    <ul class="item-login hidden-xs">
                        <li>Managemnt Mapel <i class="fa fa-book"></i></li>
                        <li>Managemnt Siswa <i class="fa fa-graduation-cap"></i></li>
                        <li>Managemnt Guru <i class="fa fa-users"></i></li>
                    </ul>
                </div>
                <div class="col-md-6 col-xs-12 col-lg-6">
                    @if($errors->all())
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error !</strong>
                            @foreach($errors->all() as $e)
                                {{ $e }}
                            @endforeach
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <div :class="{ 'form-group': true, 'has-error': errors.has('username') }">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="text" class="form-control" name="username" v-model="username" placeholder="NIS / NIP / Email" v-validate="'required'" data-vv-delay="500">
                            </div>
                            <span v-show="errors.has('username')" class="help-block">@{{ errors.first('username') }}</span>
                        </div>
                        <div :class="{ 'form-group': true, 'has-error': errors.has('password') }">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password" v-model="password" v-validate="'required'" data-vv-delay="500">
                            </div>
                            <span v-show="errors.has('password')" class="help-block">@{{ errors.first('password') }}</span>
                        </div>
                        <div :class="{ 'form-group': true, 'has-error': errors.has('status') }">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select class="form-control" name="status" v-validate="'required'" data-vv-delay="500">
                                    <option value="guru">Guru</option>
                                    <option value="staff">Staff</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="ortu">Orang Tua</option>
                                </select>
                            </div>
                            <span v-show="errors.has('status')" class="help-block">@{{ errors.first('status') }}</span>
                        </div>
                        <input type="checkbox" name="remember"> Remember Me
                        <button class="btn btn-default pull-right">Login</button>
                        <div class="clearfix"></div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    {{ Html::script('js/login.js') }}
</body>
</html>