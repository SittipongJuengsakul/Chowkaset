@extends('app')
@section('title', 'เจ้าหน้าที่')
@section('content')
	@include('officer.header')
	<div id="officer_content">
		<div class="tab-content">
			<!-- ////////////  farmer content //////////////  -->
		  	@include('officer.farmer')
		  	<!-- ////////////  plan content //////////////  -->
		  	@include('officer.plan')
		  	<!-- ////////////  community content //////////////  -->
		  	@include('officer.community')
		</div>
	</div>
<script>
$.validate({
	modules: 'security, server,file',
	onModulesLoaded: function () {
		$('input[name="pass_confirmation"]').displayPasswordStrength();
	}
});
</script>
@stop