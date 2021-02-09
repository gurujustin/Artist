@extends('client.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="content">
        <div class="page-title">
            <h3>Images </h3>
            <a type="button" class="btn btn-success pull-right"
                href="{{ route('client.profiles.edit', ['id' => $id]) }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid" id="pageimagesection">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Profile Page Image</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.uploadpageimage', ['id' => $id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="pageimage">You can only upload jpg, png file.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="file" id="pageimage" name="pageimage"
                                                accept="image/png, image/jpeg" class="file">
                                        </div>
                                        @error('pageimage')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-danger">Upload Image</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    @if (count($pageimage) != 0)
                                    <a href="{{ url('uploads') . '/' . $pageimage[0]->url }}" target="_blank">
                                        <div class="thumbnail">
                                            <img src="{{ url('uploads') . '/' . $pageimage[0]->url }}" alt=""
                                                width="200">
                                            <?php list($width, $height) = getimagesize(public_path('uploads/'.$pageimage[0]->url)); ?>
                                            <div class="caption text-center">Dimention: {{ $width.' X '.$height }}</div>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Repertoire Image</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.uploadrepimage', ['id' => $id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="repimage">You can only upload jpg, png file.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="file" id="repimage" name="repimage"
                                                accept="image/png, image/jpeg" class="file">
                                        </div>
                                        @error('repimage')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-danger">Upload Image</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    @if (count($repimage) != 0)
                                    <a href="{{ url('uploads') . '/' . $repimage[0]->url }}" target="_blank">
                                        <div class="thumbnail">
                                            <img src="{{ url('uploads') . '/' . $repimage[0]->url }}" alt=""
                                                width="200">
                                            <?php list($width, $height) = getimagesize(public_path('uploads/'.$repimage[0]->url)); ?>
                                            <div class="caption text-center">Dimention: {{ $width.' X '.$height }}</div>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid" id="reviewimagesection">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Review Image</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.uploadreviewimage', ['id' => $id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="reviewimage">You can only upload jpg, png file.</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="file" id="reviewimage" name="reviewimage"
                                                accept="image/png, image/jpeg" class="file">
                                        </div>
                                        @error('reviewimage')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-danger">Upload Image</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    @if (count($reviewimage) != 0)
                                    <a href="{{ url('uploads') . '/' . $reviewimage[0]->url }}" target="_blank">
                                        <div class="thumbnail">
                                            <img src="{{ url('uploads') . '/' . $reviewimage[0]->url }}" alt=""
                                                width="200">
                                            <?php list($width, $height) = getimagesize(public_path('uploads/'.$reviewimage[0]->url)); ?>
                                            <div class="caption text-center">Dimention: {{ $width.' X '.$height }}</div>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid" id="galleryimagesection">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Gallery Image</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.uploadgalleryimage', ['id' => $id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="galleryimage">You can only upload jpg, png file.</label>
                                            <input type="file" id="galleryimage" name="galleryimage"
                                                accept="image/png, image/jpeg" class="file">
                                            @error('galleryimage')
                                            <span class="error">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gallerytitle">Title</label>
                                            <input type="text" id="gallerytitle" name="gallerytitle"
                                                style="width: 100%">
                                            @error('gallerytitle')
                                            <span class="error">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="galleryalt">Alt</label>
                                            <input type="text" id="galleryalt" name="galleryalt" style="width: 100%">
                                            @error('galleryalt')
                                            <span class="error">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger">Upload Image</button>
                                    </div>
                                </form>
                            </div>
                            <br />
                            <div class="row">
                                @if (count($galleryimage) != 0)
                                <div id="gridDemo" class="col">
                                    @foreach ($galleryimage as $row)
                                    <div class="grid-square col-md-2 text-center" gallery-id="{{ $row->id }}">
                                        <a href="{{ url('uploads') . '/' . $row->url }}" target="_blank">
                                            <div class="thumbnail">
                                                <img src="{{ url('uploads') . '/' . $row->url }}"
                                                    alt="{{ $row->galleryalt }}" width="200">
                                                <?php list($width, $height) = getimagesize(public_path('uploads/'.$row->url)); ?>
                                                <div class="caption text-center">Dimention: {{ $width.' X '.$height }}
                                                </div>
                                            </div>
                                        </a>
                                        <h3>{{ $row->title }}</h3>
                                        <a href="javascript:;" onclick="removeGallery({{ $row->id }})"
                                            class="">remove</a>&nbsp;|
                                        <a href="javascript:;" class="">primary</a>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
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
        buttonName: 'btn-danger',
        buttonText: ' Open'
    });

</script>
<script>
    function removeGallery(id) {
            $.ajax({
                url: "removegallery",
                type: 'get',
                dataType: "JSON",
                data: {
                    "id": id,
                },
                success: function() {
                    location.reload();
                }
            });
        }

</script>
<script src="{{ asset('adminn/assets/js/Sortable.js') }}" type="text/javascript"></script>
<script>
    var gridDemo = document.getElementById('gridDemo');
        new Sortable(gridDemo, {
            animation: 150,
            ghostClass: 'blue-background-class'
        });

</script>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('adminn/assets/css/sotable.css') }}">
@endsection
