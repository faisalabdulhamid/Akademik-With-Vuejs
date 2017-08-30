<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        {{ Html::style('css/akademik.css') }}

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
                                <li><a href="#">Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main -->
        <div class="container" id="app-main">
            <div class="clearfix-top"></div>

            <section class="panel panel-default">
                <aside class="panel-heading">
                    <h4 class="panel-title">Siswa</h4>
                </aside>
                <aside class="panel-heading">
                    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"  data-tgl="tooltip" data-placement="top" title="Tambah"><i class="fa fa-user-plus"></i> </a>
                    <button class="btn btn-default btn-sm btn-warning" data-tgl="tooltip" data-placement="top" title="Lihat"><i class="fa fa-search"></i> </button>
                    <button class="btn btn-default btn-sm btn-info" data-tgl="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-default btn-sm btn-danger"  data-tgl="tooltip" data-placement="top" title="Hapus"><i class="fa fa-user-times"></i> </button>

                    <div class="form-group form-group-sm pull-right">
                        <select class="form-control">
                            <option>10</option>
                            <option>30</option>
                            <option>50</option>
                            <option>all</option>
                        </select>
                    </div>

                </aside>
                <aside class="panel-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Faisal</td>
                            <td>10112671</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faisal</td>
                            <td>10112671</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faisal</td>
                            <td>10112671</td>
                        </tr>
                        </tbody>
                    </table>

                </aside>
                <aside class="panel-footer">
                    <ul class="pagination pagination-sm pull-right">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </aside>
            </section>

            <section class="penel panel-info">
                <aside class="panel-heading">HAHAH</aside>
            </section>

            <section class="control-panel">
                <div class="col-md-3">
                    <div class="box-item danger">
                        <i class="fa fa-users"></i>
                        <strong>Users</strong>
                        <small>60</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-item danger">
                        <i class="fa fa-users"></i>
                        <strong>Users</strong>
                        <small>60</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-item danger">
                        <i class="fa fa-users"></i>
                        <strong>Users</strong>
                        <small>60</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-item danger">
                        <i class="fa fa-users"></i>
                        <strong>Users</strong>
                        <small>60</small>
                    </div>
                </div>
            </section>

            <div class="clearfix-bottom hidden-lg"></div>
            <!-- /.Main -->

            <!-- Modal -->
            <section class="modal" tabindex="-1" role="dialog" id="myModal" data-backdrop="static" data-keyboard="false">
                <aside class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i><!-- &times; --></span></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nama
                                    </label>
                                    <div class="col-md-9">
                                        <input name="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nama
                                    </label>
                                    <div class="col-md-9">
                                        <input name="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="control-label col-md-3">
                                        Nama
                                    </label>
                                    <div class="col-md-9">
                                        <input name="" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </aside><!-- /.modal-dialog -->
            </section><!-- /.modal -->

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
                        <a href="#">
                            <i class="fa fa-graduation-cap"></i>
                            <small>Siswa</small>
                            <span class="label label-danger">3</span>
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
                        <a href="#">
                            <i class="fa fa-university"></i>
                            <small>Kelas</small>
                            <span class="label label-danger">3</span>
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
                        <a href="#">
                            <i class="fa fa-university"></i>
                            <small>Alumni</small>
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

        {{ Html::script('js/akademik.js') }}
        <script>
            $(function () {
                $('[data-tgl="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>
