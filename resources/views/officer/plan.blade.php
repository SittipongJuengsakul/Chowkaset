<div id="plans" class="tab-pane fade">
		     <div class="col-md-12 menu-content">
		       <div class="col-md-1">
			    	<i class="fa fa-search search_icon"></i>
			   </div>
			   <div class="col-md-2">
					<select data-placeholder="เลือกพืช" class="form-control chosen-select plans_seeds_area" name="seed">
				   <option value="1">ข้าว</option>
				   <option value="2">อ้อย</option>
				</select>
		        </div>
		        <div class="col-md-2">
					<select data-placeholder="เลือกพันธุ์พืช" class="form-control chosen-select plans_breeds_area" name="breed">
				</select>
		        </div>
		     </div>
		    <div class="col-md-12 officer-main-content" id="plan_detail_area" style="display:block;">
		    <button id="officer_add_plan" type="button" class="btn btn-info btn-add">เพิ่มแผนการเพาะปลูกไหม่</button>
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
		<form class="form-horizontal" role="form" method="post" action="{{ url('/officer/addCommunity/commit')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  	<div class="col-md-4 officer-main-content plan_add_area" style="display:none;">
				<div class="panel-heading"><h2 class="head-col">คำอธิบายแผน</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
						  	<div class="col-md-6">
								<select data-placeholder="เลือกพืช" class="form-control chosen-select plans_seeds_area" name="seed">
							   <option value="1">ข้าว</option>
							   <option value="2">อ้อย</option>
							</select>
					        </div>
					        <div class="col-md-6">
								<select data-placeholder="เลือกพันธุ์พืช" class="form-control chosen-select plans_breeds_area" name="breed">
							</select>
					        </div>
						</div>
						<div class="form-group">
					      <div class="col-md-12">
					        <input type="text" class="form-control" placeholder="ชื่อแผนงาน" data-validation="required" value="" name="plan_name" data-validation-help="เช่น แผนออแกนิก โดย นาย.ก">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-12">
					        <input type="text" class="form-control" placeholder="เจ้าของแผนนี้" data-validation="required" value="" name="plan_owner" data-validation-help="เช่น กรมการข้าว">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-12">
					        <input type="text" class="form-control" placeholder="ระยะเวลา" data-validation="required" value="" name="plan_owner" data-validation-help="เช่น 90 วัน">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-12">
					        <textarea type="text" class="form-control" placeholder="คำอธิบายแผน" name="plan_detail"></textarea>
					      </div>
					    </div>
				</div>
				
		  	</div>
		  	<div class="col-md-8 plan_add_area" style="padding-right:0px; display:none;">
		  	<div class="col-md-12 officer-main-content">
		  	<button id="officer_add_cancle_plan" type="button" class="btn btn-danger btn-add">ยกเลิกการเพิ่มแผนการเพาะปลูก</button>
		  
				<div class="panel-heading"><h2 class="head-col">เพิ่มข้อมูลแผนการเพาะปลูก</h2><hr></div>
				<div class="panel-body">
					<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th width="5%">ลำดับ</th>
				  		<th width="15%">ประเภท</th>
				  		<th width="25%">เนื้อหา</th>
				  		<th width="12%">วันเริ่มต้น (วัน)</th>
				  		<th width="12%">วันสิ้นสุด (วัน)</th>
				  		<th width="10%">แจ้งเตือน</th>
				  	</tr>
				  </thead>
				  <tbody id="add_plans_seeds_show_area">
					
				  </tbody>
				</table>
				<button style="margin-left: 5px;" onclick="remove_row_plan()" type="button" class="btn btn-warning btn-add">ลบ</button>
				<button onclick="add_row_plan()" type="button" class="btn btn-info btn-add">เพิ่ม</button>
				</div>
				<div class="panel-heading"><h2 class="head-col">ระยะเจริญเติบโตพืชของแผน</h2><hr></div>
				<div class="panel-body">
					<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th width="10%">ลำดับ</th>
				  		<th width="45%">ชื่อระยะ</th>
				  		<th width="25%">ระยะเวลา (วัน)</th>
				  	</tr>
				  </thead>
				  <tbody id="duration_plans_seeds_show_area">
					
				  </tbody>
				</table>
				<button style="margin-left: 5px;"onclick="remove_duration_plan()" type="button" class="btn btn-warning btn-add">ลบ</button>
				<button onclick="add_duration_plan()" type="button" class="btn btn-info btn-add">เพิ่ม</button>
		  	</div>
		  	<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="submit" class="btn btn-success">ตกลง</button>
							<button type="button" class="btn btn-danger" id="officer_add_cancle_plans">ยกเลิก</button>
						</div>
					</div>
		  </div>
	</form>
	</div>
</div>
<script>
$(document).ready(function(){
//------------------------------ พืช --------------------------------//
	$.ajax({
			  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$(".plans_seeds_area").val()
			}).then(function(breeds) {
					var opt = '';
					if(breeds.status==0){
						opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
					}else{
					   	  $.each(breeds.data, function(index, value) {
					   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
					   	  });
					}
					$(".plans_breeds_area").html(opt);
			});
	//------------------------------- init ------------------------------//	
	$(".plans_seeds_area").change(function(){
			$.ajax({
			  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$(".plans_seeds_area").val()
			}).then(function(breeds) {
					var opt = '';
					if(breeds.status==0){
						opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
					}else{
					   	  $.each(breeds.data, function(index, value) {
					   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
					   	  });
					}
					$(".plans_breeds_area").html(opt);
			});	
	});
});
// แสดงข้อมูล
	$("#officer_add_plan").click(function(){
		$("#plan_detail_area").hide();
		$(".plan_add_area").show();
	});
	$("#officer_add_cancle_plans").click(function(){
		$(".plan_add_area").hide();
		$("#plan_detail_area").show();
	});
	$("#officer_add_cancle_plan").click(function(){
		$(".plan_add_area").hide();
		$("#plan_detail_area").show();
	});
// เพิ่มตาราง
	var row_num = 1;
	var opt = '';
		opt += '<tr id="'+'form_plan_row_'+row_num+'">';
		opt += '<td>'+row_num+'</td>';
		opt += '<td><select data-placeholder="เลือกประเภท" class="form-control" name="type_plan_'+row_num+'"> <option value="1">วิธีการ</option><option value="2">ดูแลรักษา</option><option value="3">จัดการน้ำ</option><option value="4">ปัญหาที่อาจเกิด</option></select></td>';
		opt += '<td><textarea name="detail_in_plan_'+row_num+'" class="form-control" placeholder="รายละเอียด" data-validation="required"></textarea></td>';
		opt += '<td><input type="text" name="start_plan_'+row_num+'" class="form-control" placeholder="วันเริ่ม (วัน)" data-validation="required number" data-validation-help="เช่น 0"></td>';
		opt += '<td><input type="text" name="end_plan_'+row_num+'" class="form-control" placeholder="สิ้นสุด (วัน)" data-validation="required number" data-validation-help="เช่น 10"></td>';
		opt += '<td><input type="checkbox" name="notice_plan_'+row_num+'"></td>';
		opt += '</tr>';
		$("#add_plans_seeds_show_area").append(opt);
	row_num++;

	function add_row_plan(){
		var opt = '';
		opt += '<tr id="'+'form_plan_row_'+row_num+'">';
		opt += '<td>'+row_num+'</td>';
		opt += '<td><select data-placeholder="เลือกประเภท" class="form-control" name="type_plan_'+row_num+'"> <option value="1">วิธีการ</option><option value="2">ดูแลรักษา</option><option value="3">จัดการน้ำ</option><option value="4">ปัญหาที่อาจเกิด</option></select></td>';
		opt += '<td><textarea name="detail_in_plan_'+row_num+'" class="form-control" placeholder="รายละเอียด" data-validation="required"></textarea></td>';
		opt += '<td><input type="text" name="start_plan_'+row_num+'" class="form-control" placeholder="วันเริ่ม (วัน)" data-validation="required number" data-validation-help="เช่น 0"></td>';
		opt += '<td><input type="text" name="end_plan_'+row_num+'" class="form-control" placeholder="สิ้นสุด (วัน)" data-validation="required number" data-validation-help="เช่น 10"></td>';
		opt += '<td><input type="checkbox" name="notice_plan_'+row_num+'"></td>';
		opt += '</tr>';
		$("#add_plans_seeds_show_area").append(opt);
		row_num++;

	$.validate({
		modules: 'security, server,file'
	});
	}
	function remove_row_plan(){
		row_num--;
		if(row_num<=1){
			//alert('ไม่สามารถลบได้ !');
			row_num++;
		}else{
			var id_row = 'form_plan_row_'+row_num;
			var id_remove = document.getElementById(id_row);
			id_remove.remove(id_row);
		}
	}
//ระยะเจริญเติบโต
var duration_num = 1;
var opt = '';
		opt += '<tr id="'+'form_duration_row'+duration_num+'">';
		opt += '<td>'+duration_num+'</td>';
		opt += '<td><input type="text" name="detail_duration_in_plan_'+duration_num+'" class="form-control" placeholder="ชื่อระยะ" data-validation="required"></td>';
		opt += '<td><input type="text" name="duration_time_plan_'+duration_num+'" class="form-control" placeholder="ระยะเวลา (วัน)" data-validation="required number" data-validation-help="เช่น 10"></td>';
		opt += '</tr>';
		$("#duration_plans_seeds_show_area").append(opt);
		duration_num++;
	function add_duration_plan(){
		var opt = '';
		opt += '<tr id="'+'form_duration_row'+duration_num+'">';
		opt += '<td>'+duration_num+'</td>';
		opt += '<td><input type="text" name="detail_duration_in_plan_'+duration_num+'" class="form-control" placeholder="ชื่อระยะ" data-validation="required"></td>';
		opt += '<td><input type="text" name="duration_time_plan_'+duration_num+'" class="form-control" placeholder="ระยะเวลา (วัน)" data-validation="required number" data-validation-help="เช่น 10"></td>';
		opt += '</tr>';
		$("#duration_plans_seeds_show_area").append(opt);
		duration_num++;

	$.validate({
		modules: 'security, server,file'
	});
	}
	function remove_duration_plan(){
		duration_num--;
		if(duration_num<=1){
			//alert('ไม่สามารถลบได้ !');
			duration_num++;
		}else{
			var id_row = 'form_duration_row'+duration_num;
			var id_remove = document.getElementById(id_row);
			id_remove.remove(id_row);
		}
	}
</script>