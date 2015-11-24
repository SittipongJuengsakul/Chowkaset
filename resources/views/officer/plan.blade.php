<div id="plans" class="tab-pane fade">
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
<!-- //////////////////////////////////////////////////////////////////////// -->
		    <div class="col-md-12 officer-main-content" id="plan_detail_area" style="display:block;">
		    <button id="officer_add_plan" type="button" class="btn btn-info btn-add">เพิ่มแผนการเพาะปลูกไหม่</button>
		    	<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th width="5%">ลำดับ</th>
				  		<th width="30%">ชื่อแผนเพาะปลูก</th>
				  		<th width="30%">เจ้าของแผน</th>
				  		<th width="15%">ระยะเวลาปลูกตามแผน</th>
				  		<th width="10%">ตัวเลือก</th>
				  	</tr>
				  </thead>
				  <tbody id="plans_seeds_show_area">
					<tr>
						<td colspan="5">ไม่มีข้อมูลแผน</td>
					</tr>
				  </tbody>
				</table>
		  	</div>

<!-- //////////////////////////////////////////////////////////////////////// -->
		<form class="form-horizontal" role="form" method="post" action="{{ url('/officer/addPlan/commit')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  	<div class="col-md-4 officer-main-content plan_add_area" style="display:none;">
				<div class="panel-heading"><h2 class="head-col">คำอธิบายแผน</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
						  	<div class="col-md-6">
								<select data-placeholder="เลือกพืช" class="form-control chosen-select plans_seeds_area" id="plans_add_seeds_area" name="seed">
							   <option value="1">ข้าว</option>
							   <option value="2">อ้อย</option>
							</select>
					        </div>
					        <div class="col-md-6">
								<select data-placeholder="เลือกพันธุ์พืช" class="form-control chosen-select" id="breed_add_plan" name="breed">
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
					        <input type="text" class="form-control" placeholder="ระยะเวลา" data-validation="required" value="" name="plan_duration" data-validation-help="เช่น 90 วัน">
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
		  	<input type="hidden" id="process_num" name="process_num" value="">
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
				<input type="hidden" name="grow_num" id="grow_num" value="">
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
<!-- //////////////////////////////////////////////////////////////////////// -->
	</div>
	<div class="col-md-4 officer-main-content plan_zoom_area" style="display:none;">
				<div class="panel-heading"><h2 class="head-col">คำอธิบายแผน</h2><hr></div>
				<div class="panel-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
						  	<div class="col-md-6">
							  	<label for="seed">พืช :</label>
							  	<p id="plan_show_seed"></p>
					        </div>
					        <div class="col-md-6">
								<label for="seed">สายพันธู์ :</label>
							  	<p id="plan_show_breed"></p>
					        </div>
						</div>
						<div class="form-group">
					      <div class="col-md-12">
					        <label for="seed">ชื่อแผนเพาะปลูก :</label>
							  	<p id="plan_show_name_plan"></p>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-12">
					       <label for="seed">ชื่อเจ้าของแผนเพาะปลูก :</label>
							  	<p id="plan_show_name_owner"></p>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-12">
					        <label for="seed">ระยะเวลาปลูก :</label>
							  	<p id="plan_show_duration"></p>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-md-12">
					        <label for="seed">คำอธิบาย :</label>
							  	<p id="plan_show_detail"></p>
					      </div>
					    </div>
				</div>
		  	</div>
		  	<div class="col-md-8 plan_zoom_area" style="padding-right:0px; display:none;">
		  	<div class="col-md-12 officer-main-content">
		  	<button id="officer_show_cancle_plan" type="button" class="btn btn-danger btn-add">ยกเลิกการดูแผนการเพาะปลูก</button>
				<div class="panel-heading"><h2 class="head-col">ข้อมูลแผนการเพาะปลูก</h2><hr></div>
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
				  <tbody id="show_plans_seeds_show_area">
					
				  </tbody>
				</table>
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
				  <tbody id="show_duration_plans_seeds_show_area">
					
				  </tbody>
				</table>
		  	</div>
		  	<!--<div class="panel-heading"><h2 class="head-col">ระยะเจริญเติบโตพืชของแผน</h2><hr></div>
				<div class="panel-body">
				</div>
		  	<div class="form-grop">
						<div class="col-md-4 col-md-offset-5">
							<button type="button" class="btn btn-success" id="officer_show_cancle_plans">เสร็จสิ้นการดู</button>
						</div>
			</div>-->
		  </div>	
		 </div>
<!-- //////////////////////////////////////////////////////////////////////// -->
</div>
<script>
$(document).ready(function(){
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
					$.ajax({
						  url: site_url+"/api/v1.0/plan_in_breed/"+$("#plans_breeds_area").val()
						}).then(function(plans) {
							var opt = '';
							var count = 1;
							if(plans.status==0){
									opt += '<tr>';
									opt += '<td colspan="5">ไม่มีข้อมูลแผน</td>';
									opt += '</tr>';
							}else{
								$.each(plans.data, function(index, value) {
									opt += '<tr>';
									opt += '<td>'+count+'</td>';
									opt += '<td>'+value.cp_name+'</td>';
									opt += '<td>'+value.cp_owner+'</td>';
									opt += '<td>'+value.cp_duration+' วัน</td>';
									opt += '<td><a onclick="more_plan_detail('+value.cp_id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
									opt += '</tr>';
									count++;
								});
							}
							$("#plans_seeds_show_area").html(opt);
						});	
			});
	$.ajax({
			  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$("#plans_add_seeds_area").val()
			}).then(function(breeds) {
					var opt = '';
					if(breeds.status==0){
						opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
					}else{
					   	  $.each(breeds.data, function(index, value) {
					   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
					   	  });
					}
					$("#breed_add_plan").html(opt);
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
	$("#plans_seeds_area").change(function(){
			$.ajax({
			  url: site_url+"/api/v1.0/plan_in_seed/"+$("#plans_seeds_area").val()
			}).then(function(plans) {
				var opt = '';
				var count = 1;
				if(plans.status==0){
						opt += '<tr>';
						opt += '<td colspan="5">ไม่มีข้อมูลแผน</td>';
						opt += '</tr>';
				}else{
					$.each(plans.data, function(index, value) {
						opt += '<tr>';
						opt += '<td>'+count+'</td>';
						opt += '<td>'+value.cp_name+'</td>';
						opt += '<td>'+value.cp_owner+'</td>';
						opt += '<td>'+value.cp_duration+' วัน</td>';
						opt += '<td><a onclick="more_plan_detail('+value.cp_id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
						opt += '</tr>';
						count++;
					});
				}
				$("#plans_seeds_show_area").html(opt);
			});	
	});
	$("#plans_breeds_area").change(function(){
			$.ajax({
			  url: site_url+"/api/v1.0/plan_in_breed/"+$("#plans_breeds_area").val()
			}).then(function(plans) {
				var opt = '';
				var count = 1;
				if(plans.status==0){
						opt += '<tr>';
						opt += '<td colspan="5">ไม่มีข้อมูลแผน</td>';
						opt += '</tr>';
				}else{
					$.each(plans.data, function(index, value) {
						opt += '<tr>';
						opt += '<td>'+count+'</td>';
						opt += '<td>'+value.cp_name+'</td>';
						opt += '<td>'+value.cp_owner+'</td>';
						opt += '<td>'+value.cp_duration+' วัน</td>';
						opt += '<td><a onclick="more_plan_detail('+value.cp_id+')" title="เพิ่มเติม"><i class="fa fa-search-plus zoom_acc"></i></a><a onclick="" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="" title="ลบ"><i class="fa fa-trash delete_acc"></i></a></td>';
						opt += '</tr>';
						count++;
					});
				}
				$("#plans_seeds_show_area").html(opt);
			});	
	});
	$("#plans_add_seeds_area").change(function(){
			$.ajax({
			  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$("#plans_add_seeds_area").val()
			}).then(function(breeds) {
					var opt = '';
					if(breeds.status==0){
						opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
					}else{
					   	  $.each(breeds.data, function(index, value) {
					   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
					   	  });
					}
					$("#breed_add_plan").html(opt);
			});
	});
});
// แสดงข้อมูล
	$("#officer_add_plan").click(function(){
		$("#plan_detail_area").hide();
		$(".plan_zoom_area").hide();
		$(".plan_add_area").show();
	});
	$("#officer_add_cancle_plans").click(function(){
		$(".plan_add_area").hide();
		$(".plan_zoom_area").hide();
		$("#plan_detail_area").show();
	});
	$("#officer_add_cancle_plan").click(function(){
		$(".plan_add_area").hide();
		$(".plan_zoom_area").hide();
		$("#plan_detail_area").show();
	});
	$("#officer_show_cancle_plans").click(function(){
		$(".plan_add_area").hide();
		$(".plan_zoom_area").hide();
		$("#plan_detail_area").show();
	});
	$("#officer_show_cancle_plan").click(function(){
		$(".plan_add_area").hide();
		$(".plan_zoom_area").hide();
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
		opt += '<td><input type="checkbox" name="notice_plan_'+row_num+'" value="1"></td>';
		opt += '</tr>';
		$("#add_plans_seeds_show_area").append(opt);
		$('#process_num').val(row_num);
	row_num++;

	function add_row_plan(){
		var opt = '';
		opt += '<tr id="'+'form_plan_row_'+row_num+'">';
		opt += '<td>'+row_num+'</td>';
		opt += '<td><select data-placeholder="เลือกประเภท" class="form-control" name="type_plan_'+row_num+'"> <option value="1">วิธีการ</option><option value="2">ดูแลรักษา</option><option value="3">จัดการน้ำ</option><option value="4">ปัญหาที่อาจเกิด</option></select></td>';
		opt += '<td><textarea name="detail_in_plan_'+row_num+'" class="form-control" placeholder="รายละเอียด" data-validation="required"></textarea></td>';
		opt += '<td><input type="text" name="start_plan_'+row_num+'" class="form-control" placeholder="วันเริ่ม (วัน)" data-validation="required number" data-validation-help="เช่น 0"></td>';
		opt += '<td><input type="text" name="end_plan_'+row_num+'" class="form-control" placeholder="สิ้นสุด (วัน)" data-validation="required number" data-validation-help="เช่น 10"></td>';
		opt += '<td><input type="checkbox" name="notice_plan_'+row_num+'" value="1"></td>';
		opt += '</tr>';
		$("#add_plans_seeds_show_area").append(opt);
		$('#process_num').val(row_num);
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
			$('#process_num').val(row_num);
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
		$('#grow_num').val(duration_num);
		duration_num++;
	function add_duration_plan(){
		var opt = '';
		opt += '<tr id="'+'form_duration_row'+duration_num+'">';
		opt += '<td>'+duration_num+'</td>';
		opt += '<td><input type="text" name="detail_duration_in_plan_'+duration_num+'" class="form-control" placeholder="ชื่อระยะ" data-validation="required"></td>';
		opt += '<td><input type="text" name="duration_time_plan_'+duration_num+'" class="form-control" placeholder="ระยะเวลา (วัน)" data-validation="required number" data-validation-help="เช่น 10"></td>';
		opt += '</tr>';
		$("#duration_plans_seeds_show_area").append(opt);
		$('#grow_num').val(duration_num);
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
			$('#grow_num').val(duration_num);
		}
	}
	function more_plan_detail(plan_id){
		//alert(plan_id);
		$.ajax({
			  url: site_url+"/api/v1.0/plan/"+plan_id
			}).then(function(plans) {
				var descript = plans.data[0];
				$("#plan_show_seed").html(descript.seed_name);
				$("#plan_show_breed").html(descript.breed_name);
				$("#plan_show_name_plan").html(descript.cp_name);
				$("#plan_show_name_owner").html(descript.cp_owner);
				$("#plan_show_duration").html(descript.cp_duration+' วัน');
				if(descript.cp_detail=='-'||descript.cp_detail==''){
					$("#plan_show_detail").html('ไม่มีคำอธิบาย');
				}else{
					$("#plan_show_detail").html(descript.cp_detail);
				}
				var row_num=1;
				var opt='';
				$.each(plans.plan_process, function(index, value) {
					opt += '<tr>';
					opt += '<td>'+row_num+'</td>';
					opt += '<td>'+value.cpty_name+'</td>';
					opt += '<td>'+value.cpc_detail+'</td>';
					opt += '<td>'+value.cpc_start+'</td>';
					opt += '<td>'+value.cpc_end+'</td>';
					if(value.cpc_notice==0){
						opt += '<td>ไม่มีการแจ้งเตือน</td>';
					}else{
						opt += '<td>แจ้งเตือน</td>';
					}
					opt += '</tr>';
					row_num++;
				});
				$("#show_plans_seeds_show_area").html(opt);
				var opt_d_plan = '';
				var d_row_num = 1;
				$.each(plans.plan_timegrows, function(index, value) {
					opt_d_plan += '<tr>';
					opt_d_plan += '<td>'+d_row_num+'</td>';
					opt_d_plan += '<td>'+value.cpt_detail+'</td>';
					opt_d_plan += '<td>'+value.cpt_duration+' วัน</td>';
					opt_d_plan += '</tr>';
					d_row_num++;
				});
				$("#show_duration_plans_seeds_show_area").html(opt_d_plan);
			});
		$("#plan_detail_area").hide();
		$(".plan_add_area").hide();
		$(".plan_zoom_area").show();
	}
</script>