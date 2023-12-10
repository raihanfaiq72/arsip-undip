<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{url('')}}/Assets/Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('')}}/Assets/Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('')}}/Assets/Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('')}}/Assets/Admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('')}}/Assets/Admin/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{url('loginProses')}}" method="post">
                        @csrf
                        @if (session()->has('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{ session('sukses') }}
                        </div>
                        @elseif (session()->has('gagal'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('gagal') }}
                        </div>
                        @elseif (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <h1>Login</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                autocomplete="off" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                autocomplete="off" required="" />
                        </div>
                        <div>
                            <!-- <a class="btn btn-default submit" type="submit">Log in</a> -->
                            <button type="submit" class="btn btn-default submit">Log in</button>
                            <a class="reset_pass" href="{{url('forgot-password')}}">Lupa Password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Belum terdaftar?
                                <a href="#signup" class="to_register"> Daftar disini </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>Arsip Surat</h1>
                                <p>2023 All Rights Reserved Pemerintah Provinsi Jawa Tengah</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="{{url('registerProses')}}" method="post">
                        @csrf
                        <h1>Daftar</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nama Lengap" name="nama_lengkap" autocomplete="off" required="" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required="" />
                        </div>
                        <div>
                        <button type="submit" class="btn btn-default submit">Daftar</button>
                            <!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Sudah Terdaftar ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>Arsip Surat</h1>
                                <p>2023 All Rights Reserved Pemerintah Provinsi Jawa Tengah</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
