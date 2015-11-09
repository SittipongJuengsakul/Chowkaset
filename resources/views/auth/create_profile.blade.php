@extends('app')
@section('title', 'เพิ่มข้อมูลส่วนตัว')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel box-default">
				<div class="panel-heading"><h2 class="head-col">ข้อมูลส่วนตัว</h2><hr></div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/profile/commit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-2 control-label">คำนำหน้า</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-cks-form" data-validation="required" name="fname">
							</div>
							<label class="col-md-1 control-label">ชื่อ</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-cks-form" data-validation="required" name="fname">
							</div>
							<label class="col-md-1 control-label">นามสกุล</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-cks-form" data-validation="required" name="lname">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">รหัสบัตรประชาชน</label>
							<div class="col-md-5">
								<input type="text"  data-validation="number length" data-validation-length="13" class="form-control input-cks-form" name="card_id">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Facebook</label>
							<div class="col-md-5">
								<input type="text" class="form-control input-cks-form" name="facebook">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">เบอร์โทรศัพท​์</label>
							<div class="col-md-5">
								<input type="text" class="form-control input-cks-form" name="tel">
							</div>
						</div>
						

						<div class="form-group">
							<div class="col-md-8 col-md-offset-2">
								<button type="submit" class="btn-cks-full btn-color-green">
										เพิ่มข้อมูลส่วนตัว
								</button>
								<a href="{{ URL::to('/') }}"><button type="button" class="btn-cks-full btn-color-red">
										ยกเลิก
								</button></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
					$.validate({
						modules: 'security, file',
							onModulesLoaded: function () {
								$('input[name="pass_confirmation"]').displayPasswordStrength();
							}
					});
</script>
@endsection
