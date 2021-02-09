@extends('admin.layouts.app')
@section('content')
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
                <h3>Event Location</h3>
            </div>
            <!-- ID CONTAINER -->
            <div id="container">
                <!-- MY TABLE -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="grid simple ">
                            <div class="grid-title">
                                <h4>
                                    Current <span class="semi-bold">Locations</span>
                                </h4>
                            </div>
                            <span class="refresh">
                                <div class="grid-body ">
                                    <table class="table table-striped" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Country</th>
                                                <th>Number of Artists</th>
                                                <th>slug</th>
                                                <th class="all" style="width: 130px;text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($locations as $location)
                                                <tr class="odd" location-id="{{ $location->id }}">
                                                    <td>{{ $location->id }}</td>
                                                    <td>{{ $location->name }}</td>
                                                    <td>{{ $location->country->name }}</td>
                                                    <td>{{ count($location->artist) }}</td>
                                                    <td>{{ $location->slug }}</td>
                                                    <td style="text-align: center">
                                                        <div class="btn-group">
                                                            <button
                                                                class="btn btn-small btn-white btn-demo-space">Action</button>
                                                            <button
                                                                class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                                data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a onclick="editlocation({{ $location->id }})"
                                                                        data-toggle="modal" data-target="#editLocation">Edit
                                                                        Location</a></li>
                                                                <li><a onclick="removelocation({{ $location->id }})">Remove
                                                                        Location</a></li>
                                                                <li><a href="#">View All Artists</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-danger btn-cons pull-left"
                                                data-toggle="modal" data-target="#addLocation">ADD NEW LOCATION</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- END OF MY TABLE -->
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
        @include('admin.location.addLocationModal')
        @include('admin.location.editLocationModal')
    </div>
@endsection
@section('scripts')
    <script>
        function removelocation(id) {
            $.ajax({
                url: "locations/" + id,
                type: 'delete',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": '{{ csrf_token() }}',
                },
                success: function() {
                    $('tr[location-id=' + id + ']').remove();
                    location.reload();
                }
            });
        }

        function editlocation(id) {
            $.ajax({
                url: "locations/" + id + "/edit",
                type: 'get',
                dataType: "JSON",
                data: {},
                success: function(data) {
                    $('#editname').val(data.name);
                    $('#editcountry option').removeAttr('selected')
                    $('#editcountry option[value="'+id+'"]').attr('selected', 'selected');
                    $('#editLocation form').attr('action', "{{ route('locations.index') }}/" + id);
                }
            });
        }
        $(document).ready(function () {
            @if ($msg = Session::get('success'))
                Messenger().post({
                    message: "{{$msg}}",
                    type: 'success',
                    showCloseButton: true
                });
            @elseif($msg = Session::get('error'))
                Messenger().post({
                    message: "{{$msg}}",
                    type: 'error',
                    showCloseButton: true
                });
            @endif    
        });

    </script>

@endsection
