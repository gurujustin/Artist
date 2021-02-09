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
            <h3>Categories</h3>
        </div>
        <!-- ID CONTAINER -->

        <div id="container">
            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                Our <span class="semi-bold">Categories</span>
                            </h4>
                        </div>

                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr class="odd">
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>{{count($category->blog)}}</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('category.edit', ['category'=>$category->id]) }}">Edit</a></li>
                                                        <li>
                                                            <a onclick="document.getElementById('deleteform{{$category->id}}').submit();" href="javascript:;">Delete</a>
                                                            <form action="{{route('category.destroy', ['category'=>$category->id])}}" method="POST" id="deleteform{{$category->id}}">
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
</div>

@endsection
@section('scripts')
    @if ($msg = Session::get('success'))
        <script>
            $(document).ready(function () {
                Messenger().post({
                    message: "{{$msg}}",
                    type: 'success',
                    showCloseButton: true
                });
            });
        </script>
    @endif
@endsection
