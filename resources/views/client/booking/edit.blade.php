@extends('client.layouts.app')
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
                <h3>View Booking </h3>
                <a type="button" class="btn btn-success pull-right" href="{{ route('client.booking') }}">Back</a>
            </div>
            <!-- ID CONTAINER -->
            <div id="container">
                <form action="" method="POST">
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
                                                <select name="event_type" id="event_type" class="form-control"
                                                    tabindex="-1" readonly>
                                                    @foreach ($eventtypes as $eventtype)
                                                        <option value="{{ $eventtype->id }}" @if ($booking->event->id == $eventtype->id)
                                                            {{ 'selected' }}
                                                    @endif>{{ $eventtype->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('event_type')
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
                                                    tabindex="-1" readonly>
                                                    @foreach ($booking->pricelocation->artist->pricelocation as $item)
                                                        <option value="{{ $item->id }}" @if ($item->id == $booking->price_location_id)
                                                            {{ 'selected' }}
                                                    @endif>{{ $item->location->name }}</option>
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
                                                @foreach ($booking->pricelocation->artist->priceaddon as $item)
                                                <div class="row-fluid">
                                                    <div class="checkbox check-success 	">
                                                        <input id="checkbox{{$item->id}}}" type="checkbox" value="{{ $item->id }}" name="add_on[]" disabled>
                                                        <label for="checkbox{{$item->id}}}">{{ $item->type }} : + FROM £{{ $item->price }}</label>
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
                                                <input name="cname" id="cname" type="text"
                                                    value="{{ $booking->name }}" class="form-control" placeholder="NAME*" readonly>
                                            </div>
                                            @error('cname')
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
                                                    value="{{ $booking->email }}" class="form-control" placeholder="EMAIL*" readonly>
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
                                                    value="{{ $booking->tel }}" class="form-control" placeholder="TEL*" readonly>
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
                                                <textarea name="venue" id="venue" type="text" class="form-control" readonly>{{ $booking->venue }}</textarea>
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
                                                <textarea name="other" id="other" type="text" class="form-control" readonly>{{ $booking->other }}</textarea>
                                            </div>
                                            @error('other')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Booking Datetime</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="datetime" id="datetime" type="text" class="form-control" value="{{ $booking->datetime }}" readonly>
                                            </div>
                                            @error('datetime')
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
