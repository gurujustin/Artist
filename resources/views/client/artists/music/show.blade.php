@extends('client.layouts.app')
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
            <h3>Musics </h3>
            <a type="button" class="btn btn-success pull-right"
                href="{{ route('client.profiles.edit', ['id' => $id]) }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Music</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.uploadmusic', ['id' => $id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="music">You can only upload mp4 file.</label>
                                            <input type="file" id="music" name="music" accept="audio/mp3" class="file">
                                        </div>
                                        @error('music')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="musictitle">Title</label>
                                            <input type="text" id="musictitle" name="musictitle" style="width: 100%">
                                        </div>
                                        @error('musictitle')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-danger">Upload music</button>
                                    </div>
                                </form>
                            </div>
                            <br /><br />
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Order Music Files</h4>
                                    <div id="example1" class="list-group col">
                                        @if (count($musics) != 0)
                                        @foreach ($musics as $music)
                                        <div class="list-group-item alert-success" style="overflow: hidden">
                                            <div class="col-sm-3">
                                                <i class="fa fa-arrows handle sort-arrow"></i>
                                                <h4>{{ $music->title }}</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <audio controls>
                                                    <source src="{{ url('uploads') . '/' . $music->url }}"
                                                        type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </div>
                                            <div class="col-md-3">
                                                <a onclick="document.getElementById('remove{{ $music->id }}').submit()"
                                                    class="btn btn-danger btn-cons pull-left">Remove</a>
                                                <form action="{{ route('client.removemusic', ['id' => $id]) }}"
                                                    method="POST" id="remove{{ $music->id }}" hidden>
                                                    @csrf
                                                    <input type="hidden" value="{{ $music->id }}" name="id">
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        No music
                                        @endif
                                    </div>
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
<!-- END CONTAINER -->
@endsection
@section('scripts')
<script src="{{ asset('adminn/assets/js/bootstrap-filestyle.min.js') }}"></script>
<script>
    $('.file').filestyle({
            buttonName: 'btn-success',
            buttonText: ' Open',
        });

</script>

<script src="{{ asset('adminn/assets/js/Sortable.js') }}" type="text/javascript"></script>
<script>
    var example1 = document.getElementById('example1');

        new Sortable(example1, {
            animation: 150,
            ghostClass: 'blue-background-class',
            handle: '.handle',
        });

</script>
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
@section('styles')
<link rel="stylesheet" href="{{ asset('adminn/assets/css/sotable.css') }}">
@endsection
