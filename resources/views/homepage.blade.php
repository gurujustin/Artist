@extends('layouts.app')
@section('content')
    <main role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="top_section">
            <div class="row" style="margin:0">
                <div class="col-md-12 top_box">
                    <h1>Find & Hire<br>Bands DJS AND MUSICIANS<br>FOR YOUR EVENTS</h1>
                    <h5><em>We Cover Party Weddings and Coorporate</em></h5>
                </div>
            </div>
        </div>
        <div class="top_section2">
            <h4>THE UK’S MOST FAVORITE MUSICIAN AGENCY</h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="center">Welcome to<br />TOP MUSIC EVENTS</h2>
                    <br />
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.
                    </p>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.
                    </p>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.
                    </p>
                </div>
                <div class="col-md-6 center">
                    <br /><br />
                    <img src="{{ asset('img/trustpilot.jpg') }}" />
                    <br />
                    <div class="my_box">
                        <div class="my_box_head">QUICK SEARCH</div>
                        <form class="search_form">
                            <select class="my_select">
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                            <select class="my_select">
                                <option value="">Select</option>
                                @foreach ($countries as $country)
                                    <optgroup label="{{ $country->name }}">
                                        @foreach ($country->location as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <select class="my_select">
                                <option>Event Date</option>
                            </select>
                            <select class="my_select">
                                <option>Event Type</option>
                            </select>
                            <select class="my_select">
                                <option>Any Keywords</option>
                            </select>
                            <button class="my_but">FIND NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt20 mb20">
            <div class="row">
                <div class="col-md-7">
                    <img src="{{ asset('img/artists.jpg') }}" />
                </div>
                <div class="col-md-5 features">
                    <h2>WHY CHOOSE US?</h2>
                    <ul class="feature_list">
                        <li> We are expert entertainment agents</li>
                        <li> Convenient opening hours: 10am to 10pm, 7 days a week</li>
                        <li> Find a band from a wide range of genres whose style suits your event</li>
                        <li> Hire a band to suit your budget</li>
                        <li> We have strong relationships with professional musicians, bands and performers</li>
                        <li> We get to know you so we can help you find a band to match your event</li>
                        <li> Our friendly staff are specialists in music and event planning</li>
                        <li> A trusted entertainment agency offers protection that gives you peace of mind</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt20 mb20 gray_box">
            <div class="container">
                <h3 class="center">EVENT CATEGORIES</h3>
                <div class="row mt20 mb20 categories">
                    <div class="col-md-3 center"><img src="{{ asset('img/cat1.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat2.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat3.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat4.jpg') }}" /></div>
                </div>
                <div class="row mt20 mb20 categories">
                    <div class="col-md-3 center"><img src="{{ asset('img/cat5.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat6.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat7.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat8.jpg') }}" /></div>
                </div>
                <div class="row mt20 mb20 categories">
                    <div class="col-md-3 center"><img src="{{ asset('img/cat9.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat10.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat11.jpg') }}" /></div>
                    <div class="col-md-3 center"><img src="{{ asset('img/cat12.jpg') }}" /></div>
                </div>
            </div>
        </div>
        <div class="container mt20 mb20">

            <br>
            <h3 class="center">TOP ACTS</h3>
            <br>

            <div class="row top_acts center mt20">
                <div class="col-md-2 center"><img src="{{ asset('img/act1.jpg') }}" />
                    <h4>BLUE VEGANCE</h4><button class="my_but2">View Details</button>
                </div>
                <div class="col-md-2 center"><img src="{{ asset('img/act2.jpg') }}" />
                    <h4>NME100</h4><button class="my_but2">View Details</button>
                </div>
                <div class="col-md-2 center"><img src="{{ asset('img/act3.jpg') }}" />
                    <h4>GOLDEN STRINGS</h4><button class="my_but2">View Details</button>
                </div>
                <div class="col-md-2 center"><img src="{{ asset('img/act4.jpg') }}" />
                    <h4>MAYA</h4><button class="my_but2">View Details</button>
                </div>
                <div class="col-md-2 center"><img src="{{ asset('img/act5.jpg') }}" />
                    <h4>RAY LEOTEN</h4><button class="my_but2">View Details</button>
                </div>
                <div class="col-md-2 center"><img src="{{ asset('img/act6.jpg') }}" />
                    <h4>MARK McDEAN</h4><button class="my_but2">View Details</button>
                </div>
            </div>
            <br>
            <div class="ro mb20">
                <div class="col-md12 center"><img src="{{ asset('img/navigation.jpg') }}" /></div>
            </div>
            <div class="row mb20">
                <div class="col-md12 center"><button class="my_but">EXPLORE MORE</button></div>
            </div>

        </div>
        <div class="testi_box center">
            <div class="container center">
                <h1 class="testi_head">What Our Clients Say</h1>

                <!-- SLIDER START -->

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="testimonial center">
                                “Im Impressed with TOP MUSIC EVENTS agency. They are very professional and have plenty
                                to offer. Whatever your event type or size is just try to use TOP MUSIC EVENTS and you
                                wont be disappointed. Great service and affordalbe pricing. You can select the desired
                                style or musician that will suite your upcoming event”
                                <br><br>
                                <p class="user">Sabina from Selmart</p>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="testimonial center">
                                “Im Impressed with TOP MUSIC EVENTS agency. They are very professional and have plenty
                                to offer. Whatever your event type or size is just try to use TOP MUSIC EVENTS and you
                                wont be disappointed. Great service and affordalbe pricing. You can select the desired
                                style or musician that will suite your upcoming event”
                                <br><br>
                                <p class="user">Sabina from Selmart</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            < <div class="testimonial center">
                                “Im Impressed with TOP MUSIC EVENTS agency. They are very professional and have plenty
                                to offer. Whatever your event type or size is just try to use TOP MUSIC EVENTS and you
                                wont be disappointed. Great service and affordalbe pricing. You can select the desired
                                style or musician that will suite your upcoming event”
                                <br><br>
                                <p class="user">Sabina from Selmart</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- SLIDER END -->
        </div>
        </div>
        <br>
        
        <div class="container mt20 mb20 center">

            <br>
            <h3 class="center sep">LATEST NEWS</h3>
            <br>

            <p class="bigger">Stay in touch with latest trends, updates and developments in music world.<br>
                Find out more about our new features and special offers we have ready for you.</p>
            <br>

            <div class="row news center mt20">
                <div class="col-md-4 center"><img src="{{ asset('img/news1.jpg') }}" /></div>
                <div class="col-md-4 center"><img src="{{ asset('img/news2.jpg') }}" /></div>
                <div class="col-md-4 center"><img src="{{ asset('img/news3.jpg') }}" /></div>
            </div>

        </div> <br>
        @include('layouts.bottom')
        
    </main>
@endsection
@section('scripts')
{{-- <script src="js/jquery.min.js"></script>
<script src="js/simpler-sidebar.min.js"></script> --}}
<script>
    /* $("#sidebar-left").simplerSidebar({
align:"left",// default: 'right'
selectors: {
trigger:"#toggle-sidebar-left",
quitter:".quit-sidebar-left"
}
mask: {
display:true,
css: {
  backgroundColor:"black",
  opacity: 0.5,
  filter:"Alpha(opacity=50)"
}
}
animation: {
duration: 500,
easing:"swing"
}
sidebar: {
width: 300,
}
});*/
    /*
    $("#sidebar-left").simplerSidebar({
      align: "left", // default: 'right'
      selectors: {
        trigger: "#toggle-sidebar-left",
        quitter: ".quit-sidebar-left"
      }
    });*/

</script>
@endsection
@section('styles')
<link rel="stylesheet" href="css/music.css">
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    .appbar {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        height: 56px;
        display: flex;
        align-content: space-between;
        background-color: lightseagreen;
        align-items: center;
        line-height: 0;
        padding: 0 4px;
        color: #212121;
        display: none;
    }
    .appbar-item.appbar-menu-icon {
        padding: 8px;
        cursor: pointer;
    }
    .appbar-item.appbar-title {
        margin-left: 8px;
    }
    .appbar-item.appbar-title h6 {
        font-size: inherit;
        font-weight: normal;
    }
    .appbar-offset {
        display: block;
        height: 56px;
    }
    .sidebar {
        background-color: blueviolet;
    }
    .sidebar-wrapper {
        overflow-y: auto;
        padding: 0 8px;
    }
</style>
@endsection