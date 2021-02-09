@extends('admin.layouts.app-message')
@section('content')
<div class="page-content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple">
                    <div class="grid-body no-border" style="min-height: 850px;">
                        <br>
                        <div class="row-fluid ">
                            <form action="{{ action('admin\MessageController@send') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h2>New Message </h2>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Receiver</label>
                                        <span class="help">e.g. "someone@example.com"</span>
                                        <div class="controls">
                                            <input type="email" class="form-control" name="to" value="{{ $msg->from }}">
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
                                        <span class="help">e.g. "Meeting Agenda"</span>
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
									<div class="form-group col-md-12">
										<label for="">Attach File</label>
										<input type="file" name="file" class="file">
										@error('file')
										<span class="error">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-danger btn-cons btn-add" type="submit"
                                            onclick="submit()">
                                            <i class="icon-envelope"></i> Send
                                        </button>
                                        {{-- <button class="btn btn-white btn-cons btn-cancel" type="button"
                                            onclick="save()">Save</button> --}}
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
<script src="{{ asset('adminn/assets/js/bootstrap-filestyle.min.js') }}"></script>
<script>
	$('.file').filestyle({
		buttonName: 'btn-danger',
		buttonText: ' Open'
	});
</script>
<!-- END CORE TEMPLATE JS -->
<script>
    $(document).ready(function() {
        $('#text-editor').wysihtml5();
        $("#quick-access").css("bottom", "0px");
    });
    function save(){
        $('form').attr('action', '{{ action("admin\MessageController@save") }}');
        $('form').submit();
    }
    function submit(){
        $('form').attr('action', '{{ action("admin\MessageController@send") }}');
        $('form').submit();
    }
</script>
@endsection

@section('styles')
<link href="{{ asset('adminn/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet"
    type="text/css" />
@endsection