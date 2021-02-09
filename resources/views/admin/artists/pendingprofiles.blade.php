@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Blocked Profiles </h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Blocked Profiles</span>
                            </h4>
                        </div>
                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Event Type</th>
                                            <th>Act Type</th>
                                            <th>Location</th>
                                            <th style="text-align: center">Experience</th>
                                            <th>Registered</th>
                                            <th style="text-align: center">Bookings</th>
                                            <th>Client</th>
                                            <th class="all" style="text-align: center">Status</th>
                                            <th class="all" style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profiles as $profile)
                                        <tr class="odd" profile-id="{{ $profile->id }}">
                                            <td>{{ $profile->id }}</td>
                                            <td>{{ $profile->fullname }}</td>
                                            <td>{{ $profile->event->name }}</td>
                                            <td>{{ $profile->act->name }}</td>
                                            <td>{{ $profile->location->name }}</td>
                                            <td style="text-align: center">{{ $profile->exp }}</td>
                                            <td>{{ with($profile->created_at)->format('d/m/Y h:i A') }}</td>
                                            <td style="text-align: center">{{ App\Models\Booking::whereIn('price_location_id', $profile->pricelocation->pluck('id'))->count() }}</td>
                                            <td>{{ $profile->user->name }}</td>
                                            <td style="text-align: center"><span
                                                    class="label label-@if($profile->status_id == 2){{ 'important' }}@else{{ 'info' }}@endif"
                                                    onclick="changestatus({{ $profile->id }})">{{ $profile->status->name1 }}</span>
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
                                                        <li><a href="{{ route('artists.detail', ['artist' => $profile->user->id, 'profileid' => $profile->id]) }}" target="_blank">View Profile</a></li>
                                                        <li><a
                                                                href="{{ route('profiles.edit', ['artist' => $profile->user->id, 'profileid' => $profile->id]) }}">Edit
                                                                Profile</a></li>
                                                        <li><a href="{{ route('contact', ['artist' => $profile->user->id]) }}">Contact Client</a></li>
                                                        <li>
                                                            <a
                                                                onclick="document.getElementById('block{{ $profile->id }}').submit();">Activate
                                                                profile</a>
                                                            <form
                                                                action="{{ action('admin\ProfileController@activeprofile', ['id' => $profile->id]) }}"
                                                                method="POST" id="block{{ $profile->id }}">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="remove" data-id="{{ $profile->id }}">Remove
                                                                profile</a>
                                                            <form
                                                                action="
                                                                {{ action('admin\ProfileController@removeprofile', ['id' => $profile->id]) }}"
                                                                method="POST" id="remove{{ $profile->id }}">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </li>
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
    function changestatus(id) {
        $.ajax({
            url: id +"/changestatus"
            , type: 'get'
            , dataType: "JSON"
            , data: {
                'id': id
            , }
            , success: function(data) {
                if (data == 1) {
                    $('tr[profile-id="' + id + '"]').find('.label-important').addClass('label-info');
                    $('tr[profile-id="' + id + '"]').find('.label-important').text('active');
                    $('tr[profile-id="' + id + '"]').find('.label-important').removeClass('label-important');
                } else {
                    $('tr[profile-id="' + id + '"]').find('.label-info').addClass('label-important');
                    $('tr[profile-id="' + id + '"]').find('.label-info').text('pending');
                    $('tr[profile-id="' + id + '"]').find('.label-info').removeClass('label-info');
                }
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
        @endif    
    });
    $('.remove').click(function(){
        id = $(this).data('id');
        $('#confirm').modal('show');
        $('.confirm').click(function(){
            document.getElementById('remove'+id).submit();
        })
    });

</script>

@endsection