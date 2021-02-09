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
            <h3>Video </h3>
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
                                <span class="semi-bold">Video</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.uploadvideo', ['id' => $id]) }}" method="POST">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for='video'>You can add Youtube ro Vimeo file link.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-with-icon left">
                                            <i class="fa fa-link"></i>
                                            <input type="text" id="video" name="video" class="form-control" value="">
                                        </div>
                                        @error('video')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-danger">Add Link</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        <h4>Video List</h4>
                                    </label>
                                    @foreach (App\Models\Artist::find($id)->artistvideo as $item)
                                    <div class="alert">
                                        {{ $item->url }}
                                        <a href="javascript:;"
                                            onclick="document.getElementById('item{{ $item->id }}').submit();"
                                            class="pull-right">Remove</a>
                                        <form
                                            action="{{ action('client\ProfileController@removevideo', ['id' => $id]) }}"
                                            method="post" id="item{{ $item->id }}" hidden>
                                            @csrf
                                            <input name="id" value="{{ $item->id }}">
                                        </form>
                                        <a onclick="window.open('{{ $item->url }}', '_blank');" href="javascript:;"
                                            class="pull-right">Play Video&nbsp;&nbsp;&nbsp;</a>
                                        @if($item->primary != 1)
                                        <a href="javascript:;"
                                            onclick="document.getElementById('itemset{{ $item->id }}').submit();"
                                            class="pull-right">Set Primary&nbsp;&nbsp;&nbsp;</a>
                                        <form action="{{ action('client\ProfileController@setvideo', ['id' => $id]) }}"
                                            method="post" id="itemset{{ $item->id }}" hidden>
                                            @csrf
                                            <input name="id" value="{{ $item->id }}">
                                        </form>
                                        @endif
                                    </div>
                                    @endforeach
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
