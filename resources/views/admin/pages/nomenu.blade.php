@extends('admin.layouts.app')
@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Menus </h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Our <span class="semi-bold">Menus</span>
                            </h4>
                        </div>
                        <span class="refresh">
                            <div class="grid-body ">
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger btn-cons" data-toggle="modal" data-target="#createmenu">
                        Create New Menu
                    </button>
                </div>
            </div>
        </div>
        <!-- END PAGE -->
    </div>
</div>
<div class="modal fade" id="createmenu" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ action('admin\MenuController@store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Add Menu</h4>
                </div>
                <div class="modal-body">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                    <label for="sort_num">Pages</label>
                    <select class="form-control" name="sort_num[]" multiple required>
                        @foreach ($pages as $page)
                        <option value="{{ $page->id }}">{{ $page->title }}</option>                            
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger confirm">Submit</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
            </div>
        </form>
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