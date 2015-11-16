@extends('app')
@section('title', 'ห้องพูดคุยชาวเกษตร')
@section('content')
	<div id="officer_header">
		<div class="box-left">
			<ul class="nav nav-pills chatkaset_nav">
			  <li class="active"><a data-toggle="pill" href="#farmer"><i class="fa fa-user"></i>   เกษตรกร</a></li>
			  <!--<li><a data-toggle="pill" href="#breeds"><i class="fa fa-leaf"></i>   พันธุ์พืช</a></li>-->
			  <li><a data-toggle="pill" href="#plans"><i class="fa fa-calendar"></i>   แผนเพาะปลูก</a></li>
			  <li><a data-toggle="pill" href="#community"><i class="fa fa-calendar"></i>   ศูนย์ข้าว</a></li>
			</ul>
		</div>
	</div>
	<div id="officer_content">
		<div class="tab-content">
		  <div id="farmer" class="tab-pane fade in active">
		    <div class="col-md-12 menu-content">
			 <div class="col-md-1">
			    <i class="fa fa-search search_icon"></i>
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
		    <div class="col-md-12 officer-main-content">
		    	<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th width="5%">ลำดับ</th>
				  		<th width="30%">ชื่อ</th>
				  		<th width="15%">เบอร์โทรศัพท์</th>
				  		<th width="20%">อีเมล์</th>
				  		<th width="30%">สังกัด</th>
				  	</tr>
				  </thead>
				  <tbody id="farmer_show_area">
					<tr>
						<td colspan="5">ไม่มีข้อมูล</td>
					</tr>
				  </tbody>
				</table>
		  	</div>
		  </div>
		  <!--<div id="breeds" class="tab-pane fade">
		    <div class="col-md-12 menu-content">
		    	<div>21111222</div>
		    </div>
		    <div class="col-md-12 officer-main-content">
		    	<div>222</div>
		  	</div>
		  </div>-->
		  <div id="plans" class="tab-pane fade">
		    <div class="col-md-12 main-content">
		     <div class="col-md-12 menu-content">
		       <div class="col-md-1">
			    	<i class="fa fa-search search_icon"></i>
			   </div>
			   <div class="col-md-2">
					<select data-placeholder="เลือกพืช" class="form-control chosen-select" id="plans_seeds_area" name="seed">
				   <option value="1">ข้าว</option>
				   <option value="2">อ้อย</option>
				</select>
		        </div>
		        <div class="col-md-2">
					<select data-placeholder="เลือกพันธุ์พืช" class="form-control chosen-select" id="plans_breeds_area" name="breed">
				</select>
		        </div>
		     </div>
		    <div class="col-md-12 officer-main-content">
		    	<div class="col-md-12 officer-main-content">
		    	<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th width="5%">ลำดับ</th>
				  		<th width="30%">ชื่อ</th>
				  		<th width="15%">เบอร์โทรศัพท์</th>
				  		<th width="20%">อีเมล์</th>
				  		<th width="30%">สังกัด</th>
				  	</tr>
				  </thead>
				  <tbody id="plans_seeds_show_area">
					<tr>
						<td colspan="5">ไม่มีข้อมูล</td>
					</tr>
				  </tbody>
				</table>
		  	</div>
		  	</div>
		  	</div>
		  </div>
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
		    <div class="col-md-12 officer-main-content">
		    	<div class="col-md-12 officer-main-content">
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
					  <tbody id="plans_seeds_show_area">
						<tr>
							<td colspan="6">ไม่มีข้อมูล</td>
						</tr>
					  </tbody>
					</table>
			  	</div>
		  	</div>
		  	</div>
		  </div>
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
		   	  opt += '<option value="0">เลือกอำเภอ</option>';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#aumphur_area").html(opt);
		   	  $("#district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
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
		  url: site_url+"/api/v1.0/kaset_in_province/"+$("#province_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
				   	opt+= '<td>'+farmers.phone[i]+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="5">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
		   	$("#farmer_show_area").html(opt);
		});

	// ส่วนของจังหวัดเมื่อมีการเปลี่ยนแปลง
	$("#province_area").change(function(){
		$("#aumphur_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/aumphur/"+$("#province_area").val()
		}).then(function(aumphurs) {
		   	  var opt = '';
		   	  opt += '<option value="0">เลือกอำเภอ</option>';
		   	  $.each(aumphurs, function(index, value) {
		   	  	opt += '<option value="'+value.AMPHUR_ID+'">'+value.AMPHUR_NAME+'</option>';
		   	  });
		   	  $("#aumphur_area").html(opt);
		   	  $("#district_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
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
		  url: site_url+"/api/v1.0/kaset_in_province/"+$("#province_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
				   	opt+= '<td>'+farmers.phone[i]+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="5">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
		   	$("#farmer_show_area").html(opt);
		});
	});
	// ส่วนของอำเภอเมื่อมีการเปลี่ยนแปลง
	$("#aumphur_area").change(function(){
		$("#district_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/district/"+$("#aumphur_area").val()
		}).then(function(districts) {
		   	  var opt = '';
		   	  	opt += '<option value="0">เลือกตำบล</option>';
		   	  $.each(districts, function(index, value) {
		   	  	opt += '<option value="'+value.DISTRICT_ID+'">'+value.DISTRICT_NAME+'</option>';
		   	  });
		   	  $("#district_area").html(opt);

		});
		//search
		$.ajax({
		  url: site_url+"/api/v1.0/kaset_in_aumphur/"+$("#aumphur_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
				   	opt+= '<td>'+farmers.phone[i]+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="5">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
		   	$("#farmer_show_area").html(opt);
		});

	});
// ส่วนของตำบลเมื่อมีการเปลี่ยนแปลง
	$("#district_area").change(function(){
		//search
		$.ajax({
		  url: site_url+"/api/v1.0/kaset_in_district/"+$("#district_area").val()
		}).then(function(farmers) {
			var opt = '';
			var count = 1;
			var i=0;
			if(farmers.status==1){
			   	  $.each(farmers.data, function(index, value) {
			   	  	opt += '<tr>';
			   	  	opt += '<td>'+count+'</td>';
			   	  	opt += '<td style="text-align: left;padding-left: 15px;">'+value.prefix_name+' '+value.fname+' '+value.lname+'</td>';
				   	opt+= '<td>'+farmers.phone[i]+'</td>';
				   	opt+= '<td>'+farmers.email[i]+'</td>';
				   	opt+= '<td>'+value.fmcm_name+'</td>';
			   	  	opt += '</tr>';
			   	  	count ++;
			   	  	i++;
			   	  });
			   	  
			}else{
				opt += '<tr><td colspan="5">ไม่มีข้อมูลเกษตรกร</td></tr>';
			}
			//$("#name_table_area").html('รายชื่อเกษตรกรตำบล : '+$("#district_area option:selected").html());
		   	$("#farmer_show_area").html(opt);
		});
	});

//------------------------------ พืช --------------------------------//
$.ajax({
		  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$("#plans_seeds_area").val()
		}).then(function(breeds) {
				var opt = '';
				if(breeds.status==0){
					opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
				}else{
				   	  $.each(breeds.data, function(index, value) {
				   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
				   	  });
				}
				$("#plans_breeds_area").html(opt);
		});
//------------------------------- init ------------------------------//	
$("#plans_seeds_area").change(function(){
		$.ajax({
		  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$("#plans_seeds_area").val()
		}).then(function(breeds) {
				var opt = '';
				if(breeds.status==0){
					opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
				}else{
				   	  $.each(breeds.data, function(index, value) {
				   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
				   	  });
				}
				$("#plans_breeds_area").html(opt);
		});	
	});
});
</script>
@stop