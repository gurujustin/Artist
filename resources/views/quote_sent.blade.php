@extends('layouts.app')
@section('content')
    <div class="top_section6">
        <div class="row" style="margin:0">
            <div class="col-md-12 top_box">
                <h1>YOUR QUOTE HAS BEEN SUCCESSFULLY SENT</h1>
            </div>
        </div>
    </div>
    <div class="top_section22">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center">
                <br />
                <img src="img/quote_success.jpg" />
                <br />
                <p>You will receive our quotes by e-mail shortly.<br>
                    Our team will work hard to provide you with the best matches we can offer.<br>
                    If you need any further assistance please contact our office by email or telephone.</p>
            </div>
        </div>
        <div class="pay_now"><a href="index.html"><button class="my_but4">CONTINUE</button></a></div>
    </div>
    @include('layouts.bottom')
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/music2.css') }}">
@endsection
