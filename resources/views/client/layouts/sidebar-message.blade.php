<!-- BEGIN SIDEBAR -->
<div class="page-sidebar mini" id="main-menu" data-inner-menu="1">
    <!-- BEGIN MINI-PROFILE -->

    <div class="page-sidebar-wrapper" id="main-menu-wrapper" data-inner-menu="1">
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
                    <span class=" badge badge-disable pull-right ">2</span>
                </a>
            </li>
            <li class="{{ route('client.booking') }}">
                <a href="">
                    <i class="fa fa-music"></i>
                    <span class="title">Bookings</span>
                </a>
            </li>
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

<div class="inner-menu nav-collapse ">
    <div class="inner-wrapper">
        <a href="{{ action("client\MessageController@create") }}" class="btn btn-block btn-primary"><span class="bold">COMPOSE</span></a>

    </div>
    <div class="inner-menu-content">
        <p class="menu-title">FOLDER <span class="pull-right"><i class="icon-refresh"></i></span></p>
    </div>
    <ul class="big-items message-tab">
        <li><span class="badge badge-important">{{ count(App\Models\Message::where('to', Auth::user()->email)->where('owner', 1)->where('trashed', 0)->where('checked', 0)->get()) }}</span><a href="{{ action("client\MessageController@index") }}"> Inbox</a></li>
        <li><a href="{{ action("client\MessageController@sent") }}">Sent</a></li>
        {{-- <li><a href="{{ action("client\MessageController@draft") }}">Draft</a></li> --}}
        <li><span class="badge badge-important">{{ count(App\Models\Message::where('trashed', 1)->where('owner', 0)
            ->Where(function($query){
                $query->Where('to', Auth::user()->email)
                    ->orWhere('from', Auth::user()->email);
            })->get()) }}</span><a href="{{ action("client\MessageController@trash") }}">Trash</a></li>
    </ul>
</div>
<!-- END SIDEBAR -->