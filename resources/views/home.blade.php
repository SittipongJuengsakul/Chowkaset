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
	 $.validate({
	 modules: 'security, file',
		 onModulesLoaded: function () {
		 	$('input[name="pass_confirmation"]').displayPasswordStrength();
		 }
	 });
	 </script>
@stop