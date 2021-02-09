@extends('layouts.app')
@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="top_section6">
    <div class="row" style="margin:0">
        <div class="col-md-12 top_box">
            <h1>ASK FOR A QUOTE</h1>
        </div>
    </div>
</div>
<div class="top_section22">
</div>
<div class="container">
    <form action="{{ route('sendquote') }}" method="POST">
        @csrf
        <h2 class="quote_head center">Fill the form below and receive quotes from available artists who are
            available at your provided date.<br />
            Our friendly team will help you to find the most suitable acts for your event.</h2>
        <div class="row">
            <div class="col-md-12 center">
                <select class="pay_input" name="event">
                    <option style="display: none" value="">Select Your Event Type</option>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
                <br />
                @error('event')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span><br />
                @enderror
                <select class="pay_input" name="act">
                    <option style="display: none" value="">Select Your Act Type</option>
                    @foreach ($acts as $act)
                    <option value="{{ $act->id }}">{{ $act->name }}</option>
                    @endforeach
                </select>
                <br />
                @error('act')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
                <select class="pay_input" name="location">
                    <option style="display: none" value="">Select Your Location</option>
                    @foreach ($countries as $country)
                    <optgroup label="{{ $country->name }}">
                        @foreach ($country->location as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
                <br />
                @error('location')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
                <div class="input-group date pay_input" id="eventdatetimepicker" data-target-input="nearest">
                    <input type="text" name="eventdate" placeholder="Event Date" class="form-control datetimepicker-input" data-target="#eventdatetimepicker" />
                    <div class="input-group-append" data-target="#eventdatetimepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function() {
                        $('#eventdatetimepicker').datetimepicker();
                    });

                </script>
                @error('eventdate')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
                <textarea class="pay_input" type="text" placeholder="Your Requirements & Comments" style="min-height:280px" name="content"></textarea>
                @error('content')
                <br />
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
                <h2 class="quote_head center">Please provide your contact details:</h2>
                <input class="pay_input" type="text" placeholder="Your Name" name="name" />
                <br />
                @error('name')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
                <input class="pay_input" type="text" placeholder="Your Telephone" name="tel" />
                <br />
                @error('tel')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
                <input class="pay_input" type="email" placeholder="Your E-mail Address" name="email" />
                <br />
                @error('email')
                <span class="error">
                    <strong>{{ $message }}</strong>
                </span>
                <br />
                @enderror
            </div>
        </div>
        <div class="pay_now">
            <button class="my_but4" type="submit">SUBMIT YOUR QUOTE</button>
        </div>
    </form>
</div>
@include('layouts.bottom')
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js">
</script>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('css/music2.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" />
<style>
    .date {
        padding: 0;
        border: none;
    }

    .invalid-feedback {
        display: initial;
    }

</style>
@endsection
