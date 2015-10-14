@extends('app')
@section('title', 'สมัครสมาชิก')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel box-default">
				<div class="panel-heading"><h2 class="head-col">สมัครสมาชิก</h2><hr></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-2 control-label">ชื่อ</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-cks-form" name="fname" value="{{ old('fname') }}">
							</div>
							<label class="col-md-2 control-label">นามสกุล</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-cks-form" name="lname" value="{{ old('lname') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">อีเมล์</label>
							<div class="col-md-8">
								<input type="email" class="form-control input-cks-form" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">รหัสผ่าน</label>
							<div class="col-md-8">
								<input type="password" class="form-control input-cks-form" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">ยืนยันรหัสผ่าน</label>
							<div class="col-md-8">
								<input type="password" class="form-control input-cks-form" name="password_confirmation">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">ที่อยู่</label>
							<div class="col-md-8">
								<textarea class="form-control input-cks-form" name="address" value="{{ old('address') }}"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">รหัสบัตรประชาชน</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="card_id" value="{{ old('card_id') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">วัน/เดือน/ปีเกิด</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="birthday" value="{{ old('birthday') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Facebook</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="facebook" value="{{ old('facebook') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">เบอร์โทรศัพท​์</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="tel" value="{{ old('tel') }}">
							</div>
						</div>
						

						<div class="form-group">
							<div class="col-md-8 col-md-offset-2">
								<button type="submit" class="btn-cks-full btn-color-green ">
									สมัครสมาชิก
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
