@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Social Account </h3>
            <a type="button" class="btn btn-success pull-right" href="{{ route('profiles.edit', ['artist' => $artist->user->id, 'profileid' => $artist->id]) }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Social Account</span>
                            </h4>
                        </div>
                        <div class="grid-body">
                            <div class="row">
                                <form action="{{ route('uploadsocial', ['artist' => $artist->user->id, 'profileid' => $artist->id]) }}" method="POST">
                                    @csrf
                                    <div class="col-md-4">
                                        <label class="form-label">Facebook</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-facebook"></i>
                                            <input type="text" id="facebook" name="facebook" class="form-control" value="{{ $artist->facebook }}">
                                        </div>
                                        @error('facebook')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">twitter</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-twitter"></i>
                                            <input type="text" id="twitter" name="twitter" class="form-control" value="{{ $artist->twitter }}">
                                        </div>
                                        @error('twitter')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Youtube</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-youtube"></i>
                                            <input type="text" id="youtube" name="youtube" class="form-control" value="{{ $artist->youtube }}">
                                        </div>
                                        @error('youtube')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Instagram</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-instagram"></i>
                                            <input type="text" id="instagram" name="instagram" class="form-control" value="{{ $artist->instagram }}">
                                        </div>
                                        @error('instagram')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Linkedin</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-linkedin"></i>
                                            <input type="text" id="linkedin" name="linkedin" class="form-control" value="{{ $artist->linkedin }}">
                                        </div>
                                        @error('linkedin')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <br />

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger btn-cons pull-left">SAVE ACCOUNT</button>
                                    </div>
                                </form>
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
<!-- END CONTAINER -->
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        @if ($msg = Session::get('success'))
            Messenger().post({
                message: "{{$msg}}",
                type: 'success',
                showCloseButton: true
            });
        @endif    
    });

</script>
@endsection
