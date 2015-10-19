@extends('app')

@section('title', 'หน้าหลัก')

@section('content')
	
	{!! $map['js'] !!}
	
	{!! $map['html'] !!}
	
	<script src="{{ URL::asset('assets/js/interact-1.2.5.min.js') }}"></script>
@stop