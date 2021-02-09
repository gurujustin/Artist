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
            <h3>Blogs</h3>
        </div>
        <!-- ID CONTAINER -->

        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Our <span class="semi-bold">Blogs</span>
                            </h4>
                        </div>

                        <span class="refresh">
                            <div class="grid-body " style="overflow: hidden">
                                <div class="col-md-6">
                                    <img src="{{asset($blog->img)}}" style="width:100%">
                                </div>
                                <div class="col-md-6">
                                    <h3 style="color: rgb(41, 77, 112);"><b>{{$blog->title}}</b></h3>
                                    {!!$blog->description!!}
                                </div>
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
