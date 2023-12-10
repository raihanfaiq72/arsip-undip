<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('')}}/Assets/Admin/images/favicon.ico" type="image/ico" />

    <title>{{$title}}</title>

    <!-- Bootstrap -->
    <link href="/Assets/Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/Assets/Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/Assets/Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/Assets/Admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/Assets/Admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/Assets/Admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="/Assets/Admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/Assets/Admin/build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->

    <link href="{{url('')}}/Assets/Admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{url('')}}/Assets/Admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
        rel="stylesheet">
    <link href="{{url('')}}/Assets/Admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
        rel="stylesheet">
    <link href="{{url('')}}/Assets/Admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
        rel="stylesheet">
    <link href="{{url('')}}/Assets/Admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
        rel="stylesheet">

    <!-----------------------------------------------------------
-- animate.min.css by Daniel Eden (https://animate.style)
-- is required for the animation of notifications and slide out panels
-- you can ignore this step if you already have this file in your project
--------------------------------------------------------------------------->

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" /> -->
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        @if(session()->get('role') == 1)
                        <a href="{{url('ketua/dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Arsip
                                Surat</span></a>
                        @elseif(session()->get('role') == 2)
                        <a href="{{url('sekretaris/dashboard')}}" class="site_title"><i class="fa fa-paw"></i>
                            <span>Arsip Surat</span></a>
                        @elseif(session()->get('role') == 3)
                        <a href="{{url('anggota/dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Arsip
                                Surat</span></a>
                        @endif
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="https://humas.jatengprov.go.id/foto/1622767670852-Logo%20Provinsi%20Jawa%20Tengah%20(PNG-1080p)%20-%20FileVector69.png"
                                alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{session()->get('nama_lengkap')}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>
                                @if(session()->get('role') == 1)
                                ketua
                                @elseif(session()->get('role') == 2)
                                Sekretaris
                                @elseif(session()->get('role') == 3)
                                Anggota
                                @endif
                            </h3>
                            @if(session()->get('role')==3)
                            <ul class="nav side-menu">
                                <li><a href="{{url('anggota/rev-dashboard')}}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="{{url('anggota/rev-ajukan-surat')}}/create"><i class="fa fa-edit"></i> Ajukan
                                        Surat
                                    </a>
                                </li>
                                <li><a href="{{url('anggota/rev-ajukan-surat')}}"><i class="fa fa-desktop"></i> Info Surat
                                    </a>
                                </li>
                                <li><a href="{{url('anggota/rev-template-surat')}}"><i class="fa fa-desktop"></i> Template
                                        Surat
                                    </a>
                                </li>
                                <!-- <li><a href="{{url('anggota/surat-ditolak')}}"><i class="fa fa-bug"></i> Surat Ditolak
                                    </a> -->
                                <li>
                                    <a href="{{url('logout')}}"><i class="fa fa-key"></i> Logout </a>
                                </li>
                            </ul>
                            @elseif(session()->get('role')==2)
                            <ul class="nav side-menu">
                                <li><a href="{{url('sekretaris/rev-dashboard')}}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="{{url('sekretaris/rev-surat-masuk')}}"><i class="fa fa-edit"></i> Surat Masuk
                                    </a>
                                </li>
                                <!-- <li><a href="{{url('sekretaris/rev-pengajuan-surat')}}"><i class="fa fa-desktop"></i> Pengajuan
                                    </a>
                                </li> -->
                                <li><a href="{{url('sekretaris/rev-template-surat')}}"><i class="fa fa-desktop"></i>
                                        Template Surat
                                    </a>
                                </li>
                                <li><a href="{{url('sekretaris/rev-status-surat')}}"><i class="fa fa-desktop"></i>
                                        Status Surat
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('logout')}}"><i class="fa fa-key"></i> Logout </a>
                                </li>
                            </ul>
                            @elseif(session()->get('role')==1)
                            <ul class="nav side-menu">
                                <li><a href="{{url('ketua/dashboard')}}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="{{url('ketua/ajukan-masuk')}}"><i class="fa fa-edit"></i> Surat Masuk
                                    </a>
                                </li>
                                <li><a href="{{url('ketua/surat-all')}}"><i class="fa fa-desktop"></i> Pengajuan
                                    </a>
                                </li>
                                <li><a href="{{url('ketua/template-surat')}}"><i class="fa fa-desktop"></i> Template masuk
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('logout')}}"><i class="fa fa-key"></i> Logout </a>
                                </li>
                            </ul>
                            @endif
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="https://humas.jatengprov.go.id/foto/1622767670852-Logo%20Provinsi%20Jawa%20Tengah%20(PNG-1080p)%20-%20FileVector69.png"
                                        alt="">{{session()->get('nama_lengkap')}}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>

                            
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            @yield('content')

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('')}}/Assets/Admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{url('')}}/Assets/Admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('')}}/Assets/Admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{url('')}}/Assets/Admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{url('')}}/Assets/Admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="{{url('')}}/Assets/Admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{url('')}}/Assets/Admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="{{url('')}}/Assets/Admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="{{url('')}}/Assets/Admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{url('')}}/Assets/Admin/vendors/Flot/jquery.flot.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{url('')}}/Assets/Admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{url('')}}/Assets/Admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="{{url('')}}/Assets/Admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{url('')}}/Assets/Admin/vendors/moment/min/moment.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('')}}/Assets/Admin/build/js/custom.min.js"></script>

    <!-- datatables -->
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{url('')}}/Assets/Admin/vendors/pdfmake/build/vfs_fonts.js"></script>

</body>

</html>
