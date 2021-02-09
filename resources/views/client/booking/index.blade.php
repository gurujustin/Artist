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
            <h3>Bookings</h3>
        </div>
        <!-- ID CONTAINER -->

        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="col-md-12" style="height: 70px">
                        <div class="input-append success date col-md-2 col-xs-4">
                            <input type="text" class="form-control" name="fdate" id="from" placeholder="Date From">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div>    
                        <div class="col-md-1 col-xs-2"></div>
                        <div class="input-append success date col-md-2 col-xs-4">
                            <input type="text" class="form-control" name="edate" id="to" placeholder="Date To">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div>
                        <div class="col-md-1 col-xs-2"></div>
                        <div class="col-md-1 col-xs-6">
                            <button onclick="filter1();" class="btn btn-success">Filter</button>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button
                                    class="btn btn-medium btn-white btn-demo-space">Payment Status</button>
                                <button
                                    class="btn btn-medium btn-white dropdown-toggle btn-demo-space"
                                    data-toggle="dropdown"> <span class="caret"></span> </button>
                                <ul class="dropdown-menu">

                                    <li><a onclick="filter(1);">Outstanding</a></li>
                                    <li><a onclick="filter(2);">Paid</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Our <span class="semi-bold">Bookings</span>
                            </h4>
                        </div>

                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>Booking Number</th>
                                            <th>Event Type</th>
                                            <th>Location</th>
                                            <th>Booking Date / Time</th>
                                            <th>Artist</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Amount</th>
                                            <th class="all" style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                        <tr class="odd">
                                            <td>{{$booking->booking_number}}</td>
                                            <td>{{$booking->event->name}}</td>
                                            <td>{{$booking->pricelocation->location->name}}</td>
                                            <td>{{$booking->datetime}}</td>
                                            <td>{{$booking->pricelocation->artist->fullname}}</td>
                                            <td style=" text-align: center">
                                                @if ($booking->status_id == 1)
                                                    <span class="badge badge-warning"> 
                                                @else
                                                    <span class="badge badge-success"> 
                                                @endif
                                                {{$booking->status->name3}}</span>
                                            </td>
                                            <td style="text-align: center">{{$booking->amount}}</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="{{ route('client.booking.view', ['id'=>$booking->id]) }}">View Booking</a></li>
                                                        <li><a href="{{ route('artists.detail', ['artist'=>$booking->pricelocation->artist->user->id, 'profileid'=>$booking->pricelocation->artist->id]) }}" target="_blank">View Artist</a></li>
                                                        <li><a href="{{ route('client.booking.contactcustomer', ['id'=>$booking->id]) }}">Contact Customer</a></li>
                                                        <li><a href="{{ route('client.booking.delete', ['id'=>$booking->id])}}">Remove Booking</a></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <!-- END OF MY TABLE -->
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

@endsection
@section('scripts')
    @if ($msg = Session::get('success'))
        <script>
            $(document).ready(function () {
                Messenger().post({
                    message: "{{$msg}}",
                    type: 'success',
                    showCloseButton: true
                });
            });
        </script>
    @endif
    <script src="{{asset('adminn/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script>
    $('.input-append.date').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    function filter(id) {
        $('.grid-body').load("booking/filter1/"+id);
    }
    function filter1() {
        var from = $('#from').val();
        var to = $('#to').val();
        if (from == '' && to == '') {
            return;
        }
        $('.grid-body').load("booking/filter2?from="+from+'&to='+to);
    }
    </script>
@endsection
