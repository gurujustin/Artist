@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple">
                    <div class="grid-body no-border" style="min-height: 850px;">
                        <br>
                        <div class="row-fluid ">
                            <form action="{{ action('admin\MessageController@send') }}" method="POST">
                                @csrf
                                <h2>Contact Client </h2>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Receiver</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="to" value="{{ $artist->email }}">
                                        </div>
                                        @error('to')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Subject</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="subject">
                                        </div>
                                        @error('subject')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <textarea id="text-editor" placeholder="Enter text ..." class="form-control"
                                            rows="25" name="content"></textarea>
                                        @error('content')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-danger btn-cons btn-add" type="submit">
                                            <i class="icon-envelope"></i> Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('adminn/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}" type="text/javascript">
</script>
<script src="{{ asset('adminn/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}" type="text/javascript">
</script>
<!-- END CORE TEMPLATE JS -->
<script>
    $(document).ready(function() {
        $('#text-editor').wysihtml5();
        $("#quick-access").css("bottom", "0px");
    });
</script>
@endsection

@section('styles')

<link href="{{ asset('adminn/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet"
    type="text/css" />
@endsection