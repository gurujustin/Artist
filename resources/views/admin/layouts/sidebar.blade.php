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
                <a href="{{ route('admin') }}">
                    <i class="icon-custom-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title"> Our Artists</span>
                    <span class="arrow "></span> </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('artists.index') }}">All Clients</a> </li>
                    <li><a href="{{ route('artists.create') }}">Add New Client</a> </li>
                    <li><a href="{{ route('allprofiles') }}">All Artists</a></li>
                    <li><a href="{{ route('createprofile') }}">Add New Artist</a> </li>
                    <li><a href="{{ route('topprofiles') }}">Top Artists</a> </li>
                    <li><a href="{{ route('pendingprofiles') }}">Blocked Artists</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('email') }}">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Messages</span>
                    <span class=" badge badge-disable pull-right ">
                        {{ count(\App\Models\Message::where('to', Auth::user()->email)->where('owner', 0)->where('checked', 0)->where('trashed', 0)->get()) }}
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('booking') }}">
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
                <a href="{{ route('events.index') }}">
                    <i class="fa fa-tags"></i>
                    <span class="title">Event Types</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('locations.index') }}">
                    <i class="fa fa-location-arrow"></i>
                    <span class="title">Event Locations</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span class="title">Act Types</span><span class="arrow "></span> 
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('maincategories.index') }}">Main Category</a>
                    </li>
                    <li>
                        <a href="{{ route('acttypes.index') }}">Sub Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span class="title">Web Pages</span> <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('pages.index') }}">All Pages </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.create') }}">Add New Page </a>
                    </li>
                    <li>
                        <a href="{{ route('menu') }}">Menu Controller </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{route('calendar.index')}}">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">Calendar</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-comments"></i>
                    <span class="title">Latest News</span> <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('blog.index')}}">All Blogs </a>
                    </li>
                    <li>
                        <a href="{{route('blog.create')}}">Add New Blog </a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}">All Categories </a>
                    </li>
                    <li>
                        <a href="{{route('category.create')}}">Add New Category </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('setting') }}">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Settings</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('support.index') }}">
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
