<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper">
        <div class="user-info-wrapper">
            <div class="profile-wrapper">
                <img src="{{ asset('adminn/img/avatar.jpg') }}" alt="" width="69" height="69" />
            </div>
            <div class="user-info">
                <div class="greeting">Welcome</div>
                <div class="username"> <span class="semi-bold">{{ Auth::user()->name }}</span></div>
                <div class="status">
                    Status
                    <a href="#">
                        <div class="status-icon green"></div>
                        Online
                    </a>
                </div>
            </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU -->
        <p class="menu-title">MAIN MENU<span class="pull-right"></span></p>
        <ul>
            <li class="start">
                <a href="{{ route('client') }}">
                    <i class="icon-custom-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Profiles</span>
                    <span class="arrow "></span> </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('client.profiles') }}">My Profiles</a></li>
                    <li><a href="{{ action('client\ProfileController@create') }}">Add New Profile</a> </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('client.email') }}">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Messages</span>
                    <span class=" badge badge-disable pull-right ">
                        {{ count(\App\Models\Message::where('to', Auth::user()->email)->where('owner', 0)->where('checked', 0)->where('trashed', 0)->get()) }}
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('client.booking') }}">
                    <i class="fa fa-music"></i>
                    <span class="title">Bookings</span>
                </a>
            </li>
            {{-- <li class="">
                <a href="{{ route('payment') }}">
            <i class="fa fa-gbp"></i>
            <span class="title">Payments</span>
            </a>
            </li> --}}
            <li class="">
                <a href="{{ route('client.calendar.index') }}">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">Calendar</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('client.support.index')}}">
                    <i class="fa fa-wheelchair"></i>
                    <span class="title">Support</span>
                </a>
            </li>
            <div class="clearfix"></div>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<a href="#" class="scrollup">Scroll</a>
<div class="footer-widget">
    <div class="pull-right">
        <a href="{{ route('logout') }}">
            <i class="fa fa-power-off"></i>
        </a>
    </div>
</div>
<!-- END SIDEBAR -->
