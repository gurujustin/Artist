<!DOCTYPE html>
<html lang="en">

<head>
    <title>.:TOP MUSIC EVENTS:. ARTIST DETAILS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/music2.css')}}">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="my_navbar fixed-top">
        <div class="row">
            <div class="col-md-4 top_left">
                <img src="{{asset('img/menu.png')}}" class="hover" />
            </div>
            <div class="col-md-4 top_middle">
                <img src="{{asset('img/logo.png')}}" class="hover" />
            </div>
            <div class="col-md-4 top_right">
                <img src="{{asset('img/search.png')}}" class="hover" /> &nbsp; &nbsp;
                <img src="{{asset('img/contact.png')}}" class="hover">
            </div>
        </div>
    </nav>
    <main role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <?php 
        $pageimage = '';
        if(App\Models\ArtistImage::where('type', 'pageimage')->where('artist_id', $id)->exists()){
            $pageimage = App\Models\ArtistImage::where('type', 'pageimage')->where('artist_id', $id)->first()->url;
        }
        ?>
        <div class="top_section3" style="background: url({{ asset('uploads').'/'.$pageimage }});background-size: cover;">
            <div class="row" style="margin:0">
                <div class="col-md-12 top_box">
                    <h1>{{ App\Models\Artist::find($id)->fullname }}</h1>
                    <h5>FROM £1250</h5>
                </div>
            </div>
        </div>
        <div class="top_section22">
        </div>
        <div class="black_box">
            <div class="container">
                <h2 class="video_head">WATCH<br />
                    <span class="f600">TOP ROCKBLAST</span></h2>
                <img class="hover" src="{{asset('img/youtube.jpg')}}" />
            </div>
        </div>
        <div class="soft_bg whole_box">
            <div class="container  mb20">
                <h2 class="listen_head">LISTEN TO<br />
                    <span class="f600">TOP ROCKBLAST BAND</span>
                </h2>
                <div class="mt20 mb20">
                    <div class="row my_inner">
                        <div class="col-md-6 tracks center">
                            @foreach(App\Models\Artist::find($id)->artistmusic as $music)
                            <a href="#" class="hover">
                                <img src="{{asset('img/player.png')}}" />{{ $music->title }}
                            </a>
                            <br /><br />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="player_box">
            <div class="row container center">
                <div class="col-md-4">
                    <img src="{{asset('img/player_slider1.jpg')}}" class="hover" />
                </div>
                <div class="col-md-4">
                    <img src="{{asset('img/player_but1.jpg')}}" class="hover" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{asset('img/player_but2.jpg')}}" class="hover" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{asset('img/player_but3.jpg')}}" class="hover" />
                </div>
                <div class="col-md-4">
                    <img src="{{asset('img/player_slider2.jpg')}}" class="hover" />
                </div>
            </div>
        </div>
        <div class="row container center">
            <div class="col-md-4 left my_pad">
                <h3 class="artist_head">TOP ROCKBLAST BAND<br>our features:</h3>
                <ul class="features_list">
                    <li> Vocals, Guitar, Keys, Sax, Double Bass, Drums</li>
                    <li> Highly experienced musicians</li>
                    <li> Merseyside based, available nationwide</li>
                    <li> Multi-genre repertoire</li>
                    <li> Acoustic folk pop band</li>
                    <li> 2x60 or 3x40 minute sets of live music</li>
                    <li> Happy to learn first dance and up to 5 requests</li>
                    <li> Option to add 60 minute roaming set</li>
                    <li> Option to add Jazz sets</li>
                    <li> High quality and fully PAT tested PA and lighting</li>
                    <li> Playlist DJ Service Included As Standard</li>
                    <li> Glowing references from many happy clients</li>
                </ul>
            </div>
            <div class="col-md-8 gray_bg left my_pad">
                <h3 class="artist_head">ABOUT<br>TOP ROCKBLAST BAND</h3>
                <div class="artist_about">
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
            </div>
        </div>
        <div class="black_box">
            <div class="container">
                <h2 class="video_head f600">BROWSE<br>OUR GALLERY</h2>
                <!-- SLIDER START -->
                <div id="carouselExampleIndicators" class="carousel slide my_gallery" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach(App\Models\ArtistImage::where('artist_id', $id)->where('type',
                        'galleryimage')->get() as $item)
                        <div class="carousel-item @if($loop->index == 0) {{ 'active' }} @endif">
                            <img src="{{asset('uploads').'/'.$item->url}}" />
                        </div>
                        @endforeach
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
            <div class="bg_box">
            </div>
            <?php 
            $repimage = '';
            if(App\Models\ArtistImage::where('type', 'repimage')->where('artist_id', $id)->exists()){
                $repimage = App\Models\ArtistImage::where('type', 'repimage')->where('artist_id', $id)->first()->url;
            }
            ?>
            <div class="songs_box"
                style="background-image:url({{ asset('uploads').'/'.$repimage }})">
                <h2 class="songs_head">The TOP ROCKBLAST BAND<br>Repertoire</h2>
                <div class="container">
                    <div class="row pb70">
                        <div class="col-md-4">
                            <ul class="song_cats">
                                @foreach(App\Models\Artist::find($id)->artistrepertorie as $item)
                                <li><a href="#">{{ $item->janre }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-8 song_list">
                            <h3 class="song_cat_head">HARD ROCK</h3>
                            <div class="row" style="text-align: left">
                                <div class="col-md-6">
                                    @foreach(App\Models\Artist::find($id)->artistrepertorie as $item)
                                    {!! json_decode(str_replace('\n', '<br />', $item->content)) !!}
                                    @endforeach
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking_box" id="add_bookings">
                <div class="container center">
                    <h2 class="booking_head"><span class="f600">The TOP ROCKBLAST BAND</span><br>ENQUIRY & BOOKING</h2>
                    <form action="{{ route('booking.save') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{asset('img/box1.png')}}" class="head_box" />
                                <div class="my_box2">
                                    <div class="my_box_head3">SELECT LOCATION</div>
                                    <div class="search_form left" action="" method="POST">
                                        {{-- LOCATION --}}
                                        <select class="my_select3" name="location" id="location">
                                            @foreach (App\Models\Artist::find($id)->pricelocation as $item)
                                            <option value="{{ $item->id }}">{{ $item->location->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- PRICE POLICY --}}
                                        <h4 class="booking_head2">PRICE FROM:
                                            <span class="bigger" id="price">
                                                {{-- {{$artist->pricelocation[0]->price}} --}}
                                                600
                                            </span>
                                        </h4>
                                        <p class="small_font">
                                            5 Piece Band: Male Lead Vocals and Keys, Male Lead Vocals and Guitar, Sax,
                                            Double Bass & Drums
                                        </p>
                                        <p class="small_font">
                                            Prices are based on a 5pm or later arrival and Mindnight finish, including
                                            2x60
                                            or
                                            3x40 minute
                                            sets of live performance. Approximately 75-90 minutes are required for the
                                            act
                                            to
                                            set up and sound check (depending on access to the performance area).
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <img src="{{asset('img/box2.png')}}" class="head_box" />
                                <div class="my_box2">
                                    <div class="my_box_head3">EXTRAS</div>
                                    <div class="search_form left">
                                        <p class="small_font">
                                            THIS ACT OFFERS ADD-ONS TO THEIR SET PACKAGE PRICE. IF YOU WOULD LIKE TO
                                            ENQUIRE
                                            ABOUT THESE OPTIONS PLEASE SELECT BELOW:
                                        </p>
                                        {{-- add ons --}}
                                        @foreach (App\Models\Artist::find($id)->priceaddon as $item)
                                        <div class="holder">
                                            <input type="checkbox" value="{{ $item->id }}" name="add_on[]"
                                                class="my_checkbox" />{{ $item->type }}<br>
                                            <span class="left_push f600">+ FROM £{{ $item->price }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src="{{asset('img/box3.png')}}" class="head_box" />
                                <div class="my_box2">
                                    <div class="my_box_head3">YOUR DETAILS</div>
                                    <div class="search_form left">
                                        <p class="small_font">
                                            PLEASE ENTER YOUR DETAILS BELOW SO WE CAN CONTACT YOU WITH FULL QUOTE:
                                        </p>
                                        <input class="my_input" type="input" placeholder="NAME*" name="name" />
                                        <br><br>
                                        <input class="my_input" type="input" placeholder="E-MAIL*" name="email" />
                                        <br><br>
                                        <input class="my_input" type="input" placeholder="TELEPHONE*" name="tel" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <img src="{{asset('img/box4.png')}}" class="head_box" />
                                <div class="my_box2">
                                    <div class="my_box_head3">BOOKING</div>
                                    <div class="search_form left">
                                        <p class="small_font">
                                            PLEASE ADD YOUR EVENT INFORMATION:
                                        </p>
                                        {{-- event type --}}
                                        <select class="my_select3" name="event">
                                            @foreach (App\Models\Event::all() as $event)
                                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                                            @endforeach
                                        </select>
                                        <textarea class="my_textarea" name="venue" placeholder="VENUE"></textarea>
                                        <script type="text/javascript"
                                            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
                                        </script>
                                        <script type="text/javascript"
                                            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js">
                                        </script>
                                        <script
                                            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"
                                            integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg=="
                                            crossorigin="anonymous"></script>
                                        <link rel="stylesheet"
                                            href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css"
                                            integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g=="
                                            crossorigin="anonymous" />
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input type="text" name="datetime" placeholder="EVENT DATE"
                                                class="form-control datetimepicker-input"
                                                data-target="#datetimepicker1" />
                                            <div class="input-group-append" data-target="#datetimepicker1"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                        </script>
                                        <textarea class="my_textarea" name="otherdetail"
                                            placeholder="OTHER DETAILS"></textarea>
                                        <div class="mt20 center">
                                            <button class="my_but5" type="submit">BOOK NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="my_divider">&nbsp;</div>
            <?php 
            $reviewimage = '';
            if(App\Models\ArtistImage::where('type', 'reviewimage')->where('artist_id', $id)->exists()){
                $reviewimage = App\Models\ArtistImage::where('type', 'reviewimage')->where('artist_id', $id)->first()->url;
            }
            ?>
            <div class="review_box" style="background-image:url({{ asset('uploads').'/'.$reviewimage }})">
                <h2 class="review_head">The TOP ROCKBLAST BAND<br>REVIEWS</h2>
                <div class="container">
                    
                    <div class="pb70 center">
                        <img src="{{asset('img/trustpilot.jpg')}}" class="trustp">
                    </div>
                    <div class="row">
                        <!-- SLIDER START -->
                        <div id="carouselExampleIndicators" class="carousel slide my_gallery" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                        <div class="col-md-4 review2">
                                            "The band were absolutely fabulous! They really made the night, they were
                                            great
                                            fun and people were dancing till the very end.
                                            Everyone commented on how brilliant they were and how much they'd enjoyed
                                            the
                                            music. 10 out of 10 would definitely recommend this band!"
                                            <p class="author">
                                                ANTONINA & CHRIS - WEDDING - BRIGHTON
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- SLIDER END -->
                    </div>
                </div>
            </div>
        </div>
        <div class="dark_box">
            <div class="bigger_txt white">Haven’t found what you are looking for?<br />
                Contact our team now for help and more information.</div>

            <div class="row">
                <div class="col-md12 center"><button class="my_but4">SEND US MESSAGE</button></div>
            </div>
        </div>
        <div class="site_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3>More Info:</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Wedding Events</a></li>
                            <li><a href="#">Corporate Events</a></li>
                            <li><a href="#">Paty Events</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Latest News</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3 class="hide">Hidden</h3>
                        <ul>
                            <li><a href="#">For Musicians</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Subscribe:</h3>
                        <div>
                            Subscribe to our newsletter to have access to the latest news, updates and offers.
                        </div>
                        <input class="subscribe" placeholder="Your e-mail address" />
                        <br />
                        <button class="my_but3">Subscribe Now</button>
                    </div>
                    <div class="col-md-3">
                        <h3>Contact Us:</h3>
                        <div>
                            <strong>Tel:</strong> 0780 9671 303<br>
                            <strong>E-mail:</strong> <a href="mailto:info@topmusicevents.uk">info@topmusicevents.uk</a>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6"><strong>Our Office:</strong>
                                    <br>
                                    92 Station Road<br>
                                    N3 2QJ London</div>
                                <div class="col-md-6"><img src="{{asset('img/logo.png')}}" style="width:115px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8 foot_left">
                    &copy;2020 Copyrights TOP MUSIC EVENTS | All Rights Reserved Worldwide | Powered by KS
                </div>
                <div class="col-md-4 foot_right">
                    FIND US: <img src="{{asset('img/soc.png')}}" />
                </div>
            </div>
    </footer>
    <script>
        $('#location').change(function () {
            var location = $('#location').val();
            $.ajax({
                url: "{{route('booking.changelocation')}}",
                type: 'POST',
                data: {'loc': location, "_token": '{{ csrf_token() }}'},
                success: function (data) {
                    $('#price').html(data);
                }
            });
        })
    </script>
</body>

</html>