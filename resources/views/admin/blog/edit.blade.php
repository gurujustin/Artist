@extends('admin.layouts.app')
@section('title', 'Booking')
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
            <!-- ID CONTAINER -->
            <div id="container">
                <form action="{{ route('blog.update', ['blog' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- MY TABLE -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>
                                        <span class="semi-bold">Create Blog</span>
                                    </h4>
                                </div>
                                <div class="grid-body ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Title</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="title" id="title" type="text" class="form-control" placeholder="title*" value="{{$blog->title}}" >
                                            </div>
                                            @error('title')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Category</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <select class="form-control" name="category">
                                                    @foreach ($categories as $item)
                                                        <option value="{{$item->id}}" @if ($item->id == $blog->category_id)
                                                            {{'selected'}}
                                                        @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Image</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <input name="image" id="image" type="file" class="form-control" placeholder="image*" value="{{$blog->img}}" accept=".jpg, .png, .jpeg, .svg">
                                            </div>
                                            @error('image')
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Category</label>
                                            <div class="input-with-icon right">
                                                <i class=""></i>
                                                <select class="form-control" name="status">
                                                    <option value="1" @if ($blog->status_id == 1)
                                                        {{'selected'}}
                                                    @endif>published</option>
                                                    <option value="2" @if ($blog->status_id == 2)
                                                        {{'selected'}}
                                                    @endif>draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <i class=""></i>
                                            <textarea  id="text-editor" name="description" rows="10" class="form-control">{{$blog->description}}</textarea>
                                            @error('description')
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
                            <button type="submit" class="btn btn-danger btn-cons pull-left">SUBMIT</button>
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
