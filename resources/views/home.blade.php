@extends('app')

@section('title', 'หน้าหลัก')

@section('content')
	
	{!! $map['js'] !!}
	
	{!! $map['html'] !!}
	

	
	<script src="{{ URL::asset('assets/js/interact-1.2.5.min.js') }}"></script>
	<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        window.location.hash = '';
    }
	</script>
	<script>
	 $( document ).ready(function() {
	    //create Element Menu
	    //var map_canvas = document.getElementById('map_canvas');
	    //var dashboard_menu = document.createElement('div');
	    //dashboard_menu.setAttribute('id','chowkaset_dashboard_menu');
	    //map_canvas.appendChild(dashboard_menu);
	    //alert
	});
	 </script>
@stop