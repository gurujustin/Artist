@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Edit Client </h3>
            <a type="button" class="btn btn-success pull-right" href="{{ route('artists.index') }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <form action="{{ route('artists.update', ['artist' => $artist->id]) }}" method="POST">
                @csrf
                @method('put')
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
                                        <label class="form-label">Full Name</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-edit"></i>
                                            <input name="name" id="name" type="text" value="{{ $artist->name }}" class="form-control" placeholder="">
                                        </div>
                                        @error('name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Client Telephone </label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-mobile-phone"></i>
                                            <input name="tel" id="tel" type="text" value="{{ $artist->tel }}" class="form-control" placeholder="">
                                        </div>
                                        @error('tel')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Address</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-edit"></i>
                                            <input name="address" id="address" type="text" value="{{ $artist->address }}" class="form-control" placeholder="">
                                        </div>
                                        @error('address')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Current Password</label>
                                        <div class="">
                                            <i class=""></i>
                                            <input name="current_password" id="current_password" type="password" value="{{ old('current_password') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('current_password')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if(Session::get('error'))
                                        <span class="error">
                                            <strong>{{ Session::get('error') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Password</label>
                                        <div class="">
                                            <i class=""></i>
                                            <input name="password" id="password" type="password" value="{{ old('password') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('password')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="">
                                            <i class=""></i>
                                            <input name="password_confirmation" id="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF MY TABLE -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-cons pull-left">UPDATE</button>
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
