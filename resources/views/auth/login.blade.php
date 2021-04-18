<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Tizimga Kirish</title>
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>

</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->

<!-- Start wrapper-->
<div id="wrapper">

    <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
    <div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
            <div class="card-content p-2">
                <div class="text-center">
                    <img src="{{ asset('assets/images/logo.png') }}" style="width:189px" alt="logo icon">
                </div>
                <div class="card-title text-uppercase text-center py-3"></div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {!! $error !!}
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <div class="position-relative has-icon-right">
                            <input type="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword" class="sr-only">Password</label>
                        <div class="position-relative has-icon-right">
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control">
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <div class="icheck-material-white">
                                <input type="checkbox" id="user-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label for="user-checkbox">Eslab qolish</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-light btn-block">Kirish</button>
                </form>
            </div>
        </div>

    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--start color switcher-->
    <!-- <div class="right-sidebar">
        <div class="switcher-icon">
            <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
        <div class="right-sidebar-content">

            <p class="mb-0">Gaussion Texture</p>
            <hr>

            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>

            <p class="mb-0">Gradient Background</p>
            <hr>

            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
            </ul>

        </div>
    </div> -->
    <!--end color switcher-->

</div><!--wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('asset/js/popper.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

<!-- sidebar-menu js -->
<script src="{{ asset('asset/js/sidebar-menu.js') }}"></script>

<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js') }}"></script>

</body>
</html>

