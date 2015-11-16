@extends('app')
@section('title', 'แก้ใขข้อมูลส่วนตัว')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel box-default">
			<form class="form-horizontal" role="form" method="post" action="{{ url('/auth/changeprofile/commit')}}">
			<input type="hidden" name="form_id" value="{{ $profile[0]->pf_id }}">
				<div class="panel-heading"><h2 class="head-col">ข้อมูลส่วนตัว</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
					      <div class="col-md-2">
					        <select data-placeholder="คำนำหน้าชื่อ" class="form-control" name="prefix_id">
				            <option value="1">นาย</option>
				            <option value="2">นาง</option>
				            <option value="3">นางสาว</option>
				    		</select>
					      </div>
					      <div class="col-md-3">
					        <input type="text" class="form-control" id="text" placeholder="ชื่อ" data-validation="required" value="{{ $profile[0]->fname }}" name="fname">
					      </div>
					      <div class="col-md-3">
					        <input type="text" class="form-control" id="text" placeholder="นามสกุล" data-validation="required" value="{{ $profile[0]->lname }}" name="lname">
					      </div>
					      <div class="col-md-4">
					        <input type="text" class="form-control" id="text" placeholder="รหัสบัตรประชาชน" data-validation="number length" data-validation-length="13" data-validation-help="เช่น 1234567890123" value="{{ $profile[0]->card_id }}" name="card_id">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-6">
					        <input type="text" class="form-control" id="text" placeholder="ที่อยู่" value="{{ $profile[0]->address }}" name="address">
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกจังหวัด" class="form-control chosen-select" id="province_area" name="province">
				            <option value="49">กำแพงเพชร</option>
				            <option value="1">กรุงเทพ</option>
				    		</select>
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกอำเภอ" class="form-control" id="aumphur_area" name="aumphur">
					        <option value="0">เลือกอำเภอ</option>
				    		</select>
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกตำบล" class="form-control" tabindex="3" id="district_area" name="district">
				            <option value="0">เลือกตำบล</option>
				    		</select>
					      </div>
					    </div>
					    <script type="text/javascript">
						    var config = {
						      '.chosen-select'           : {},
						      '.chosen-select-deselect'  : {allow_single_deselect:true},
						      '.chosen-select-no-single' : {disable_search_threshold:10},
						      '.chosen-select-no-results': {no_results_text:'ไม่พบข้อมูลที่ค้นหา !'},
						      '.chosen-select-width'     : {width:"95%"}
						    }
						    for (var selector in config) {
						      $(selector).chosen(config[selector]);
						    }
						  	</script>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลสังกัด</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
							<select data-placeholder="เลือกศูนย์ข้าว" class="form-control" id="farmercomunity_area" name="farmercomunity">
					        <option value="1">เลือกศูนย์ข้าว</option>
				    		</select>
					    </div>
					</div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลติดต่อ</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
					    	<input type="hidden" name="phone_id" value="{{ $phone[0]->ct_id }}">
					        <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" data-validation="number length" data-validation-length="10" data-validation-help="เช่น 08123456789" value="{{ $phone[0]->ct_detail }}">
					    </div>
					     <div class="col-md-4 col-sm-4 col-xs-4">
					     <input type="hidden" name="email_id" value="{{ $email[0]->ct_id }}">
					        <input type="email" class="form-control" id="email" placeholder="อีเมล์" data-validation="email" data-validation-help="เช่น chowkaset@nectec.com" value="{{ $email[0]->ct_detail }}" name="email">
					    </div>
					    <div class="col-md-4 col-sm-4 col-xs-4">
					    <input type="hidden" name="facebook_id" value="{{ $facebook[0]->ct_id }}">
					        <input type="text" class="form-control" id="email" placeholder="เฟสบุ้ก" data-validation-help="เช่น https://www.facebook.com/nectec" value="{{ $facebook[0]->ct_detail }}" name="facebook">
					    </div>
					    <!--<div class="col-md-4 col-sm-4 col-xs-4">
					     	<button type="button" class="btn btn-success">เพิ่ม</button>
					     	<button type="button" class="btn btn-danger">ลบ</button>
					    </div>-->
					</div>
					<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="submit" class="btn btn-success">ตกลง</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
					$.validate({
						modules: 'security, server,file',
							onModulesLoaded: function () {
								$('input[name="pass_confirmation"]').displayPasswordStrength();
							}
					});
					// JavaScript Document
$(document).ready(function(){
	//ค่าเริ่มต้น
	$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#aumphur_area").html(opt);
		   	  $("#district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#district_area").html(opt);
				});	
		});	
		
		$.ajax({
		  url: site_url+"/api/v1.0/farmercomunity"
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.fmcm_id+'">'+value.fmcm_name+'</option>';
		   	  });
		   	  $("#farmercomunity_area").html(opt);
		});	

	// ส่วนของจังหวัดเมื่อมีการเปลี่ยนแปลง
	$("#province_area").change(function(){
		$("#aumphur_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#aumphur_area").html(opt);
		   	  $("#district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#district_area").html(opt);
				});	
		});	
	});
	// ส่วนของอำเภอเมื่อมีการเปลี่ยนแปลง
	$("#aumphur_area").change(function(){
		$("#district_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
		}).then(function(districts) {
		   	  var opt = '';
		   	  $.each(districts, function(index, value) {
		   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
		   	  });
		   	  $("#district_area").html(opt);

		});	
	});
});
</script>
@endsection
