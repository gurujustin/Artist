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
                            <div class="btn-group pull-right">
                                <button
                                    class="btn btn-small btn-white btn-demo-space">{{ App\Models\Menu::find($current_menu)->name }}</button>
                                <button class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                    data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach ($menus as $menu)
                                    <li class="@if($current_menu == $menu->id){{ 'active' }}@endif"><a
                                            href="{{ action('admin\MenuController@menu', ['id' => $menu->id]) }}">{{ $menu->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Page Name</th>
                                            <th>Slug</th>
                                            <th class="all" style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Models\Page::whereIn('id', $pagenums)->where('status_id',
                                        1)->get() as $item)
                                        <tr class="odd" item-id="{{ $item->id }}">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td style="text-align: right">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" hidden>
                                                        <li>
                                                            <a onclick="document.getElementById('removepage{{ $item->id }}').submit()">Remove from Menu</a>
                                                            <form
                                                                action="{{ action('admin\MenuController@removepage', ['id' => $current_menu]) }}"
                                                                method="POST" id="removepage{{ $item->id }}">
                                                                @csrf
                                                                <input type="hidden" value="{{ $item->id }}" name="page">
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url($item->slug) }}" target="_blank">View Page</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ action('admin\PageController@edit', ['page' => $item->id]) }}">Edit Page</a>
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
                    <button class="btn btn-danger btn-cons" data-toggle="modal" data-target="#createmenu">
                        Create New Menu
                    </button>
                    <button class="btn btn-danger btn-cons" data-toggle="modal" data-target="#removemenu">
                        Remove This Menu
                    </button>
                    <button class="btn btn-danger btn-cons" data-toggle="modal" data-target="#addpage">
                        Add Page
                    </button>
                </div>
            </div>
        </div>
        <!-- END PAGE -->
    </div>
</div>
<div class="modal fade" id="removemenu" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="{{ action('admin\MenuController@destroy', ['id' => $current_menu]) }}" method="POST">
        @csrf
        @method('delete')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Confirm</h4>
                </div>
                <div class="modal-body">
                    <label class="text-center">Are you sure you want to remove this menu?</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </form>
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
<div class="modal fade" id="addpage" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ action('admin\MenuController@addpage', ['id' => $current_menu]) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Add Page</h4>
                </div>
                <div class="modal-body">
                    <label for="page">Pages</label>
                    <select class="form-control" name="page">
                        @foreach (App\Models\Page::whereNotIn('id', $pagenums)->where('status_id',
                        1)->get() as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
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