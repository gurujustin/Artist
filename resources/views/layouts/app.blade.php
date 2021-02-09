<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>.:TOP MUSIC EVENTS:. BETA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('styles')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')

    </script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>
    <script>
        $('.carousel').carousel();

    </script>
    @yield('scripts')
</head>

<body>
    <div class="sidebar" id="sidebar-left" style="display:none">
        <div class="sidebar-wrapper">
            SIDE MENU HERE
        </div>
    </div>
    <nav class="my_navbar fixed-top">
        <div class="row">
            <div class="col-md-4 top_left">
                <div class="appbar-item appbar-menu-icon" id="toggle-sidebar-left">
                    <img src="{{ asset('img/menu.png') }}" class="hover" />
                </div>
            </div>
            <div class="col-md-4 top_middle">
                <img src="{{ asset('img/logo.png') }}" class="hover" />
            </div>
            <div class="col-md-4 top_right">
                <img src="{{ asset('img/search.png') }}" class="hover" /> &nbsp; &nbsp;
                <img src="{{ asset('img/contact.png') }}" class="hover">
            </div>
        </div>
    </nav>

    <main role="main">
        @yield('content')
    </main>
    @include('layouts.footer')
</body>

</html>
