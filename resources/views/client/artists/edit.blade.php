@extends('client.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Edit Profile </h3>
            <a type="button" class="btn btn-success pull-right"
                href="{{ route('client.profiles') }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <form action="{{ action('client\ProfileController@update', ['id' => $profile->id]) }}"
                method="POST">
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
                                            <input name="fullname" id="fullname" type="text"
                                                value="{{ $profile->fullname }}" class="form-control" placeholder="">
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
                                            <input name="website" id="website" type="text"
                                                value="{{ $profile->website }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Years of Experience</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-calendar"></i>
                                            <input name="exp" id="exp" type="number" value="{{ $profile->exp }}"
                                                class="form-control" placeholder="">
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
                                            <select name="location" id="location" class="form-control" tabindex="-1"
                                                autocomplete="off">
                                                @foreach ($locations as $location)
                                                <option value="{{ $location->id }}" @if($profile->
                                                    location_id==$location->id) {{ 'selected' }}
                                                    @endif>{{ $location->name }}</option>
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
                                            <select name="act" id="act" class="form-control" tabindex="-1"
                                                autocomplete="off">
                                                @foreach ($acts as $act)
                                                <option value="{{ $act->id }}" @if($profile->act_id==$act->id)
                                                    {{ 'selected' }} @endif>{{ $act->name }}</option>
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
                                            <select name="event" id="event" class="form-control" tabindex="-1"
                                                autocomplete="off">
                                                @foreach($events as $event)
                                                <option value="{{ $event->id }}" @if($profile->event_id==$event->id)
                                                    {{ 'selected' }} @endif>{{ $event->name }}</option>
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

                <div class="row">
                    <div class="col-md-12">
                        <a type="button" class="btn  btn-cons pull-left"
                            href="{{ route('client.showvideo', ['id' => $profile->id]) }}">ADD
                            VIDEOS</a> &nbsp; &nbsp;
                        <a type="button" class="btn  btn-cons pull-left"
                            href="{{ route('client.showimage', ['id' => $profile->id]) }}">ADD
                            IMAGES</a> &nbsp; &nbsp;
                        <a type="button" class="btn  btn-cons pull-left"
                            href="{{ route('client.showmusic', ['id' => $profile->id]) }}">ADD
                            MUSIC</a> &nbsp; &nbsp;
                        <a type="button" class="btn  btn-cons pull-left"
                            href="{{ route('client.showsocial', ['id' => $profile->id]) }}">ADD
                            SOCIAL ACCOUNTS</a> &nbsp; &nbsp;
                        <a type="button" class="btn  btn-cons pull-left"
                            href="{{ route('client.showpricing', ['id' => $profile->id]) }}">ADD
                            LOCATION & PRICES</a> &nbsp; &nbsp;
                        <a type="button" class="btn  btn-cons pull-left"
                            href="{{ route('client.showrepertorie', ['id' => $profile->id]) }}">ADD
                            Repertorie</a>
                    </div>
                </div>
                <!-- END OF MY TABLE -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-cons pull-left">UPDATE</button>
                    </div>
                </div>
            </form>
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