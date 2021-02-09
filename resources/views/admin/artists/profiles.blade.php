@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Artist Profiles </h3>
            <a type="button" class="btn btn-success pull-right" href="{{ route('artists.index') }}">Back</a>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Artist Profiles</span>
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
                                            <td style="text-align: center">
                                                <span
                                                    class="label label-@if($profile->status_id == 2){{ 'important' }}@else{{ 'info' }}@endif" onclick="document.getElementById('change{{ $profile->id }}').submit();">{{ $profile->status->name1 }}</span>
                                                    <form action="{{ action('admin\ProfileController@changestatusprofile', ['artist' => $artist->id, 'profileid' => $profile->id]) }}" method="post" id="change{{ $profile->id }}">
                                                    @csrf
                                                    </form>                                                
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
                                                        <li><a href="{{ route('artists.detail', ['artist' => $artist->id, 'profileid' => $profile->id]) }}" target="_blank">View Profile</a></li>
                                                        <li><a
                                                                href="{{ route('profiles.booking', ['id'=>$profile->id]) }}">Create
                                                                Bookings</a></li>
                                                        <li><a
                                                                href="{{ route('profiles.edit', ['artist' => $artist->id, 'profileid' => $profile->id]) }}">Edit
                                                                Profile</a></li>
                                                        <li><a href="{{ route('contact', ['artist' => $artist->id]) }}">Contact
                                                                Client</a></li>
                                                        <li>
                                                            <a onclick="document.getElementById('remove').submit();"
                                                                href="javascript:;">Remove
                                                                profile</a>
                                                            <form
                                                                action="{{ route('profiles.destroy', ['artist' => $artist->id, 'profileid' => $profile->id]) }}"
                                                                method="post" id="remove" class="hidden">
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
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger btn-cons pull-left">
                        <a href="{{ route('profiles.create', ['artist' => $artist->id]) }}" style="color: #fff;">
                            CREATE NEW PROFILE</a>
                    </button>
                </div>
            </div>
        </div>
        <!-- END PAGE -->
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

</script>

@endsection