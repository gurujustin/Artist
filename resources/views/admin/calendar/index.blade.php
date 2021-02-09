@extends('admin.layouts.app')

@section('styles')
<link href="{{asset('adminn/assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" media="screen"/>
@endsection
@section('title', 'Calendar')
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
      <div class="row" style="max-height:600px;">
          <div class="col-md-2"></div>
          <div class="col-md-8 tiles white no-padding" style="text-align:center">
            <div class="tiles-body">
              <div class="full-calender-header">
                <div class="pull-left">
                  <div class="btn-group ">
                    <button class="btn btn-success" id="calender-prev"><i class="fa fa-angle-left"></i></button>
                    <button class="btn btn-success" id="calender-next"><i class="fa fa-angle-right"></i></button>
                  </div>
                </div>
                <div class="pull-right">
                    <h3 class="text-white semi-bold" id="calender-current-day" style="color: #444!important"></h3>
                    <h2 class="text-white" id="calender-current-date" style="color: #444!important"></h2>
                </div>
                <div class="clearfix"></div>
              </div>
              <div id='calendar'></div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
<!-- END CONTAINER -->
@endsection
@section('scripts')
<script>
    appoints = [];
    @foreach($bookings as $booking)
        appoints.push({
            title: '{{$booking->pricelocation->artist->fullname}}',
            start: '{{substr($booking->datetime,0,10)}}',
            end: '{{substr($booking->datetime,0,10)}}',
            id: '{{$booking->id}}'
        });
    @endforeach
</script>
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{asset('adminn/assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- PAGE JS -->
<script src="{{asset('adminn/assets/js/calender.js')}}" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
@endsection
