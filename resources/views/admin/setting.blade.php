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
        <div class="page-title">
            <h3>Settings</h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Admin Users</span>
                            </h4>
                        </div>
                        <div class="grid-body ">
                            <form action="{{ route('account.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Name</label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-edit"></i>
                                            <input name="name" id="name" type="text" value="{{ Auth::user()->name }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        @error('name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">E-mail </label>
                                        <div class="input-with-icon left">
                                            <i class="fa fa-mobile-phone"></i>
                                            <input name="email" id="email" type="text" value="{{ Auth::user()->email }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        @error('email')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Current Password</label>
                                        <div class="">
                                            <i class=""></i>
                                            <input name="current_password" id="current_password" type="password"
                                                value="" class="form-control" placeholder="">
                                        </div>
                                        @error('current_password')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">New Password</label>
                                        <div class="">
                                            <i class=""></i>
                                            <input name="password" id="password" type="password" value=""
                                                class="form-control" placeholder="">
                                        </div>
                                        @error('password')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="">
                                            <i class=""></i>
                                            <input name="password_confirmation" id="password_confirmation"
                                                type="password" value="{{ old('password_confirmation') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger btn-cons pull-left">UPDATE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MY TABLE -->
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                <span class="semi-bold">Role Editor</span>
                            </h4>
                            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#adduser">Add
                                New Admin</button>
                        </div>
                        <span class="refresh">
                            <div class="grid-body ">

                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th class="all" style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\User::where('role_id', 1)->where('id', '!=', 1)->get() as
                                        $user)
                                        <tr class="odd" user-id="{{ $user->id }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
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
                                                        <li>
                                                            <a onclick="showrole({{ $user->id }})"
                                                                data-toggle="modal" data-target="#editrole">Edit Role</a>
                                                        </li>
                                                        <li>
                                                            <a class="confirm" data-id="{{ $user->id }}">Remove Frome Admin</a>
                                                            <form action="{{ route('admin.remove') }}" method="POST" id="remove{{ $user->id }}" hidden>
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
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

        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <h4>
                            <span class="semi-bold">Price Setting</span>
                        </h4>
                    </div>
                    <div class="grid-body ">
                        <form action="javascript:;" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Type</label>
                                    <div class="input-with-icon left">
                                        <select name="type" class="form-control">
                                            <option value="" hidden></option>
                                            <option value="fix">Fixed amount</option>
                                            <option value="percent">Percentage</option>
                                        </select>
                                    </div>
                                    @error('type')
                                    <span class="error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Value</label>
                                    <div class="">
                                        <input type="number" name="value" class="form-control">
                                    </div>
                                    @error('type')
                                    <span class="value">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger btn-cons pull-left">UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ action('admin\IndexController@addadmin') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Add New Admin</h4>
                </div>
                <div class="modal-body">
                    <label for=""></label>
                    <select class="form-control" name="id" required>
                        @foreach (App\Models\User::where('role_id', 2)->get() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Add</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="removeuser" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ action('admin\IndexController@removeadmin') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Confirm</h4>
                </div>
                <div class="modal-body">
                    <label for="" class="text-center">Are you sure to remove this user from admin?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="confirm">Remove</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="editrole" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ action('admin\IndexController@editrole') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Edit role</h4>
                </div>
                <?php
                    $sidebar = [
                        'Dashboard',
                        'Our Artist',
                        'Messages',
                        'Bookings',
                        'Event Types',
                        'Event Locations',
                        'Act Types',
                        'Web Pages',
                        'Calendar',
                        'Latest News',
                        'Settings',
                        'Support'
                    ];
                    ?>
                <div class="modal-body">
                    <input type="hidden" name="id" id="userid">
                    @foreach ($sidebar as $item)
                    <div class="checkbox check-success">
                        <input class="role_check" id="checkbox{{ $loop->index }}" type="checkbox" name="role[]" value="{{ $item }}" checked>
                        <label for="checkbox{{ $loop->index }}">{{ $item }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Update</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
    function showrole(id){
        $.ajax({
            type: 'get',
            url: '{{ route("showrole") }}',
            data: {
                'id' : id,
            },
            success: function(data){
                console.log(data);
                $('.role_check').each(function(){
                    $(this).removeAttr('checked');
                    if(data.includes($(this).val())){
                        $(this).attr('checked', 'checked');
                    }
                })
                $('#userid').val(id);
            }
        });
    }
    $('.confirm').click(function(){
        id = $(this).attr('data-id');
        $('#removeuser').modal('show');
        $('#confirm').click(function(){
            $('#remove'+id).submit();
        });
    });
</script>
@endsection