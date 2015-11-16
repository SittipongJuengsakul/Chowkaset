<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ชาวเกษตร - @yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/reset.css'); !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/bootstrap.min.css'); !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/font-awesome.min.css'); !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/bootstrap-theme.min.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/component-nav.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/chowkaset-style.min.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/datepicker.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/validator.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/chosen/prism.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('assets/css/chosen/chosen.min.css') !!}">
	<script src="{{ URL::asset('assets/js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/chowkaset_farmmanagement.js') }}"></script>
	<script src="{{ URL::asset('assets/js/chowkaset-js.js') }}"></script>
	<script src="{{ URL::asset('assets/js/chowkasetAuth.js') }}"></script>
	<script src="{{ URL::asset('assets/js/validateform/jquery.form.validator.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/validateform/security.js') }}"></script>
	<script src="{{ URL::asset('assets/js/validateform/file.js') }}"></script>
	<script src="{{ URL::asset('assets/js/chosen.jquery.min.js') }}"></script>
	<!--<script src="{{ URL::asset('assets/js/interact-1.2.5.min.js') }}"></script>-->
	<script src="{{ URL::asset('assets/js/sidebar_slide/jquery.sidebar.min.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
	    <div class="chowkaset-nav">
	    	@include('layout.header')
	    </div>
		<div class="chowkaset-content">
			@yield('content')
		</div>
    </div>
    <script src="{{ URL::asset('assets/js/classie.js') }}"></script>
	<script src="{{ URL::asset('assets/js/gnmenu.js') }}"></script>
	<script src="{{ URL::asset('assets/js/highcharts/highcharts.js') }}"></script>
	<script src="{{ URL::asset('assets/js/highcharts/exporting.js') }}"></script>
	<script>
		new gnMenu( document.getElementById( 'gn-menu' ) );
		var csrf_token_js = '{{ csrf_token() }}';
		var user_fname = '';
		var user_lname = '';
		var user_picture = '';
		var user_tel = '';
		var pin_map;
		var user_facebook = '';
		var user_address = '';
		var user_id = '';
		var site_url = '{{ URL::to("/")}}';
		var base_url = '{{ URL::asset("/")}}';
	</script>
	@if (Auth::guest())
		<script>
			user_fname = '';
			user_lname = '';
			user_picture = '';
			user_tel = '';
			user_facebook = '';
			user_address = '';
			user_id = ''
			<?php $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP))
	    {
	        $ip = $client;
	    }
	    elseif(filter_var($forward, FILTER_VALIDATE_IP))
	    {
	        $ip = $forward;
	    }
	    else
	    {
	        $ip = $remote;
	    }

	    if($ip=='::1'){
	    	$ip = '127.0.0.1';
	    }
	    ?>
	    user_ip = '{{ $ip }}';
		</script>
	@else
	<script>
		user_id = '{{ Auth::user()->id }}';
		user_fname = '{{ Auth::user()->fname }}';
		user_lname = '{{ Auth::user()->lname }}';
		user_picture = "{{ URL::asset('assets/img/user') }}/{{ Auth::user()->picture }}";
		user_tel = '{{ Auth::user()->tel }}';
		user_facebook = '{{ Auth::user()->facebook }}';
		user_address = '{{ Auth::user()->address }}';
		//create_dashboard_row();
		<?php $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP))
	    {
	        $ip = $client;
	    }
	    elseif(filter_var($forward, FILTER_VALIDATE_IP))
	    {
	        $ip = $forward;
	    }
	    else
	    {
	        $ip = $remote;
	    }
	    if($ip=='::1'){
	    	$ip = '127.0.0.1';
	    }
	    ?>
	    user_ip = '{{ $ip }}';
	</script>
	@endif
</body>
</html>