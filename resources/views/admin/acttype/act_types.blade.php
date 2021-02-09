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
            <h3>Sub Categories</h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Sub <span class="semi-bold">Categories</span>
                            </h4>
                        </div>
                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Sub category</th>
                                            <th>Main Category</th>
                                            <th>Number of Artists</th>
                                            <th>slug</th>
                                            <th class="all" style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($acttypes as $acttype)
                                        <tr class="odd" acttype-id="{{ $acttype->id }}">
                                            <td>{{ $acttype->id }}</td>
                                            <td>{{ $acttype->name }}</td>
                                            <td>{{ $acttype->parentact->name }}</td>
                                            <td>{{ count($acttype->artist) }}</td>
                                            <td>{{ $acttype->slug }}</td>
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
                                                            <a onclick="editActType({{ $acttype->id }})"
                                                                data-toggle="modal" data-target="#editActType">
                                                                Edit Category
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="remove" data-id="{{ $acttype->id }}">
                                                                Remove Category
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger btn-cons pull-left open"
                                            data-toggle="modal" data-target="#addActType">ADD NEW ACT
                                            CATEGORY</button>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE -->
    </div>
    @include('admin.acttype.addActTypeModal')
    @include('admin.acttype.editActTypeModal')
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
@endsection
@section('scripts')
<script>
    function removeActType(id) {
        $.ajax({
            url: "acttypes/" + id
            , type: 'delete'
            , dataType: "JSON"
            , data: {
                "id": id
                , "_method": 'DELETE'
                , "_token": '{{ csrf_token() }}'
            , }
            , success: function() {
                location.reload();
            }
        });
    }

    $('.remove').click(function(){
        id = $(this).data('id');
        $('#confirm').modal('show');
        $('.confirm').click(function(){
            removeActType(id);
        })
    });

    function editActType(id) {
        $.ajax({
            url: "acttypes/" + id + "/edit"
            , type: 'get'
            , dataType: "JSON"
            , data: {}
            , success: function(data) {
                $('#editname').val(data.name);
                $('#parentactedit option').removeAttr('selected');
                $('#parentactedit option[value="'+data.parent_act_id+'"]').attr('selected', 'selected');
                $('#editActType form').attr('action', "{{ route('acttypes.index') }}/" + id, );
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
</script>

@endsection