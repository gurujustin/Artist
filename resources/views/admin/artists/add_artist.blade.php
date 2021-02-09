@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="content">
        <div class="page-title">
            <h3>Add New Client </h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <form action="{{ route('artists.store') }}" method="POST">
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
                                        <label class="form-label">Full Name</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-edit"></i>
                                            <input name="name" id="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Client E-mail</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-envelope"></i>
                                            <input name="email" id="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('email')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Client Telephone </label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-mobile-phone"></i>
                                            <input name="tel" id="tel" type="text" value="{{ old('tel') }}" class="form-control" placeholder="">
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
                                        <label class="form-label">Address</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-edit"></i>
                                            <input name="address" id="address" type="text" value="{{ old('address') }}" class="form-control" placeholder="">
                                        </div>
                                        @error('address')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
                        <button type="submit" class="btn btn-danger btn-cons pull-left">CREATE NEW CLIENT</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END PAGE -->
    </div>
</div>
<!-- END CONTAINER -->
@endsection
