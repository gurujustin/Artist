@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="content">
        <div class="page-title">
            <h3>Add New Profile </h3>
            <a type="button" class="btn btn-success pull-right" href="{{ route('profiles', ['artist' => $artist->id]) }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <form action="{{ route('profiles.store', ['artist' => $artist->id]) }}" method="POST">
                @csrf
                <div class="row-fluid">
                    <div class="span12">
                        <div class="grid simple ">
                            <div class="grid-title">
                                <h4>
                                    <span class="semi-bold">Main Details</span>
                                </h4>
                            </div>
                            <div class="grid-body ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Artist Name</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-edit"></i>
                                            <input name="fullname" id="fullname" type="text" value="{{ old('fullname') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('fullname')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Website</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-link"></i>
                                            <input name="website" id="website" type="text" value="{{ old('website') }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Years of Experience</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-calendar"></i>
                                            <input name="exp" id="exp" type="number" value="{{ old('exp') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('exp')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Location</label>
                                        <div class="input-with-icon left">
                                            <i class=""></i>
                                            <select name="location" id="location" class="form-control" tabindex="-1">
                                                @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
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
                                        <label class="form-label">Act Type</label>
                                        <div class="input-with-icon left">
                                            <i class=""></i>
                                            <select name="act" id="act" class="form-control" tabindex="-1">
                                                @foreach ($acts as $act)
                                                <option value="{{ $act->id }}">{{ $act->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('act')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Event Type </label>
                                        <div class="input-with-icon left">
                                            <i class=""></i>
                                            <select name="event" id="event" class="form-control" tabindex="-1">
                                                @foreach($events as $event)
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF MY TABLE -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-cons pull-left">CREATE NEW PROFILE</button>
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
