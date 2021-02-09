<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <title>.: TOP MUSIC EVENTS :. ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content>
    <meta name="author" content>
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link type="text/css" href="{{ asset('adminn/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" media="screen">
    <link type="text/css" href="{{ asset('adminn/assets/plugins/boostrapv3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('adminn/assets/plugins/boostrapv3/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('adminn/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('adminn/assets/css/animate.min.css') }}" rel="stylesheet">
    <!-- END CORE CSS FRAMEWORK -->
    <!-- BEGIN CSS TEMPLATE -->
    <link type="text/css" href="{{ asset('adminn/assets/css/style.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('adminn/assets/css/responsive.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('adminn/assets/css/custom-icon-set.css') }}" rel="stylesheet">
    <!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="error-body no-top">
    <div class="container">
        <div class="row login-container column-seperation">
            <div class="col-md-5 col-md-offset-1">
                <img src="{{ asset('adminn/img/logo.jpg')}}">
                <br><br>
                <h2>Sign in to Admin Section</h2>
                <p>Website control panel and conetent management system
                    <br>Web development in progress...
                </p>
                <br>
            </div>
            <div class="col-md-5 "> <br>
                <form class="login-form" id="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Username</label>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" type="email" value="{{ old('email') }}"
                                        autocomplete="email" autofocu>
                                    @error('email')
                                    <span class="error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label class="form-label">Password</label>
                            <span class="help"></span>
                            <div class="controls">
                                <div class="input-with-icon  right">
                                    <i class=""></i>
                                    <input class="form-control @error('password') is-invalid @enderror" id="password"
                                        name="password" type="password" autocomplete="current-password">
                                    @error('password')
                                    <span class="error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group  col-md-10">
                            <div class="checkbox checkbox check-success"> <a href="#">Trouble login in?</a>&nbsp;&nbsp;
                                <input id="remember" type="checkbox" value="1" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Keep me reminded </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <button class="btn btn-primary btn-cons pull-right" type="submit">{{ __('Login') }}</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN CORE JS FRAMEWORK-->
    <script src="{{ asset('adminn/assets/plugins/jquery-1.8.3.min.') }}" type="text/javascript"></script>
    <script src="{{ asset('adminn/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('adminn/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('adminn/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('adminn/assets/js/login.js') }}" type="text/javascript"></script>
    <!-- BEGIN CORE TEMPLATE JS -->
    <!-- END CORE TEMPLATE JS -->
</body>

</html>
