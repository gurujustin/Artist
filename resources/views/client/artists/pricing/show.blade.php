@extends('client.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="content">
        <div class="page-title">
            <h3>Location & Prices </h3>
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
                                <span class="semi-bold">Price Inclusions</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.addstandardinfo', ['id' => $id]) }}" method="POST">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="length">Standard Set Lengths:</label>
                                            <textarea name="length" id="length" cols="30" rows="10" style="width: 100%">@if(count($standardprice) != 0){{ $standardprice[0]->length }}@endif</textarea>
                                        </div>
                                        @error('length')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="time">Time Required to Set up & Sound Check:</label>
                                            <textarea name="time" id="time" cols="30" rows="10" style="width: 100%">@if(count($standardprice) != 0){{ $standardprice[0]->time }}@endif</textarea>
                                        </div>
                                        @error('time')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lineup">Standard Line Up Offered:</label>
                                            <textarea name="lineup" id="lineup" cols="30" rows="10" style="width: 100%">@if(count($standardprice) != 0){{ $standardprice[0]->lineup }}@endif</textarea>
                                        </div>
                                        @error('lineup')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </form>
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
                                <span class="semi-bold">Add Ons and Optional Line-Ups</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <form action="{{ route('client.addaddonprice', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="addontype">Addon Type</label>
                                            <input type="text" name="addontype" id="addontype" style="width: 100%">
                                        </div>
                                        @error('addontype')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="addonprice">Price from</label>
                                            <input type="number" name="addonprice" id="addonprice" style="width: 100%">
                                        </div>
                                        @error('addonprice')
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
                                <div class="col-md-8">
                                    <div id="example1" class="list-group col">
                                        @foreach ($addonprices as $addonprice)
                                        <div class="list-group-item" style="overflow: hidden">
                                            <span style="font-size: 14px;" class="">{{ $addonprice->type }}</span>
                                            <span class="pull-right">
                                                <input type="number" id="editaddon{{ $addonprice->id }}" value="{{ $addonprice->price }}">
                                                <a onclick="editaddon({{ $id }}, {{ $addonprice->id }})" class="btn btn-danger">Save</a>
                                                <a onclick="deleteaddon({{ $id }}, {{ $addonprice->id }})" class="btn btn-secondary">Delete</a>
                                            </span>
                                        </div>
                                        @endforeach
                                    </div>
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
                                <span class="semi-bold">Location Pricing</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('client.updatealllocation', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="initprice">Set one price as all.</label>
                                        <input type="number" name="initprice" id="initprice" value="{{ old('initprice') }}">
                                        <button type="submit" class="btn btn-danger">Update All</button>
                                        <div class="clearfix"></div>
                                        @error('initprice')
                                        <span class="error">
                                            <strong>This field is required.</strong>
                                        </span>
                                        @enderror
                                    </form>
                                </div>
                                <br /><br />
                                <div class="col-md-6">
                                    <form action="{{ route('client.addlocationprice', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-striped" id="example2">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($locations as $location)
                                                <tr>
                                                    <td><label for="{{ $location->name }}">{{ $location->name }}</label></td>
                                                    <td><input type="number" name="{{ $location->id }}" id="{{ $location->id }}" value="@if(count($locationprices) != 0){{ $locationprices[$loop->index]->price }}@endif" class="form-control @error($location->id)
                                                        {{ 'has-error' }}
                                                    @enderror"></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-danger">Update</button>
                                    </form>
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
    function editaddon(artistid, addonpriceid) {
        addonprice = $('#editaddon' + addonpriceid).val();
        if (addonprice == '') {
            $('#editaddon' + addonpriceid).addClass('has-error');
            return;
        }
        $.ajax({
            url: "editaddonprice"
            , type: 'get'
            , dataType: "JSON"
            , data: {
                "addonprice": addonprice
                , 'artistid': artistid
                , 'addonpriceid': addonpriceid
            , }
            , success: function() {
                location.reload();
            }
        });
    }

    function deleteaddon(artistid, addonpriceid) {
        addonprice = $('#editaddon' + addonpriceid).val();
        $.ajax({
            url: "deleteaddonprice"
            , type: 'get'
            , dataType: "JSON"
            , data: {
                "addonprice": addonprice
                , 'artistid': artistid
                , 'addonpriceid': addonpriceid
            , }
            , success: function() {
                location.reload();
            }
        });
    }

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
