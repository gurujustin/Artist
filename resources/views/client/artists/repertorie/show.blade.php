@extends('client.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Repertories </h3>
            <a type="button" class="btn btn-success pull-right" href="{{ route('client.profiles.edit', ['id' => $id]) }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Repertories</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.addrepertorie', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="janre">Genre</label>
                                            <input type="text" name="janre" id="janre" style="width: 100%">
                                        </div>
                                        @error('janre')
                                        <span class="error">
                                            <strong>{{ 'This field is requied.' }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea name="content" id="content" cols="30" rows="3" style="width: 100%"></textarea>
                                        </div>
                                        @error('content')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <p>
                                            <button type="submit" class="btn btn-danger">Add New</button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="example1" class="list-group col">
                                        @foreach ($repertories as $repertorie)
                                        <div class="list-group-item" style="overflow: hidden">
                                            <div class="col-md-2">
                                                <i class="fa fa-arrows handle sort-arrow"></i>
                                                <span style="font-size: 14px">{{ $repertorie->janre }}</span>
                                            </div>
                                            <div class="col-md-7">
                                                <span class="">
                                                    <textarea name="content" id="repertorie{{ $repertorie->id }}" cols="30" rows="3" style="min-width: 100%; max-width: 100%">{{ json_decode($repertorie->content) }}</textarea>
                                                </span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-center">
                                                    <a onclick="editaddon({{ $id }}, {{ $repertorie->id }})" class="btn btn-danger">Save</a>
                                                    <a onclick="deleteaddon({{ $id }}, {{ $repertorie->id }})" class="btn btn-secondary">Delete</a>
                                                    <span>
                                            </div>
                                        </div>
                                        @endforeach
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
<script src="{{ asset('adminn/assets/js/Sortable.js') }}" type="text/javascript"></script>
<script>
    var example1 = document.getElementById('example1');

    new Sortable(example1, {
        animation: 150
        , ghostClass: 'blue-background-class',
        handle: '.handle',
    });

</script>
<script>
    function editaddon(artistid, repertorieid) {
        repertorie = $('#repertorie' + repertorieid).val();
        if (repertorie == '') {
            $('#repertorie' + repertorieid).addClass('has-error');
            return;
        }
        $.ajax({
            url: "editrepertorie"
            , type: 'get'
            , dataType: "JSON"
            , data: {
                "repertorie": repertorie
                , 'artistid': artistid
                , 'repertorieid': repertorieid
            , }
            , success: function() {
                location.reload();
            }
        });
    }

    function deleteaddon(artistid, repertorieid) {
        repertorie = $('#repertorie' + repertorieid).val();
        $.ajax({
            url: "deleterepertorie"
            , type: 'get'
            , dataType: "JSON"
            , data: {
                "repertorie": repertorie
                , 'artistid': artistid
                , 'repertorieid': repertorieid
            , }
            , success: function() {
                location.reload();
            }
        });
    }

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
<style>
    .has-error {
        border: 1px solid red !important;
    }

</style>
@endsection
