@extends('client.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>My Profiles </h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">My Profiles</span>
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
                                            <th style="text-align: center">Bookings</th>
                                            <th>Top</th>
                                            <th>Blocked</th>
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
                                            <td style="text-align: center">
                                                {{ App\Models\Booking::whereIn('price_location_id', $profile->pricelocation->pluck('id'))->count() }}
                                            </td>
                                            <td style="text-align: center"><span
                                                    class="label label-@if($profile->role_id == 2){{ 'important' }}@else{{ 'warning' }}@endif">{{ $profile->role_id == 1 ? 'YES' : 'NO' }}</span>
                                            </td>
                                            <td style="text-align: center"><span
                                                    class="label label-@if($profile->blocked == 'blocked'){{ 'important' }}@else{{ 'success' }}@endif">{{ $profile->blocked }}</span>
                                            </td>
                                            <td style="text-align: center"><span
                                                    class="label label-@if($profile->status_id == 2){{ 'important' }}@else{{ 'info' }}@endif">{{ $profile->status->name1 }}</span>
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
                                                        <li><a href="{{ route('client.artists.detail', ['id' => $profile->id]) }}"
                                                                target="_blank">View Profile</a></li>
                                                        <li><a
                                                                href="{{ route('client.profiles.edit', ['id' => $profile->id]) }}">Edit
                                                                Profile</a></li>
                                                        <li>
                                                            <a class="remove" data-id="{{ $profile->id }}">Remove
                                                                profile</a>
                                                            <form
                                                                action="{{ action('client\ProfileController@destroy', ['id' => $profile->id]) }}"
                                                                method="POST" id="remove{{ $profile->id }}" hidden>
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
                <label class="text-center">Are you sure you want to remove this profile?</label>
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
