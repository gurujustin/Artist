@extends('admin.layouts.app')
@section('title', 'Support')
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
                <h3>Contact Developer </h3>
            </div>
            <!-- ID CONTAINER -->
            <div id="container">
                <form action="{{ route('support.send') }}" method="POST">
                    @csrf
                    <!-- MY TABLE -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>
                                        <span class="semi-bold">Contact Form</span>
                                    </h4>
                                </div>
                                <div class="grid-body ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Subject</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="subject" id="subject" type="text" class="form-control" placeholder="subject*" >
                                            </div>
                                            @error('subject')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <textarea name="description" id="description" placeholder="Please enter your problem.*" type="text" class="form-control"></textarea>
                                            </div>
                                            @error('description')
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
                            <button type="submit" class="btn btn-danger btn-cons pull-left">SUBMIT</button>
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
@endsection
