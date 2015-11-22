<div id="community" class="tab-pane fade">
	<div class="col-md-12 main-content">
		     <div class="col-md-12 menu-content">
		       <div class="col-md-1">
			    	<i class="fa fa-search search_icon"></i>
			   </div>
			   <div class="col-md-2">
				<select data-placeholder="เลือกจังหวัด" class="form-control chosen-select" id="com_province_area" name="province">
				   <option value="49">กำแพงเพชร</option>
				   <option value="1">กรุงเทพ</option>
				</select>
			     </div>
				 <div class="col-md-2">
					<select data-placeholder="เลือกอำเภอ" class="form-control" id="com_aumphur_area" name="aumphur">
					<option value="0">เลือกอำเภอ</option>
					</select>
				</div>
				<div class="col-md-2">
					<select data-placeholder="เลือกตำบล" class="form-control" tabindex="3" id="com_district_area" name="district">
					   <option value="0">เลือกตำบล</option>
					</select>
		 		</div>
		     </div>
		    <div class="col-md-12 officer-main-content" id="com_detail_area" style="display:block;">
		    	<button id="officer_add_com" type="button" class="btn btn-info btn-add">เพิ่มรายขื่อศูนย์ข้าวชุมชน</button>
			    	<table class="table table-bordered">
					  <thead>
					  	<tr>
					  		<th width="5%">ลำดับ</th>
					  		<th width="27%">ชื่อศูนย์ข้าว</th>
					  		<th width="15%">เบอร์โทรศัพท์</th>
					  		<th width="15%">อีเมล์</th>
					  		<th width="27%">ที่อยู่</th>
					  		<th width="10%">ปรับแต่ง</th>
					  	</tr>
					  </thead>
					  <tbody id="com_show_area">
						<tr>
							<td colspan="6">ไม่มีข้อมูล</td>
						</tr>
					  </tbody>
					</table>
		  	</div>
		  	<div class="col-md-12 officer-main-content" style="display:none;" id="com_add_area">
		  	<button id="officer_add_cancle_top_com" type="button" class="btn btn-danger btn-add">ยกเลิกการเพิ่มรายชื่อ</button>
		  	<form class="form-horizontal" role="form" method="post" action="{{ url('/auth/officer/addProfile/commit')}}">
				<div class="panel-heading"><h2 class="head-col">เพิ่มข้อมูลเกษตรกร</h2><hr></div>
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
					        <input type="text" class="form-control" id="text" placeholder="ชื่อ" data-validation="required" value="" name="fname">
					      </div>
					      <div class="col-md-3">
					        <input type="text" class="form-control" id="text" placeholder="นามสกุล" data-validation="required" value="" name="lname">
					      </div>
					      <div class="col-md-4">
					        <input type="text" class="form-control" id="text" placeholder="รหัสบัตรประชาชน" data-validation="number length" data-validation-length="13" data-validation-help="เช่น 1234567890123" value="" name="card_id">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-6">
					        <input type="text" class="form-control" id="text" placeholder="ที่อยู่" value="" name="address">
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกจังหวัด" class="form-control" id="add_province_area" name="province">
				            <option value="49">กำแพงเพชร</option>
				            <option value="1">กรุงเทพ</option>
				    		</select>
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกอำเภอ" class="form-control" id="add_aumphur_area" name="aumphur">
					        <option value="0">เลือกอำเภอ</option>
				    		</select>
					      </div>
					      <div class="col-md-2">
					        <select data-placeholder="เลือกตำบล" class="form-control" tabindex="3" id="add_district_area" name="district">
				            <option value="0">เลือกตำบล</option>
				    		</select>
					      </div>
					    </div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลสังกัด</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
							<select data-placeholder="เลือกศูนย์ข้าว" class="form-control" id="add_farmer_farmercomunity_area" name="farmercomunity">
					        <option value="1">เลือกศูนย์ข้าว</option>
				    		</select>
					    </div>
					</div>
				</div>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลติดต่อ</h2><hr></div>
				<div class="panel-body">
					<div class="form-group">
					    <div class="col-md-4 col-sm-4 col-xs-4">
					        <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" data-validation="number length" data-validation-length="10" data-validation-help="เช่น 08123456789" value="">
					    </div>
					     <div class="col-md-4 col-sm-4 col-xs-4">
					        <input type="email" class="form-control" id="email" placeholder="อีเมล์" data-validation="email" data-validation-help="เช่น chowkaset@nectec.com" value="" name="email">
					    </div>
					    <div class="col-md-4 col-sm-4 col-xs-4">
					        <input type="text" class="form-control" id="email" placeholder="เฟสบุ้ก" data-validation-help="เช่น https://www.facebook.com/nectec" value="" name="facebook">
					    </div>
					    <!--<div class="col-md-4 col-sm-4 col-xs-4">
					     	<button type="button" class="btn btn-success">เพิ่ม</button>
					     	<button type="button" class="btn btn-danger">ลบ</button>
					    </div>-->
					</div>
					<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="submit" class="btn btn-success">ตกลง</button>
							<button type="button" class="btn btn-danger" id="officer_add_cancle_com">ยกเลิก</button>
						</div>
					</div>
				</div>
				</form>
		  	</div>
	</div>
</div>
<script>
// JavaScript Document
$(document).ready(function(){
	//ค่าเริ่มต้น
	$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#com_province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  opt += '<option value="0">เลือกอำเภอ</option>';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#com_aumphur_area").html(opt);
		   	  $("#district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#com_aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  opt += '<option value="0">เลือกตำบล</option>';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#district_area").html(opt);
				});	
		});	
		$.ajax({
		  url: site_url+"/api/v1.0/com_in_province/"+$("#com_province_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.fmcm_name+'</td>';
				   	var phone = value.tel[0]+value.tel[1]+value.tel[2]+"-"+value.tel[3]+value.tel[4]+value.tel[5]+value.tel[6]+value.tel[7]+value.tel[8];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+value.email+'</td>';
				   	opt+= '<td>'+value.address+'</td>';
				   	opt+= '<td><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลศูนย์ชุมชน</td></tr>';
			}
		   	$("#com_show_area").html(opt);
		});

	// ส่วนของจังหวัดเมื่อมีการเปลี่ยนแปลง
	$("#com_province_area").change(function(){
		$("#com_aumphur_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#com_province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  opt += '<option value="0">เลือกอำเภอ</option>';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#com_aumphur_area").html(opt);
		   	  $("#com_district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#com_aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  opt += '<option value="0">เลือกตำบล</option>';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#com_district_area").html(opt);
				});	
		});	
		$.ajax({
		  url: site_url+"/api/v1.0/com_in_province/"+$("#com_province_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.fmcm_name+'</td>';
				   	var phone = value.tel[0]+value.tel[1]+value.tel[2]+"-"+value.tel[3]+value.tel[4]+value.tel[5]+value.tel[6]+value.tel[7]+value.tel[8];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+value.email+'</td>';
				   	opt+= '<td>'+value.address+'</td>';
				   	opt+= '<td><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลศูนย์ชุมชน</td></tr>';
			}
		   	$("#com_show_area").html(opt);
		});
	});
	// ส่วนของอำเภอเมื่อมีการเปลี่ยนแปลง
	$("#com_aumphur_area").change(function(){
		$("#com_district_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/district/"+$("#com_aumphur_area").val()
		}).then(function(districts) {
		   	  var opt = '';
		   	  	opt += '<option value="0">เลือกตำบล</option>';
		   	  $.each(districts, function(index, value) {
		   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
		   	  });
		   	  $("#com_district_area").html(opt);

		});
		//search
		$.ajax({
		  url: site_url+"/api/v1.0/com_in_aumphur/"+$("#com_aumphur_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.fmcm_name+'</td>';
				   	var phone = value.tel[0]+value.tel[1]+value.tel[2]+"-"+value.tel[3]+value.tel[4]+value.tel[5]+value.tel[6]+value.tel[7]+value.tel[8];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+value.email+'</td>';
				   	opt+= '<td>'+value.address+'</td>';
				   	opt+= '<td><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลศูนย์ชุมชน</td></tr>';
			}
		   	$("#com_show_area").html(opt);
		});

	});
// ส่วนของตำบลเมื่อมีการเปลี่ยนแปลง
	$("#com_district_area").change(function(){
		//search
		$.ajax({
		  url: site_url+"/api/v1.0/com_in_district/"+$("#com_district_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.fmcm_name+'</td>';
			   	  	var phone = value.tel[0]+value.tel[1]+value.tel[2]+"-"+value.tel[3]+value.tel[4]+value.tel[5]+value.tel[6]+value.tel[7]+value.tel[8];
				   	opt+= '<td>'+phone+'</td>';
				   	opt+= '<td>'+value.email+'</td>';
				   	opt+= '<td>'+value.address+'</td>';
				   	opt+= '<td><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="6">ไม่มีข้อมูลศูนย์ชุมชน</td></tr>';
			}
			//$("#name_table_area").html('รายชื่อเกษตรกรตำบล : '+$("#com_district_area option:selected").html());
		   	$("#com_show_area").html(opt);
		});
	});
});
// เพิ่มชาวเกษตร
	$("#officer_add_com").click(function(){
		$("#com_detail_area").hide();
		$("#com_add_area").show();
	});
	$("#officer_add_cancle_com").click(function(){
		$("#com_add_area").hide();
		$("#com_detail_area").show();
	});
	$("#officer_add_cancle_top_com").click(function(){
		$("#com_add_area").hide();
		$("#com_detail_area").show();
	});
$(document).ready(function(){
	//ค่าเริ่มต้น
	$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#add_province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#add_aumphur_area").html(opt);
		   	  $("#add_district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#add_aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#add_district_area").html(opt);
				});	
		});	
		$.ajax({
		  url: site_url+"/api/v1.0/farmercomunity"
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.fmcm_id+'">'+value.fmcm_name+'</option>';
		   	  });
		   	  $("#add_farmer_farmercomunity_area").html(opt);
		});	

	// ส่วนของจังหวัดเมื่อมีการเปลี่ยนแปลง
	$("#add_province_area").change(function(){
		$("#add_aumphur_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#add_province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#add_aumphur_area").html(opt);
		   	  $("#add_district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#add_aumphur_area").val()
				}).then(function(districts) {
				   	  var opt = '';
				   	  $.each(districts, function(index, value) {
				   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
				   	  });
				   	  $("#add_district_area").html(opt);
				});	
		});	
	});
	// ส่วนของอำเภอเมื่อมีการเปลี่ยนแปลง
	$("#add_aumphur_area").change(function(){
		$("#add_district_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/district/"+$("#add_aumphur_area").val()
		}).then(function(districts) {
		   	  var opt = '';
		   	  $.each(districts, function(index, value) {
		   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
		   	  });
		   	  $("#add_district_area").html(opt);

		});	
	});
});
</script>

