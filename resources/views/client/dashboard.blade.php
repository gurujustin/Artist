@extends('client.layouts.app')
@section('title', 'Dashboard')
@section('content')
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
            <h3>Dashboard </h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <div class="row spacing-bottom 2col">
                <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">
                    <div class="tiles blue added-margin">
                        <div class="tiles-body">
                            <div class="controller">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                            <div class="tiles-title"> NEW PROFILES</div>
                            <div class="heading">
                                <span class="animate-number"
                                    data-value="{{App\Models\Artist::where('created_at', '>=', date('Y-m-d'))->where('user_id', $user->id)->count()}}"
                                    data-animation-duration="1200">0</span>
                            </div>
                            <div class="progress transparent progress-small no-radius">
                                <div class="progress-bar progress-bar-white animate-progress-bar"
                                    data-percentage="{{(App\Models\Artist::where('user_id', $user->id)->count()==0)? 0 : App\Models\Artist::where('created_at', '>=', date('Y-m-d'))->where('user_id', $user->id)->count() / App\Models\Artist::where('user_id', $user->id)->count() *100 }}%">
                                </div>
                            </div>
                            <div class="description">
                                <i class="icon-custom-up"></i>
                                <span class="text-white mini-description ">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">
                    <div class="tiles green added-margin">
                        <div class="tiles-body">
                            <div class="controller"> <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a> </div>
                            <div class="tiles-title"> NEW BOOKINGS </div>
                            <div class="heading"> <span class="animate-number"
                                    data-value="{{ $today_bookings }}"
                                    data-animation-duration="1000">0</span> </div>
                            <div class="progress transparent progress-small no-radius">
                                <div class="progress-bar progress-bar-white animate-progress-bar"
                                    data-percentage="{{ $booking_rate }}%">
                                </div>
                            </div>
                            <div class="description">
                                <i class="icon-custom-up"></i>
                                {{-- <span class="text-white mini-description ">&nbsp;
                                    12% higher <span class="blend">than last month</span></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="tiles purple added-margin">
                        <div class="tiles-body">
                            <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;"
                                    class="remove"></a> </div>
                            <div class="tiles-title"> NEW MESSAGES </div>
                            <div class="row-fluid">
                                <div class="heading"> <span class="animate-number"
                                        data-value="{{App\Models\Message::where('to', $user->email)->where('created_at', '>=', date('Y-m-d'))->count()}}"
                                        data-animation-duration="700">0</span> </div>
                                <div class="progress transparent progress-white progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="{{(App\Models\Message::where('to', $user->email)->count()==0)? 0 : App\Models\Message::where('to', $user->email)->where('created_at', '>=', date('Y-m-d'))->count() / App\Models\Message::where('to', $user->email)->count() *100 }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="description"><i class="icon-custom-up"></i>
                                {{-- <span
                                    class="text-white mini-description ">&nbsp;
                                    3% higher <span class="blend">than last month</span></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row spacing-bottom 2col">
                <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">
                    <div class="tiles blue added-margin">
                        <div class="tiles-body">
                            <div class="controller">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                            <div class="tiles-title"> TOTAL PROFILES</div>
                            <div class="heading">
                                <span class="animate-number"
                                    data-value="{{ App\Models\Artist::where('user_id', $user->id)->count() }}"
                                    data-animation-duration="1200">0</span>
                            </div>
                            <div class="progress transparent progress-small no-radius">
                                <div class="progress-bar progress-bar-white animate-progress-bar"
                                    data-percentage="100%">
                                </div>
                            </div>
                            <div class="description">
                                <i class="icon-custom-up"></i>
                                <span class="text-white mini-description ">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">
                    <div class="tiles green added-margin">
                        <div class="tiles-body">
                            <div class="controller">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                            <div class="tiles-title"> TOTAL BOOKINGS </div>
                            <div class="heading">
                                <span class="animate-number"
                                    data-value="{{ $total_booking }}"
                                    data-animation-duration="1000">0</span>
                            </div>
                            <div class="progress transparent progress-small no-radius">
                                <div class="progress-bar progress-bar-white animate-progress-bar"
                                    data-percentage="100%">
                                </div>
                            </div>
                            <div class="description">
                                <i class="icon-custom-up"></i>
                                <span class="text-white mini-description ">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="tiles purple added-margin">
                        <div class="tiles-body">
                            <div class="controller">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                            <div class="tiles-title"> TOTAL PAGES </div>
                            <div class="row-fluid">
                                <div class="heading">
                                    <span class="animate-number" data-value="{{ App\Models\Page::count() }}"
                                        data-animation-duration="700">22
                                    </span>
                                </div>
                                <div class="progress transparent progress-white progress-small no-radius">
                                    <div class="progress-bar progress-bar-white animate-progress-bar"
                                        data-percentage="100%"></div>
                                </div>
                            </div>
                            <div class="description">
                                <i class="icon-custom-up"></i>
                                <span class="text-white mini-description ">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row spacing-bottom" style="display: none">
                <div class="col-md-12">
                    <div class="tiles white added-margin">
                        <div class="tiles-body">
                            <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;"
                                    class="remove"></a> </div>
                            <div class="tiles-title"> SERVER LOAD </div>
                            <div class="heading text-black "> 250 GB </div>
                            <div class="progress  progress-small no-radius">
                                <div class="progress-bar progress-bar-success animate-progress-bar"
                                    data-percentage="25%"></div>
                            </div>
                            <div class="description"> <span class="mini-description"><span
                                        class="text-black">250GB</span> of <span class="text-black">1,024GB</span>
                                    used</span> </div>
                        </div>
                    </div>
                    <div class="tiles white added-margin">
                        <div id="chart"> </div>
                    </div>
                </div>
            </div>
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Last <span class="semi-bold">Bookings</span>
                            </h4>
                        </div>

                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="example2">
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
                                        @foreach($total_bookings as $booking)
                                        <tr class="odd">
                                            <td>{{$booking->booking_number}}</td>
                                            <td>{{$booking->event->name}}</td>
                                            <td>{{$booking->pricelocation->location->name}}</td>
                                            <td>{{$booking->datetime}}</td>
                                            <td>{{$booking->pricelocation->artist->fullname}}</td>
                                            <td style=" text-align: center">
                                                {{$booking->status->name3}}</td>
                                            <td style="text-align: center">{{$booking->amount}}</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a
                                                                href="{{ route('client.booking.view', ['id'=>$booking->id]) }}">View
                                                                Booking</a></li>
                                                        <li><a href="{{ route('artists.detail', ['artist'=>$booking->pricelocation->artist->user->id, 'profileid'=>$booking->pricelocation->artist->id]) }}"
                                                                target="_blank">View Artist</a></li>
                                                        <li><a
                                                                href="{{ route('client.booking.contactcustomer', ['id'=>$booking->id]) }}">Contact
                                                                Customer</a></li>
                                                        <li><a
                                                                href="{{ route('client.booking.delete', ['id'=>$booking->id])}}">Remove
                                                                Booking</a></li>

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
            <div class="row" style="display:none">
                <div class="col-md-8 spacing-bottom">
                    <div class="row tiles-container tiles white spacing-bottom">
                        <div class="tile-more-content col-md-4 col-sm-4 no-padding">
                            <div class="tiles green">
                                <div class="tiles-body">
                                    <div class="heading"> Statistical </div>
                                    <p>Status : live</p>
                                </div>
                                <div class="tile-footer">
                                    <div class="iconplaceholder"><i class="fa fa-map-marker"></i></div>
                                    258 Countries, 4835 Cities
                                </div>
                            </div>
                            <div class="tiles-body">
                                <ul class="progress-list">
                                    <li>
                                        <div class="details-wrapper">
                                            <div class="name">Foreign Visits</div>
                                            <div class="description">Our Overseas visits</div>
                                        </div>
                                        <div class="details-status pull-right"> <span class="animate-number"
                                                data-value="89" data-animation-duration="800">0</span>% </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-small no-radius">
                                            <div class="progress-bar progress-bar-success animate-progress-bar"
                                                data-percentage="89%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="details-wrapper">
                                            <div class="name">Local Visits</div>
                                            <div class="description">Our Overseas visits</div>
                                        </div>
                                        <div class="details-status pull-right"> <span class="animate-number"
                                                data-value="45" data-animation-duration="600">0</span>% </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-small no-radius ">
                                            <div class="progress-bar progress-bar-warning animate-progress-bar"
                                                data-percentage="45%"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="details-wrapper">
                                            <div class="name">Other Visits</div>
                                            <div class="description">Our Overseas visits</div>
                                        </div>
                                        <div class="details-status pull-right"> <span class="animate-number"
                                                data-value="12" data-animation-duration="200">0</span>% </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-small no-radius">
                                            <div class="progress-bar progress-bar-danger animate-progress-bar"
                                                data-percentage="12%"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tiles white col-md-8 col-sm-8 no-padding">
                            <div class="tiles-chart">
                                <div class="controller"> <a href="javascript:;" class="reload"></a> <a
                                        href="javascript:;" class="remove"></a> </div>
                                <div class="tiles-body">
                                    <div class="tiles-title">GEO-LOCATIONS</div>
                                    <div class="heading"> 8,545,654 <i class="fa fa-map-marker"></i> </div>
                                </div>
                                <div id="world-map" style="height:405px"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row tiles-container spacing-bottom tiles grey">
                        <div class="tiles white col-md-8 col-sm-8 no-padding">
                            <div class="tiles-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="mini-chart-wrapper">
                                            <div class="chart-details-wrapper">
                                                <div class="chartname"> New Orders </div>
                                                <div class="chart-value"> 17,555 </div>
                                            </div>
                                            <div class="mini-chart">
                                                <div id="mini-chart-orders"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="mini-chart-wrapper">
                                            <div class="chart-details-wrapper">
                                                <div class="chartname"> My Balance </div>
                                                <div class="chart-value"> $17,555 </div>
                                            </div>
                                            <div class="mini-chart">
                                                <div id="mini-chart-other"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="ricksaw"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-4 col-sm-4 no-padding">
                            <div class="tiles grey ">
                                <div class="tiles white no-margin">
                                    <div class="tiles-body">
                                        <div class="tiles-title blend"> OVERALL VIEWS </div>
                                        <div class="heading"> <span data-animation-duration="1000" data-value="432852"
                                                class="animate-number">0</span> </div>
                                        44% higher <span class="blend">than last month</span>
                                    </div>
                                </div>
                                <div id="legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none">
                        <div class="col-md-4 col-sm-4 no-padding">
                            <div class="tiles red weather-widget ">
                                <div class="tiles-body">
                                    <div class="controller"> </div>
                                    <div class="tiles-title"> TODAY’S WEATHER </div>
                                    <div class="heading">
                                        <div class="pull-left"> Tuesday </div>
                                        <div class="pull-right"> 55 </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="big-icon">
                                        <canvas id="partly-cloudy-day" width="120" height="120"></canvas>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="tile-footer">
                                    <div class="pull-left">
                                        <canvas id="wind" width="32" height="32"></canvas>
                                        <span class="text-white small-text-description">Windy</span> </div>
                                    <div class="pull-right">
                                        <canvas id="rain" width="32" height="32"></canvas>
                                        <span class="text-white small-text-description">Humidity</span> </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE -->
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('adminn/assets/js/dashboard.js') }}" type="text/javascript"></script>
@endsection
