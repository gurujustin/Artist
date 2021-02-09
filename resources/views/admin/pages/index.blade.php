@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="content">
        <div class="page-title">
            <h3>Web Pages</h3>
        </div>
        <!-- ID CONTAINER -->
        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Current <span class="semi-bold">Web Pages</span>
                            </h4>
                        </div>
                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Created</th>
                                            <th class="all" style="text-align: center">Status</th>
                                            <th class="all" style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $page)
                                        <tr class="odd" page-id="{{ $page->id }}">
                                            <td>{{ $page->id }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->slug }}</td>
                                            <td>{{ with($page->created_at)->format('d/m/y h:i A') }}</td>
                                            <td style="text-align: center">
                                                <span
                                                    class="label label-@if($page->status_id == 2){{ 'important' }}@else{{ 'info' }}@endif">{{ $page->status->name1 }}</span>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('pages.edit', ['page' => $page->id]) }}">Edit
                                                                Web Page</a></li>
                                                        <li>
                                                            <a href="{{ url($page->slug) }}" target="_blank">View
                                                                Page</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ route('pages.changeStatus', ['page' => $page->id]) }}">
                                                                @if($page->status_id == 1)
                                                                Disable Web Page
                                                                @else
                                                                Active Web Page
                                                                @endif
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"
                                                                onclick="document.getElementById('page-remove').submit();">
                                                                Remove Web Page</a>
                                                            <form
                                                                action="{{ route('pages.destroy', ['page' => $page->id]) }}"
                                                                method="POST" id="page-remove">
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