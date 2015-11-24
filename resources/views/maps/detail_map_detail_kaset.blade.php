<div id="place_detail_kaset_add" class="place_kaset_class" style="display: none;">
<div id="background_place_detail_kaset_add"class="background_full"></div>
	<div class="col_place_kaset col-md-12" id="id_col_place_detail_kaset" style="margin:0px;height: 92%;">
	   <div id="farm_management_console">
		<div id="id_farm_management_menu" class="farm_management_menu col-md-1">
			<ul class="nav nav-pills">
				<li class="active"><a data-toggle="pill" href="#farm_detail"><i class="fa fa-desktop"></i><p>ข้อมูลการเกษตร</p></a>
				</li><li><a data-toggle="pill" href="#farm_account"><i class="fa fa-pencil-square-o "></i><p>บัญชีการเพาะปลูก</p></a></li>
				<li href="#menu2"><a data-toggle="pill" href="#farm_problem"><i class="fa fa-exclamation"></i><p>ปัญหาการเพาะปลูก</p></a></li>
				<li><a data-toggle="pill" onclick="close_farm_management_console();"><i class="fa fa-times"></i><p>ปิด</p></a></li>
			</ul>
		</div>
		<div id="id_farm_management_board" class="farm_management_board col-md-11 tab-content">
			<div id="id_close_farm_management_console">
				<a onclick="close_farm_management_console();" title="ปิด"><i class="fa fa-times "></i></a>
			</div>
			<div class="tab-content">
				<div id="farm_detail" class="tab-pane fade in active">
					<div class="col-md-12 wrap_card">
						<div class="card_menu_choose">
							<select class="farm_detail_choose form-control" id="farm_detail_crops_list" onchange="">
							</select>
						</div>
					</div>
					<div class="col-md-8 wrap_card">
					<div class="card_menu" id="progress_management">
						<div class="header_card" style="background-color: #5cb85c;">ติดตามการเพาะปลูก</div>
						<div class="body_card">
						<div id="progress_management_sum" class="col-md-12 col-xs-12">
							<div class="tab-content" id="progress_management_detail_tab">
								
							</div>
						</div>
						</div>
					</div>
					</div>
					<div class="col-md-4 wrap_card">
						<div class="card_menu" id="calendar_management">
						<div class="header_card" style="background-color: #5BC0DE;">ปฎิทินการเพาะปลูก</div>
						<div class="body_card">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th width="20%">วันที่</th>
									<th width="40%">กิจกรรม</th>
									<th width="30%">ประเภท</th>
									</tr>
								</thead>
								<tbody id="show_calendar_management">
									
								</tbody>
							</table>
						</div>
						</div>
					</div>
					<!--
					<div class="col-md-12 wrap_card">
						<div id="market_management" class="card_menu">
							<div class="header_card" style="background-color: #f0ad4e;">การเพาะปลูก</div>
						</div>
					</div>-->
				</div>
				<div id="farm_account" class="tab-pane fade">
					<div class="col-md-12 wrap_card">
						<div class="card_menu_choose">
						<select class="farm_account_choose form-control" id="account_crops_list" onchange="account_table(this.value);">
						</select>
						</div>
					</div>
					<div class="col-md-12 wrap_card" id="id_farm_account_content">
						<div class="farm_account_content">
							<form method="post" id="add_form_account" class="form-inline" role="form">
							<input type="hidden" name="acc_crop_id" value="37">
						<div class="col-md-2" style="padding-left: 0px;">
							<input type="input" id="dpd1" class="form-control" data-date-format="dd-mm-yyyy" name="acc_date" style="width: 100%;">
						</div>
						<div class="col-md-5">
							<input type="input" class="form-control" name="acc_detail" placeholder="รายละเอียด" style="width: 100%;">
						</div>
						<div class="col-md-2">
							<select class="form-control" name="acc_cost_type" style="width: 100%;">
								<option value="1">รายรับ</option>
								<option value="2">รายจ่าย</option>
							</select>
						</div>
						<div class="col-md-2">
							<input type="input" class="form-control" name="acc_price" onchange="dokeyup(this)" onkeyup="dokeyup(this)" onkeypress="checknumber()" placeholder="จำนวนเงิน (บาท)" style="width: 100%;">
						</div>
							<button type="button" class="btn btn-success btn_add_account" onclick="dialog_add_income();">เพิ่มข้อมูล</button>
							</form>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>วัน/เดือน/ปี</th>
									<th>รายละเอียด</th>
									<th>รายรับ (บาท)</th>
									<th>รายจ่าย (บาท)</th>
									<th>เงินคงเหลือ (บาท)</th>
									<th>ตัวเลือก</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="6" style="text-align: center;">ไม่มีข้อมูลบัญชี</td>
								</tr>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<div id="farm_problem" class="tab-pane fade">
					<div class="col-md-12 wrap_card">
						<div class="card_menu_choose">
							<select class="farm_problem_choose form-control" id="farm_problem_select" onchange="problem_table(this.value);">
							</select>
						</div>
					</div>
					<div class="col-md-12 wrap_card" id="id_farm_problem_content">
						<div class="farm_problem_content">
						<input type="hidden" name="pbm_crop_id" value="37">
						<div class="col-md-12" style="margin-bottom: 15px;">
							<textarea class="form-control" name="pbm_detail" placeholder="ปัญหาที่พบ" style="width: 100%;"></textarea>
						</div>
							<button type="button" onclick="dialog_add_problem();" class="btn btn-success btn_add_problem">เพิ่มปัญหา</button>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>วัน/เดือน/ปี</th>
									<th>ปัญหา</th>
									<th>สถานะ</th>
									<th>ตัวเลือก</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4" style="text-align: center;">ไม่มีข้อมูลปัญหาการเพาะปลูก</td>
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
	$('#dpd1').datepicker('setValue', new Date());
	$(document).ready(function(){
		$.ajax({
					url: site_url+"/api/v1.0/Crop/getCropsOfUser/"+user_id
				}).then(function(data) {
					var i = 0;
					var count = 0;
					if(data.status=='0'){
					}else{
					var id_default = data.data[0].crop_id;
						for(i=0;i<data.data.length;i++){
						var option_choose = document.createElement('option');
			    		option_choose.setAttribute('value',data.data[count].crop_id);
			    		option_choose.innerHTML = data.data[count].crop_name;
			    		document.getElementById('farm_detail_crops_list').appendChild(option_choose);
			    		count++;
						}
					$.ajax({
						url: site_url+"/api/v1.0/Crop/getCropsOfUserDetailList/"+data.data[0].crop_id
					}).then(function(details) {
					   	  var opt = '';
					   	  var count = 1;
					   	  	if(count==1){
					   	  		opt += '<div id="detail_progress_'+count+'" class="tab-pane fade in active">';
					   	  	}else{
					   	  		opt += '<div id="detail_progress_'+count+'" class="tab-pane fade">';
							}
							opt += '<div class="progress_show_in_detail_tab">';
							opt += '<h1>'+details.data[0].seed_name+'</h1>';
							opt += '<h2>'+details.data[0].breed_name+' ('+details.data[0].crop_rai+' ไร่ '+details.data[0].crop_ngarn+' งาน '+details.data[0].crop_wah+' ตารางวา)</h2>';
							opt += '<h3>'+details.data[0].cp_name+'</h3>';
							//opt += '<h5>ผู้ติดตาม : </h5>';
							opt += '<h3> โดย '+details.data[0].cp_owner+'</h3>';
							opt += '</div>';
							opt += '<div class="sum_show_in_detail_tab">';
							opt += '<div class="sum_list col-md-4">';
							opt += '<h2>เงินรวม</h2>';
							opt += '<h4>'+details.sum_acc+'</h4>';
							opt += '</div>';
							opt += '<div class="sum_list col-md-4">';
							opt += '<h2>ปัญหา</h2>';
							opt += '<h4>'+details.sum_pbm+'</h4>';
							opt += '</div>';
							opt += '<div class="sum_list col-md-4">';
							opt += '<h2>พร้อมเก็บ</h2>';
							opt += '<h4>52 วัน</h4>';
							opt += '</div>';
							opt += '</div>';
							opt += '</div>';
							count++;
					$('#progress_management_detail_tab').html(opt);
						$.ajax({
							url: site_url+"/api/v1.0/Crop/getPlansOfUserDetailList/"+data.data[0].crop_id
						}).then(function(details) {
							var first_date = details.start_crop;
							var res = first_date.split("-");
						   	var new_first_date = res[1]+'/'+res[2]+'/'+res[0];
							var firstday=newDayAdd(new_first_date,0);
							if(new_first_date==today_show){
								var opt = '<tr><td>วันนี้</td>';
								opt += '<td>วันเริ่มต้นเพาะปลูก</td><td></td></tr>';
							}else{
								var opt = '<tr><td>'+firstday+'</td>';
								opt += '<td>วันเริ่มต้นเพาะปลูก</td><td></td></tr>';
							}
						   	  	$.each(details.data, function(index, value) {
						   	  		opt += '<tr>';
						   	  		var first_date = details.start_crop;
						   	  		var res = first_date.split("-");
						   	  		var new_first_date = res[1]+'/'+res[2]+'/'+res[0];
						   	  		var thisdate = newDayAddNumber(new_first_date,value.cpc_start);
								   	var nextday=newDayAdd(new_first_date,value.cpc_start);
								   	if(thisdate==today_show){
								   		opt += '<td>วันนี้</td>';
								   	}else{

								   		opt += '<td>'+nextday+'</td>';
								   	}
								   	opt += '<td>'+value.cpc_detail+'</td>';
								   	opt += '<td>'+value.cpty_name+'</td>';
								   	opt += '</tr>';
						   	 	 });
						$('#show_calendar_management').html(opt);
						});
					});
					}
			});
		$("#farm_detail_crops_list").change(function(){
		$("#progress_management_detail_tab").empty();
		$('#show_calendar_management').empty();
					$.ajax({
						url: site_url+"/api/v1.0/Crop/getCropsOfUserDetailList/"+$("#farm_detail_crops_list").val()
					}).then(function(details) {
					   	  var opt = '';
					   	  var count = 1;
					   	  	if(count==1){
					   	  		opt += '<div id="detail_progress_'+count+'" class="tab-pane fade in active">';
					   	  	}else{
					   	  		opt += '<div id="detail_progress_'+count+'" class="tab-pane fade">';
							}
							opt += '<div class="progress_show_in_detail_tab">';
							opt += '<h1>'+details.data[0].seed_name+'</h1>';
							opt += '<h2>'+details.data[0].breed_name+' ('+details.data[0].crop_rai+' ไร่ '+details.data[0].crop_ngarn+' งาน '+details.data[0].crop_wah+' ตารางวา)</h2>';
							opt += '<h3>'+details.data[0].cp_name+'</h3>';
							//opt += '<h5>ผู้ติดตาม : </h5>';
							opt += '<h3> โดย '+details.data[0].cp_owner+'</h3>';
							opt += '</div>';
							opt += '<div class="sum_show_in_detail_tab">';
							opt += '<div class="sum_list col-md-4">';
							opt += '<h2>เงินรวม</h2>';
							var acc = details.sum_acc;
							opt += '<h4>'+acc+'</h4>';
							opt += '</div>';
							opt += '<div class="sum_list col-md-4">';
							opt += '<h2>ปัญหา</h2>';
							opt += '<h4>'+details.sum_pbm+'</h4>';
							opt += '</div>';
							opt += '<div class="sum_list col-md-4">';
							opt += '<h2>พร้อมเก็บ</h2>';
							opt += '<h4>52 วัน</h4>';
							opt += '</div>';
							opt += '</div>';
							opt += '</div>';
							count++;
					$('#progress_management_detail_tab').html(opt);
						$.ajax({
							url: site_url+"/api/v1.0/Crop/getPlansOfUserDetailList/"+$("#farm_detail_crops_list").val()
						}).then(function(details) {
							var first_date = details.start_crop;
							var res = first_date.split("-");
						   	var new_first_date = res[1]+'/'+res[2]+'/'+res[0];
							var firstday=newDayAdd(new_first_date,0);
							if(new_first_date==today_show){
								var opt = '<tr><td>วันนี้</td>';
								opt += '<td>วันเริ่มต้นเพาะปลูก</td><td></td></tr>';
							}else{
								var opt = '<tr><td>'+firstday+'</td>';
								opt += '<td>วันเริ่มต้นเพาะปลูก</td><td></td></tr>';
							}
						   	  	$.each(details.data, function(index, value) {
						   	  		opt += '<tr>';
						   	  		var first_date = details.start_crop;
						   	  		var res = first_date.split("-");
						   	  		var new_first_date = res[1]+'/'+res[2]+'/'+res[0];
						   	  		var thisdate = newDayAddNumber(new_first_date,value.cpc_start);
								   	var nextday=newDayAdd(new_first_date,value.cpc_start);
								   	if(thisdate==today_show){
								   		opt += '<td>วันนี้</td>';
								   	}else{
								   		opt += '<td>'+nextday+'</td>';
								   	}
								   	opt += '<td>'+value.cpc_detail+'</td>';
								   	opt += '<td>'+value.cpty_name+'</td>';
								   	opt += '</tr>';
						   	 	 });
						$('#show_calendar_management').html(opt);
						});
					});

		});
	});
function newDayAdd(inputDate,addDay){  
    var d = new Date(inputDate);  
    d.setDate(d.getDate()+addDay);  
    mkMonth=d.getMonth()+1;  
    mkMonth=new String(mkMonth);  
    if(mkMonth.length==1){  
        mkMonth="0"+mkMonth;  
    }  
    mkDay=d.getDate();  
    mkDay=new String(mkDay);  
    if(mkDay.length==1){  
        mkDay="0"+mkDay;  
    }     
    mkYear=d.getFullYear(); 
    var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
    var callMonth = thmonth[mkMonth-1];
//  return mkYear+"-"+newMonth+"-"+newDay; // แสดงผลลัพธ์ในรูปแบบ ปี-เดือน-วัน  
    return mkDay+" "+callMonth+" "+(mkYear+543); // แสดงผลลัพธ์ในรูปแบบ เดือน/วัน/ปี      
}  
function newDayAddNumber(inputDate,addDay){  
    var d = new Date(inputDate);  
    d.setDate(d.getDate()+addDay);  
    mkMonth=d.getMonth()+1;  
    mkMonth=new String(mkMonth);  
    if(mkMonth.length==1){  
        mkMonth="0"+mkMonth;  
    }  
    mkDay=d.getDate();  
    mkDay=new String(mkDay);  
    if(mkDay.length==1){  
        mkDay="0"+mkDay;  
    }     
    mkYear=d.getFullYear();
//  return mkYear+"-"+newMonth+"-"+newDay; // แสดงผลลัพธ์ในรูปแบบ ปี-เดือน-วัน  
    return mkMonth+"/"+mkDay+"/"+(mkYear); // แสดงผลลัพธ์ในรูปแบบ เดือน/วัน/ปี      
}  
</script>