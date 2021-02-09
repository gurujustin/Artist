<script src="{{ asset('adminn/assets/plugins/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('adminn/assets/plugins/boostrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/breakpoints.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('adminn/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('adminn/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js') }}" type="text/javascript">
</script>
<script src="{{ asset('adminn/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('adminn/assets/plugins/jquery-block-ui/jqueryblockui.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/bootstrap-select2/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-ricksaw-chart/js/raphael-min.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-ricksaw-chart/js/d3.v2.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-morris-chart/js/morris.min.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-slider/jquery.sidr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-sparkline/jquery-sparkline.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/jquery-flot/jquery.flot.animator.min.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/skycons/skycons.js') }}"></script>
<script src="{{ asset('adminn/assets/plugins/data-tables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/data-tables/datatables.bootstrap.js') }}" type="text/javascript"></script>

<script src="{{asset('adminn/assets/plugins/jquery-notifications/js/messenger.js')}}" type="text/javascript"></script>
<script src="{{asset('adminn/assets/plugins/jquery-notifications/js/messenger-theme-flat.js')}}" type="text/javascript">
</script>
<script src="{{ asset('adminn/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}" type="text/javascript">
</script>
<!-- END PAGE LEVEL PLUGINS   -->
<!-- PAGE JS -->
<script src="{{ asset('adminn/assets/js/table-datatables-responsive.js') }}"></script>
<script>
    (function($){
        window.onbeforeunload = function(e){
            window.name += ' [' + $(window).scrollTop().toString() + '[' + $(window).scrollLeft().toString();
        };
        $.maintainscroll = function() {
            if(window.name.indexOf('[') > 0)
            {
                var parts = window.name.split('[');
                window.name = $.trim(parts[0]);
                window.scrollTo(parseInt(parts[parts.length - 1]), parseInt(parts[parts.length - 2]));
            }
        };
        $.maintainscroll();
    })(jQuery);
</script>
