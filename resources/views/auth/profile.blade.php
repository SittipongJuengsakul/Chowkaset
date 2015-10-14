@extends('app')
@section('title', 'แก้ใขข้อมูลส่วนตัว')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel box-default">
				<div class="panel-heading"><h2 class="head-col">แก้ใขข้อมูลส่วนตัว</h2><hr></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>ขัดข้อง!</strong> มีปัญหาจากการป้อมข้อมูล<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/changeprofile/commit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-2 control-label">ชื่อ</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-cks-form" name="fname" value="{{ $profile[0]->fname }}">
							</div>
							<label class="col-md-2 control-label">นามสกุล</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-cks-form" name="lname" value="{{ $profile[0]->lname }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">อีเมล์</label>
							<div class="col-md-8">
								<input type="email" class="form-control input-cks-form" name="email" value="{{ $profile[0]->email }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">ที่อยู่</label>
							<div class="col-md-8">
								<textarea class="form-control input-cks-form" name="address">{{ $profile[0]->address }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">รหัสบัตรประชาชน</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="card_id" value="{{ $profile[0]->card_id }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">วัน/เดือน/ปีเกิด</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="birthday" value="{{ $profile[0]->birthday }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Facebook</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="facebook" value="{{ $profile[0]->facebook }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">เบอร์โทรศัพท​์</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-cks-form" name="tel" value="{{ $profile[0]->tel }}">
							</div>
						</div>
						

						<div class="form-group">
							<div class="col-md-8 col-md-offset-2">
								<button type="submit" class="btn-cks-full btn-color-green">
										แก้ใขข้อมูล
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
@endsection
