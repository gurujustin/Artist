@extends('admin.layouts.app')
@section('title', 'Booking')
@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">
            <div class="page-title">
                <h3>Create Booking </h3>
                <a type="button" class="btn btn-success pull-right" href="{{ route('booking') }}">Back</a>
            </div>
            <!-- ID CONTAINER -->
            <div id="container">
                <form action="{{ route('booking.save') }}" method="POST">
                    @csrf
                    <!-- MY TABLE -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>
                                        <span class="semi-bold">Booking Details</span>
                                    </h4>
                                </div>
                                <div class="grid-body ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Event Type </label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <select name="event" id="event" class="form-control"
                                                    tabindex="-1">
                                                    @foreach ($events as $event)
                                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('event')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Location </label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <select name="location" id="location" class="form-control"
                                                    tabindex="-1">
                                                    @foreach ($artist->pricelocation as $item)
                                                    <option value="{{ $item->id }}">{{ $item->location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('location')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Extra </label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                @foreach ($artist->priceaddon as $item)
                                                <div class="row-fluid">
                                                    <div class="checkbox check-success 	">
                                                        <input id="checkbox{{$item->id}}" type="checkbox" value="{{ $item->id }}" name="add_on[]">
                                                        <label for="checkbox{{$item->id}}">{{ $item->type }} : + FROM £{{ $item->price }}</label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @error('add_on')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Name</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="name" id="name" type="text"
                                                     class="form-control" placeholder="NAME*">
                                            </div>
                                            @error('name')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">E-Mail</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="email" id="email" type="text"
                                                     class="form-control" placeholder="EMAIL*">
                                            </div>
                                            @error('email')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tel</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="tel" id="tel" type="text"
                                                     class="form-control" placeholder="TEL*">
                                            </div>
                                            @error('tel')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Venue</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <textarea name="venue" id="venue" type="text" class="form-control"></textarea>
                                            </div>
                                            @error('venue')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Other Details</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <textarea name="otherdetail" id="otherdetail" type="text" class="form-control"></textarea>
                                            </div>
                                            @error('otherdetail')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Booking Date</label>
                                            <div class="input-append success date col-md-12 no-padding">
                                                <input type="text" class="form-control" name="date">
                                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                                            @error('date')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Booking Time</label>
                                            <div class="input-append bootstrap-timepicker-component">
                                                <input type="text" class="timepicker-default span12" name="time">
                                                <span class="add-on"><span class="arrow"></span><i class="fa fa-clock-o"></i></span> </div>
                                            @error('time')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF MY TABLE -->
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-danger btn-cons pull-left">SUBMIT BOOKING</button>
                        </div>
                    </div>
                </form>
                <div class="MY LOCK" style="display:none">
                    <div id="chart"> </div>
                    <div id="world-map" style="height:405px"></div>
                    <div id="mini-chart-orders"></div>
                    <div id="mini-chart-other"></div>
                    <div id="ricksaw"></div>
                    <div id="legend"></div>
                    <canvas id="wind" width="32" height="32"></canvas>
                    <canvas id="rain" width="32" height="32"></canvas>
                    <canvas id="partly-cloudy-day" width="120" height="120"></canvas>
                </div>
            </div>
            <!-- END PAGE -->
        </div>
    </div>
    <!-- END CONTAINER -->
@endsection
@section('scripts')
<script src="{{asset('adminn/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('adminn/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script>
$('.input-append.date').datepicker({
    autoclose: true,
    todayHighlight: true
});
$('.timepicker-default').timepicker();
</script>
@endsection