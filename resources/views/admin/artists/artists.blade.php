@extends('admin.layouts.app')
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
            <h3>Our Clients </h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Our <span class="semi-bold">Clients</span>
                            </h4>
                        </div>
                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Address</th>
                                            <th>Telephone</th>
                                            <th style="text-align: center">Profiles</th>
                                            <th>Registered</th>
                                            <th class="all" style="text-align: center">Status</th>
                                            <th class="all" style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artists as $artist)
                                        <tr class="odd" user-id="{{ $artist->id }}">
                                            <td style="text-align: center">{{ $artist->id }}</td>
                                            <td>{{ $artist->name }}</td>
                                            <td>{{ $artist->email }}</td>
                                            <td>{{ $artist->address }}</td>
                                            <td>{{ $artist->tel }}</td>
                                            <td style="text-align: center">{{ count($artist->artist) }}</td>
                                            <td>{{ with($artist->created_at)->format('d/m/y h:i A') }}</td>
                                            <td style="text-align: center">
                                                @if($artist->role_id == 2)
                                                <span
                                                    class="label label-@if($artist->status_id == 2){{ 'important' }}@else{{ 'info' }}@endif"
                                                    onclick="blockartist({{ $artist->id }})">{{ $artist->status->name1 }}</span>
                                                @endif
                                            </td>
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
                                                        @if($artist->status_id == 1)
                                                        <li>
                                                            <a
                                                                href="{{ route('profiles', ['artist' => $artist->id]) }}">Manage
                                                                Profiles</a>
                                                        </li>
                                                        @endif
                                                        @if($artist->role_id != 1)
                                                        <li>
                                                            <a
                                                                href="{{ route('artists.show', ['artist' => $artist->id]) }}">
                                                                Edit Client</a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('contact', ['artist' => $artist->id]) }}">Contact
                                                                Client</a>
                                                        </li>
                                                        <li>
                                                            <a class="remove" data-id="{{ $artist->id }}">Remove
                                                                Client
                                                            </a>
                                                            <form
                                                                action="{{ action('admin\ArtistController@destroy', ['artist' => $artist->id]) }}"
                                                                method="POST" id="remove{{ $artist->id }}">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE -->
    </div>
</div>
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Confirm</h4>
            </div>
            <div class="modal-body">
                <label class="text-center">Are you sure you want to remove this client?</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger confirm">OK</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- END CONTAINER -->
@endsection
@section('scripts')
<script>
    function blockartist(id) {
        $.ajax({
            url: "artists/blockartist"
            , type: 'get'
            , dataType: "JSON"
            , data: {
                'id': id
            , }
            , success: function(data) {
                location.reload();
            }
        });
    }
    $('.remove').click(function(){
        id = $(this).data('id');
        $('#confirm').modal('show');
        $('.confirm').click(function(){
            document.getElementById('remove'+id).submit();
        })
    });
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