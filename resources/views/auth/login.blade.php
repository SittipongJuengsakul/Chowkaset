@extends('app')
@section('title', 'เข้าสู่ระบบ')
@section('content')
<div class="container-fluid">
<script>
		$(document).ready(function() {
		  $(".nav-toggle" ).click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');					
			
			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).fadeToggle(function(){
			  
			});
		  });
		});	
</script>
	<div class="row">
		<div class="col-md-8">
			<div class="panel box-default" style="min-height: 500px;">
				<div class="panel-heading">
					<h3 class="head-col">คำถามที่พบบ่อย</h3>
					<hr>
				</div>
				<div class="panel-body" style="padding-top: 0px;">
					<div class="help-box">
						<div class="help-box-header nav-toggle" href="#help-box-content1">
							<h4 class="content-head-col"><i> - </i>เข้าสู่ระบบอย่างไร ?</h4>
						</div>
						<div id="help-box-content1" style="display:none">
							<h5 class="content-body-col">1.เลือกที่ปุ่ม Login</h5>
						</div>
					</div>
					<div class="help-box">
						<div class="help-box-header nav-toggle" href="#help-box-content2">
							<h4 class="content-head-col"><i> - </i>สมัครสมาชิกอย่างไร ?</h4>
						</div>
						<div id="help-box-content2" style="display:none">
							<h5 class="content-body-col">1.เลือกที่ปุ่ม สมัครสมาชิก</h5>
						</div>
					</div>
					<div class="help-box">
						<div class="help-box-header nav-toggle" href="#help-box-content3">
							<h4 class="content-head-col"><i> - </i>ลืมรหัสผ่านทำอย่างไร ?</h4>
						</div>
						<div id="help-box-content3" style="display:none">
							<h5 class="content-body-col">1.เลือกที่ปุ่ม ลืมรหัสผ่าน</h5>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel box-default">
				<div class="panel-heading"><h3 class="head-col">เข้าสู่ระบบ</h3>
				<hr>
			</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>!</strong> เกิดปัญหา<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-12">
								<input type="email" class="form-control input-cks-form" name="email" value="{{ old('email') }}" placeholder="โปรดกรอก Email">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<input type="password" class="form-control input-cks-form" name="password" placeholder="โปรดกรอก Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> จดจำรหัสผ่าน
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<button type="submit" class="btn-cks-full btn-color-green">เข้าสู่ระบบ</button>
							</div>
							<div class="col-md-6" style="padding-right: 0px;">
								<a class="btn-cks-full btn btn-color-blue" href="{{ url('/auth/register') }}">สมัครสมาชิก</a>
							</div>
							<div class="col-md-6" style="padding-left: 0px;">
								<a class="btn-cks-full btn btn-color-orange" href="{{ url('/password/email') }}">ลืมรหัสผ่าน</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
