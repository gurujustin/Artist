@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE -->
<div class="page-content">
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="grid simple">
					<div class="grid-body no-border" style="min-height: 850px;">
						<br>
						<div class="row-fluid">
							<form action="{{ route('pages.update', ['page' => $page->id]) }}" method="POST">
								@csrf
								@method('put')
								<h2>Edit Web Page</h2>
								<div class="row">
									<div class="form-group col-md-12">
										<label class="form-label">Page Title</label>
										<div class="controls">
											<input type="text" class="form-control" name="title"
												value="{{ $page->title }}">
										</div>
										@error('title')
										<span class="error">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<label class="form-label">Page Content</label>
										<textarea id="text-editor" placeholder="Enter text ..." class="form-control"
											rows="25" name="content">{!! $page->content !!}</textarea>
										@error('content')
										<span class="error">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								{{-- <div class="row">
									<div class="form-group col-md-12">
										<label for="">Attach File</label>
										<input type="file" name="attach_file" class="file" accept="image/png, image/jpeg">
										@error('attach_file')
										<span class="error">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div> --}}
								<div class="row">
									<div class="col-md-12 pull-right">
										<button class="btn btn-danger btn-cons btn-add" type="submit">
											<i class="icon-envelope"></i> SAVE PAGE
										</button>
										<a class="btn btn-danger btn-cons btn-add" href="{{ route('pages.index') }}">
											<i class="icon-envelope"></i> CANCEL
										</a>
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

<!-- END PAGE -->
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
</script>
@endsection

@section('styles')

<link href="{{ asset('adminn/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet"
	type="text/css" />
@endsection