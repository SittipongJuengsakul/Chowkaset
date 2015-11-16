$(window).load(function() {
 	$('#my_farm').click(function(){
        place_kaset(2);
    });
    $('#farm_management').click(function(){
    	var farm_management_console = document.getElementById('farm_management_console');
    	if(farm_management_console){
    		$('#farm_management_console').remove();
    	}else{
    		create_farm_management();
    	}
    });
});

function create_farm_management(){
	//create DOM of farm management
	$('#map_canvas').append('<div id="farm_management_console""></div>');
	//create Farm Management Menu
    $('#farm_management_console').append('<div id="id_farm_management_menu" class="farm_management_menu col-md-1"></div>');
    var id_farm_management_menu = $('#id_farm_management_menu').append('<ul class="nav nav-pills"><li class="active"><a data-toggle="pill" href="#farm_detail"><i class="fa fa-desktop"></i><p>ข้อมูลการเกษตร</p></a></li><li><a data-toggle="pill" href="#farm_account"><i class="fa fa-pencil-square-o "></i><p>บัญชีการเพาะปลูก</p></a></li><li href="#menu2"><a data-toggle="pill" href="#farm_problem"><i class="fa fa-exclamation"></i><p>ปัญหาการเพาะปลูก</p></a></li><li><a data-toggle="pill" onclick="close_farm_management_console();"><i class="fa fa-times"></i><p>ปิด</p></a></li></ul>');
    //create Farm Management Content
    $('#farm_management_console').append('<div id="id_farm_management_board" class="farm_management_board col-md-11 tab-content"></div>');
    //close button
    $('#id_farm_management_board').append('<div id="id_close_farm_management_console"><a onclick="close_farm_management_console();" title="ปิด"><i class="fa fa-times "></i></a></div>');
    //content
    var farm_management_console = document.getElementById('id_farm_management_board');
    //farm_detail wrapper
    var farm_content_wrap = document.createElement('div');
    farm_content_wrap.setAttribute('class','tab-content');
    farm_management_console.appendChild(farm_content_wrap);
    	//ข้อมูลเกษตร
    	var farm_menu_farm_detail = document.createElement('div');
    	farm_menu_farm_detail.setAttribute('id','farm_detail');
	    farm_menu_farm_detail.setAttribute('class','tab-pane fade in active');
	    farm_content_wrap.appendChild(farm_menu_farm_detail);
	    var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-8 wrap_card');
	    	farm_menu_farm_detail.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('class','card_menu');
		    	card_menu.setAttribute('id','progress_management');
		    		var progress_management_html = '';
		    		progress_management_html += '<div class="header_card" style="background-color: #5cb85c;">ติดตามการเพาะปลูก</div>';
		    		progress_management_html += '<div class="body_card">';
		    		progress_management_html += '<div id="progress_management_detail" class="col-md-12">';
		    		progress_management_html += '<ul class="nav nav-tabs" id="choose_progress_management">';
		    		$.ajax({
							url: site_url+"/api/v1.0/Crop/getCropsOfUser/"+user_id
						}).then(function(data) {
							var i = 0;
							var count = 0;
							var id_default = data.data[0].crop_id;
							if(data.data.length==0){
								document.getElementById('choose_progress_management').innerHTML = '<h1>ท่านยังไม่มีแปลงปลูกขณะนี้ !!!</h1>';
							}else{
								for(i=0;i<data.data.length;i++){
									if(count==0){
										document.getElementById('choose_progress_management').innerHTML = '<li class="active"><a data-toggle="tab" href="#detail_progress_'+count+'">'+data.data[count].crop_name+'</a></li>';
									}else{
										document.getElementById('choose_progress_management').innerHTML += '<li><a data-toggle="tab" href="#detail_progress_'+count+'">'+data.data[count].crop_name+'</a></li>';
									}
									count++;
								}
							}
					});
		    		progress_management_html += '</ul>';
		    		progress_management_html += '</div>';
		    		progress_management_html += '<div id="progress_management_sum" class="col-md-12 col-xs-12">';
		    		progress_management_html += '<div class="tab-content" id="progress_management_detail_tab">';
		    		$.ajax({
							url: site_url+"/api/v1.0/Crop/getCropsOfUserDetailList/"+user_id
						}).then(function(data) {
							var i = 0;
							var count = 0;
							var id_default = data.data[0].crop_id;
							var tab = document.getElementById('progress_management_detail_tab');
							if(data.data.length==0){
								tab.innerHTML = '<h1>ไม่มีข้อมูล !!!</h1>';
							}else{
								for(i=0;i<data.data.length;i++){
									if(count==0){
										var detail_progress = document.createElement('div');
										detail_progress.setAttribute('id','detail_progress_'+count);
										detail_progress.setAttribute('class','tab-pane fade in active');
										tab.appendChild(detail_progress);
										var progress_show_in_detail_tab = document.createElement('div');
										progress_show_in_detail_tab.setAttribute('class','progress_show_in_detail_tab');
										progress_show_in_detail_tab.innerHTML = '<h1>'+data.data[count].seed_name+'</h1><h2>'+data.data[count].breed_name+' ('+data.data[count].crop_rai+' ไร่ '+data.data[count].crop_ngarn+' งาน '+data.data[count].crop_wah+' ตารางวา)</h2><h3>แผน กข.47</h3><h5>ผู้ติดตาม : </h5>';
										detail_progress.appendChild(progress_show_in_detail_tab);
										var sum_show_in_detail_tab = document.createElement('div');
										sum_show_in_detail_tab.setAttribute('class','sum_show_in_detail_tab');
										detail_progress.appendChild(sum_show_in_detail_tab);
										var sum_acc = document.createElement('div');
										sum_acc.setAttribute('class','sum_list col-md-4');
										n = data.sum_acc[count];
										sum_acc.innerHTML = '<h2>เงินรวม</h2><h4>'+n.toLocaleString()+'</h4>';
										sum_show_in_detail_tab.appendChild(sum_acc);
										var sum_acc = document.createElement('div');
										sum_acc.setAttribute('class','sum_list col-md-4');
										var p = data.sum_pbm[count];
										sum_acc.innerHTML = '<h2>ปัญหา</h2><h4> '+p.toLocaleString()+' </h4>';
										sum_show_in_detail_tab.appendChild(sum_acc);
										var sum_acc = document.createElement('div');
										sum_acc.setAttribute('class','sum_list col-md-4');
										sum_acc.innerHTML = '<h2>พร้อมเก็บ</h2><h4>54 วัน</h4>';
										sum_show_in_detail_tab.appendChild(sum_acc);
									}else{
										var detail_progress = document.createElement('div');
										detail_progress.setAttribute('id','detail_progress_'+count);
										detail_progress.setAttribute('class','tab-pane fade');
										tab.appendChild(detail_progress);
										var progress_show_in_detail_tab = document.createElement('div');
										progress_show_in_detail_tab.setAttribute('class','progress_show_in_detail_tab');
										progress_show_in_detail_tab.innerHTML = '<h1>'+data.data[count].seed_name+'</h1><h2>'+data.data[count].breed_name+' ('+data.data[count].crop_rai+' ไร่ '+data.data[count].crop_ngarn+' งาน '+data.data[count].crop_wah+' ตารางวา)</h2><h3>แผน กข.47 (ออแกนิก)</h3><h5>ผู้ติดตาม : </h5>';
										detail_progress.appendChild(progress_show_in_detail_tab);
										var sum_show_in_detail_tab = document.createElement('div');
										sum_show_in_detail_tab.setAttribute('class','sum_show_in_detail_tab');
										detail_progress.appendChild(sum_show_in_detail_tab);
										var sum_acc = document.createElement('div');
										sum_acc.setAttribute('class','sum_list col-md-4');
										n = data.sum_acc[count];
										sum_acc.innerHTML = '<h2>เงินรวม</h2><h4>'+n.toLocaleString()+'</h4>';
										sum_show_in_detail_tab.appendChild(sum_acc);
										var sum_acc = document.createElement('div');
										sum_acc.setAttribute('class','sum_list col-md-4');
										var p = data.sum_pbm[count];
										sum_acc.innerHTML = '<h2>ปัญหา</h2><h4> '+p.toLocaleString()+' </h4>';
										sum_show_in_detail_tab.appendChild(sum_acc);
										var sum_acc = document.createElement('div');
										sum_acc.setAttribute('class','sum_list col-md-4');
										sum_acc.innerHTML = '<h2>พร้อมเก็บ</h2><h4>54 วัน</h4>';
										sum_show_in_detail_tab.appendChild(sum_acc);
									}
									count++;
								}
							}
					});
		    		progress_management_html += '</div></div>';//div class = progress_management_detail
		    		progress_management_html += '</div>';//body_card
		    		
		    	card_menu.innerHTML = progress_management_html;
		    	div_menu_wrap.appendChild(card_menu);
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-4 wrap_card');
	    	farm_menu_farm_detail.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('class','card_menu');
		    	card_menu.setAttribute('id','calendar_management');
		    	var calendar_management_html = '';
		    		calendar_management_html += '<div class="header_card" style="background-color: #5BC0DE;">ปฎิทินการเพาะปลูก</div>';
		    		calendar_management_html += '<div class="body_card">';
		    		calendar_management_html += '<table class="table table-bordered">';
		    		calendar_management_html += '<thead><tr><th>วันที่</th><th>กิจกรรม</th></tr>';
		    		calendar_management_html += '<tbody><tr><td>วันนี้</td><td>ไถนา</td></tr>';
		    		calendar_management_html += '<tbody><tr><td>28 ตุลาคม 2558</td><td>เตรียมดิน</td></tr>';
		    		calendar_management_html += '<tbody><tr><td>30 ตุลาคม 2558</td><td>ปล่อยน้ำลงนา</td></tr>';
		    		calendar_management_html += '</table>';
		    		calendar_management_html += '</div>';
		    	card_menu.innerHTML = calendar_management_html;
		    	div_menu_wrap.appendChild(card_menu);

	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_detail.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('id','market_management');
		    	card_menu.setAttribute('class','card_menu');
		    	var market_management_html = '';
		    		market_management_html += '<div class="header_card" style="background-color: #f0ad4e;">การเพาะปลูก</div>';
		    	card_menu.innerHTML = market_management_html;
		    	div_menu_wrap.appendChild(card_menu);


	    //บัญชีเพาะปลูก
	    var farm_menu_farm_account = document.createElement('div');
    	farm_menu_farm_account.setAttribute('id','farm_account');
	    farm_menu_farm_account.setAttribute('class','tab-pane fade');
	    farm_content_wrap.appendChild(farm_menu_farm_account);
	    	//เลือกแปลงปลูก
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_account.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('class','card_menu_choose');
		    	div_menu_wrap.appendChild(card_menu);
		    		var select_choose = document.createElement('select');
	    			select_choose.setAttribute('class','farm_account_choose form-control');
	    			select_choose.setAttribute('id','account_crops_list');
	    			select_choose.setAttribute('onchange','account_table(this.value);');
	    			card_menu.appendChild(select_choose);
		    			$.ajax({
							url: site_url+"/api/v1.0/Crop/getCropsOfUser/"+user_id
						}).then(function(data) {
							var i = 0;
							var count = 0;
							var id_default = data.data[0].crop_id;
							for(i=0;i<data.data.length;i++){
								var option_choose = document.createElement('option');
			    				option_choose.setAttribute('value',data.data[count].crop_id);
			    				option_choose.innerHTML = data.data[count].crop_name;
			    				document.getElementById('account_crops_list').appendChild(option_choose);
			    				count++;
							}
							account_table(id_default);
						});
	    			

	    //ปัญหาการเพาะปลูก
	    var farm_menu_farm_problem = document.createElement('div');
    	farm_menu_farm_problem.setAttribute('id','farm_problem');
	    farm_menu_farm_problem.setAttribute('class','tab-pane fade');
	    farm_content_wrap.appendChild(farm_menu_farm_problem);
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_problem.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('class','card_menu_choose');
		    	div_menu_wrap.appendChild(card_menu);
		    		var select_choose = document.createElement('select');
	    			select_choose.setAttribute('class','farm_problem_choose form-control');
	    			select_choose.setAttribute('id','farm_problem_select');
	    			select_choose.setAttribute('onchange','problem_table(this.value);');
	    			card_menu.appendChild(select_choose);
	    			$.ajax({
							url: site_url+"/api/v1.0/Crop/getCropsOfUser/"+user_id
						}).then(function(data) {
							var i = 0;
							var count = 0;
							var id_default = data.data[0].crop_id;
							for(i=0;i<data.data.length;i++){
								var option_choose = document.createElement('option');
			    				option_choose.setAttribute('value',data.data[count].crop_id);
			    				option_choose.innerHTML = data.data[count].crop_name;
			    				document.getElementById('farm_problem_select').appendChild(option_choose);
			    				count++;
							}
						problem_table(id_default);
						});
	    			
}
function close_farm_management_console(){
	$('#farm_management_console').remove();
}

function account_table(id_acc){
	$(document).ready(function() {
	    $.ajax({
	        url: site_url+"/api/v1.0/Crop/getAccountCrop/"+id_acc
	    }).then(function(data) {
	var farm_menu_farm_account = document.getElementById('farm_account');
	var id_farm_account_content = document.getElementById('id_farm_account_content');
	if(id_farm_account_content){
		id_farm_account_content.remove();
	}
	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	div_menu_wrap.setAttribute('id','id_farm_account_content');
	    	farm_menu_farm_account.appendChild(div_menu_wrap);
		    	var farm_account_content = document.createElement('div');
		    	farm_account_content.setAttribute('class','farm_account_content');
		    	div_menu_wrap.appendChild(farm_account_content);
		    		//ปุ่มรายรับรายจ๋าย
		    		var form_account = document.createElement('form');
		    		form_account.setAttribute('method','post');
		    		form_account.setAttribute('id','add_form_account');
		    		form_account.setAttribute('class','form-inline');
		    		form_account.setAttribute('role','form');
		    		farm_account_content.appendChild(form_account);
		    			var inp_crop = document.createElement('input');
					    inp_crop.setAttribute('type','hidden');
					    inp_crop.setAttribute('name','acc_crop_id');
					    inp_crop.setAttribute('value',id_acc)
					    form_account.appendChild(inp_crop);
		    				var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-2');
				    		div_in.style.paddingLeft = '0px';
				    		form_account.appendChild(div_in);
				    			var date = document.createElement('input');
					    		date.setAttribute('type','input');
					    		date.setAttribute('id','dpd1');
					    		date.style.width = '100%';
					    		date.setAttribute('class','form-control');
					    		date.setAttribute('data-date-format','dd-mm-yyyy');
					    		date.setAttribute('name','acc_date');
					    		div_in.appendChild(date);
					    		$('#dpd1').datepicker('setValue', new Date());

    						var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-5');
				    		form_account.appendChild(div_in);
					    		var inp_descript = document.createElement('input');
					    		inp_descript.setAttribute('type','input');
					    		inp_descript.style.width = '100%';
					    		inp_descript.setAttribute('class','form-control');
					    		inp_descript.setAttribute('name','acc_detail');
					    		inp_descript.setAttribute('placeholder','รายละเอียด');
					    		div_in.appendChild(inp_descript);
					    	var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-2');
				    		form_account.appendChild(div_in);
					    		var inp_select = document.createElement('select');
					    		inp_select.style.width = '100%';
					    		inp_select.setAttribute('class','form-control');
					    		inp_select.setAttribute('name','acc_cost_type');
					    		div_in.appendChild(inp_select);
					    			var opt_select = document.createElement('option');
					    			opt_select.setAttribute('value','1');
					    			opt_select.innerHTML = 'รายรับ';
					    			inp_select.appendChild(opt_select);
					    			var opt_select = document.createElement('option');
					    			opt_select.setAttribute('value','2');
					    			opt_select.innerHTML = 'รายจ่าย';
					    			inp_select.appendChild(opt_select);
					    	var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-2');
				    		form_account.appendChild(div_in);
					    		var inp_descript = document.createElement('input');
					    		inp_descript.setAttribute('type','input');
					    		inp_descript.style.width = '100%';
					    		inp_descript.setAttribute('class','form-control');
					    		inp_descript.setAttribute('name','acc_price');
					    		inp_descript.setAttribute('onchange','dokeyup(this)');
					    		inp_descript.setAttribute('onkeyup','dokeyup(this)');
					    		inp_descript.setAttribute('onkeypress','checknumber()');
					    		inp_descript.setAttribute('placeholder','จำนวนเงิน (บาท)');
					    		div_in.appendChild(inp_descript);

				    		var button_add_account = document.createElement('button');
				    		button_add_account.setAttribute('type','button');
				    		button_add_account.setAttribute('class','btn btn-success btn_add_account');
				    		button_add_account.setAttribute('onclick','dialog_add_income();');
				    		button_add_account.innerHTML = 'เพิ่มข้อมูล';
				    		form_account.appendChild(button_add_account);
		    		//ตารางรายรับรายจ๋าย
 		    		var table_content = document.createElement('table');
		    		table_content.setAttribute('class','table table-bordered');
		    		farm_account_content.appendChild(table_content);
		    			var thead = document.createElement('thead');
		    			table_content.appendChild(thead);
		    				var tr = document.createElement('tr');
		    				thead.appendChild(tr);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'วัน/เดือน/ปี';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'รายละเอียด';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'รายรับ (บาท)';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'รายจ่าย (บาท)';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'เงินคงเหลือ (บาท)';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'ตัวเลือก';
		    					tr.appendChild(th);

		    			var tbody = document.createElement('tbody');
			    		table_content.appendChild(tbody);
		    			if(data.status=='1'){
			    			var i = 0;
			    			var count = 0;
			    			var money_total = 0;
			    			var money_income = 0;
			    			var money_outcome = 0;
			    			var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
							"เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
							"ตุลาคม","พฤศจิกายน","ธันวาคม");
			    			for(i=0;i<data.data.length;i++){
			    				var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					var accdate = data.data[count].acc_date;
			    					var text = accdate.split("-");
			    					var year = parseInt(text[0]);
			    					var month = parseInt(text[1]);
			    					var day = parseInt(text[2]);
			    					year = year;
			    					td.innerHTML = day+' '+thmonth[month-1]+' '+year;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = data.data[count].acc_detail;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='1'){ 
			    						money_income = money_income+data.data[count].acc_price;
			    						money_total = money_total+data.data[count].acc_price;
			    						td.innerHTML = data.data[count].acc_price.toLocaleString(); 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='2'){ 
			    						money_outcome = money_outcome+data.data[count].acc_price;
			    						money_total = money_total+data.data[count].acc_price;
			    						m = data.data[count].acc_price*-1;
			    						td.innerHTML = m.toLocaleString(); 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_total.toLocaleString();
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<a onclick="edit_account_table('+id_acc+','+data.data[count].acc_id+')" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="dialog_delete_income('+data.data[count].acc_id+')" title="ลบ"><i class="fa fa-trash delete_acc"></i></a>';
			    					tr.appendChild(td);
			    					count++;
			    			}
			    				//รวมเงิน
			    				var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					td.innerHTML = 'รวม';
			    					td.style.textAlign = 'center';
			    					td.setAttribute('colspan','2');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_income.toLocaleString();
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					m = money_outcome*-1;
			    					td.innerHTML = m.toLocaleString('en-IN');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_total.toLocaleString('en-IN');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '';
			    					tr.appendChild(td);
		    			}else{
		    					var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					td.innerHTML = 'ไม่มีข้อมูลบัญชีรายรับ - รายจ่าย';
			    					td.style.textAlign = 'center';
			    					td.setAttribute('colspan','6');
			    					tr.appendChild(td);
		    			}
		    			
			
	    });
	});
}
function edit_account_table(id_acc,edt_id){
	$(document).ready(function() {
	    $.ajax({
	        url: site_url+"/api/v1.0/Crop/getAccountCrop/"+id_acc
	    }).then(function(data) {
	var farm_menu_farm_account = document.getElementById('farm_account');
	var id_farm_account_content = document.getElementById('id_farm_account_content');
	if(id_farm_account_content){
		id_farm_account_content.remove();
	}
	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	div_menu_wrap.setAttribute('id','id_farm_account_content');
	    	farm_menu_farm_account.appendChild(div_menu_wrap);
		    	var farm_account_content = document.createElement('div');
		    	farm_account_content.setAttribute('class','farm_account_content');
		    	div_menu_wrap.appendChild(farm_account_content);
		    		//ปุ่มรายรับรายจ๋าย
		    		var form_account = document.createElement('form');
		    		form_account.setAttribute('method','post');
		    		form_account.setAttribute('id','add_form_account');
		    		form_account.setAttribute('class','form-inline');
		    		form_account.setAttribute('role','form');
		    		farm_account_content.appendChild(form_account);
		    			var inp_crop = document.createElement('input');
					    inp_crop.setAttribute('type','hidden');
					    inp_crop.setAttribute('name','acc_crop_id');
					    inp_crop.setAttribute('value',id_acc)
					    form_account.appendChild(inp_crop);
		    				var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-2');
				    		div_in.style.paddingLeft = '0px';
				    		form_account.appendChild(div_in);
				    			var date = document.createElement('input');
					    		date.setAttribute('type','input');
					    		date.setAttribute('id','dpd1');
					    		date.style.width = '100%';
					    		date.setAttribute('class','form-control dpd');
					    		date.setAttribute('data-date-format','dd-mm-yyyy');
					    		date.setAttribute('name','acc_date');
					    		div_in.appendChild(date);
					    		$('.dpd').datepicker('setValue', '20-10-2015');

    						var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-5');
				    		form_account.appendChild(div_in);
					    		var inp_descript = document.createElement('input');
					    		inp_descript.setAttribute('type','input');
					    		inp_descript.style.width = '100%';
					    		inp_descript.setAttribute('class','form-control');
					    		inp_descript.setAttribute('name','acc_detail');
					    		inp_descript.setAttribute('placeholder','รายละเอียด');
					    		div_in.appendChild(inp_descript);
					    	var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-2');
				    		form_account.appendChild(div_in);
					    		var inp_select = document.createElement('select');
					    		inp_select.style.width = '100%';
					    		inp_select.setAttribute('class','form-control');
					    		inp_select.setAttribute('name','acc_cost_type');
					    		div_in.appendChild(inp_select);
					    			var opt_select = document.createElement('option');
					    			opt_select.setAttribute('value','1');
					    			opt_select.innerHTML = 'รายรับ';
					    			inp_select.appendChild(opt_select);
					    			var opt_select = document.createElement('option');
					    			opt_select.setAttribute('value','2');
					    			opt_select.innerHTML = 'รายจ่าย';
					    			inp_select.appendChild(opt_select);
					    	var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-2');
				    		form_account.appendChild(div_in);
					    		var inp_descript = document.createElement('input');
					    		inp_descript.setAttribute('type','input');
					    		inp_descript.style.width = '100%';
					    		inp_descript.setAttribute('class','form-control');
					    		inp_descript.setAttribute('name','acc_price');
					    		inp_descript.setAttribute('placeholder','จำนวนเงิน (บาท)');
					    		div_in.appendChild(inp_descript);

				    		var button_add_account = document.createElement('button');
				    		button_add_account.setAttribute('type','button');
				    		button_add_account.setAttribute('class','btn btn-success btn_add_account');
				    		button_add_account.setAttribute('onclick','dialog_add_income();');
				    		button_add_account.innerHTML = 'เพิ่มข้อมูล';
				    		form_account.appendChild(button_add_account);
		    		//ตารางรายรับรายจ๋าย
 		    		var table_content = document.createElement('table');
		    		table_content.setAttribute('class','table table-bordered');
		    		farm_account_content.appendChild(table_content);
		    			var thead = document.createElement('thead');
		    			table_content.appendChild(thead);
		    				var tr = document.createElement('tr');
		    				thead.appendChild(tr);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'วัน/เดือน/ปี';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'รายละเอียด';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'รายรับ (บาท)';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'รายจ่าย (บาท)';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'เงินคงเหลือ (บาท)';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'ตัวเลือก';
		    					tr.appendChild(th);

		    			var tbody = document.createElement('tbody');
			    		table_content.appendChild(tbody);
		    			if(data.status=='1'){
			    			var i = 0;
			    			var count = 0;
			    			var money_total = 0;
			    			var money_income = 0;
			    			var money_outcome = 0;
			    			var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
							"เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
							"ตุลาคม","พฤศจิกายน","ธันวาคม");
			    			for(i=0;i<data.data.length;i++){
			    				if(edt_id!=data.data[count].acc_id){
			    				//ถ้าไม่เป็น id ทีต้องการ่จะ edit
			    				var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					var accdate = data.data[count].acc_date;
			    					var text = accdate.split("-");
			    					var year = parseInt(text[0]);
			    					var month = parseInt(text[1]);
			    					var day = parseInt(text[2]);
			    					year = year;
			    					td.innerHTML = day+' '+thmonth[month-1]+' '+year;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = data.data[count].acc_detail;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='1'){ 
			    						money_income = money_income+data.data[count].acc_price;
			    						money_total = money_total+data.data[count].acc_price;
			    						td.innerHTML = data.data[count].acc_price.toLocaleString('en-IN'); 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='2'){ 
			    						money_outcome = money_outcome+data.data[count].acc_price;
			    						money_total = money_total-data.data[count].acc_price;
			    						td.innerHTML = data.data[count].acc_price.toLocaleString('en-IN'); 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_total.toLocaleString('en-IN');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<a onclick="edit_account_table('+id_acc+','+data.data[count].acc_id+')" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="dialog_delete_income('+data.data[count].acc_id+')" title="ลบ"><i class="fa fa-trash delete_acc"></i></a>';
			    					tr.appendChild(td);
			    					count++;
			    				}else{
			    					//ถ้า่เป็น id ทีต้องการ่จะ edit
			    					var tr = document.createElement('tr');
			    					tr.setAttribute('id','tr_field_edit');
			    					tr.innerHTML = '<input type="hidden" name="edt_acc_id" value="'+data.data[count].acc_id+'">';
			    					tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					var accdate = data.data[count].acc_date;
			    					var text = accdate.split("-");
			    					var year = parseInt(text[0]);
			    					var month = parseInt(text[1]);
			    					var day = parseInt(text[2]);
			    					year = year;
			    					td.innerHTML = '<input type="input" id="dpd1" class="form-control dpd" data-date-format="dd-mm-yyyy" name="edt_acc_date" style="width: 100%;" value="'+day+'-'+month+'-'+year+'">';
			    					$('.dpd').datepicker();
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<input type="input" class="form-control" name="edt_acc_detail" placeholder="รายละเอียด" value="'+data.data[count].acc_detail+'" style="width: 100%;">';
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='1'){ 
			    						money_income = money_income+data.data[count].acc_price;
			    						money_total = money_total+data.data[count].acc_price;
			    						td.innerHTML = '<input type="input" class="form-control" name="edt_acc_price" placeholder="จำนวนเงิน (บาท)" style="width: 100%;" onchange="dokeyup(this)" onkeyup="dokeyup(this)" onkeypress="checknumber()"  value="'+data.data[count].acc_price.toLocaleString()+'"><input type="hidden" name="edt_cost_type" value="'+data.data[count].acc_cost_type+'">'; 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='2'){ 
			    						money_outcome = money_outcome+data.data[count].acc_price;
			    						money_total = money_total-data.data[count].acc_price;
			    						td.innerHTML = '<input type="input" class="form-control" name="edt_acc_price" placeholder="จำนวนเงิน (บาท)" style="width: 100%;" onchange="dokeyup(this)" onkeyup="dokeyup(this)" onkeypress="checknumber()" value="'+data.data[count].acc_price.toLocaleString()+'"><input type="hidden" name="edt_cost_type" value="'+data.data[count].acc_cost_type+'">'; 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '-';
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<button type="button" style="margin: 0px 5px; float: none;" class="btn btn-warning btn_add_account" onclick="dialog_edit_income();">แก้ใข</button><button type="button" class="btn btn-danger style="margin: 0px 5px; float: none;" btn_add_account" onclick="account_table('+id_acc+')">ยกเลิก</button>';
			    					tr.appendChild(td);
			    					count++;
			    				}
			    			}
			    				//รวมเงิน
			    				var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					td.innerHTML = 'รวม';
			    					td.style.textAlign = 'center';
			    					td.setAttribute('colspan','2');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_income.toLocaleString('en-IN');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_outcome.toLocaleString('en-IN');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_total.toLocaleString('en-IN');
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '';
			    					tr.appendChild(td);
		    			}else{
		    					var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					td.innerHTML = 'ไม่มีข้อมูลบัญชีรายรับ - รายจ่าย';
			    					td.style.textAlign = 'center';
			    					td.setAttribute('colspan','6');
			    					tr.appendChild(td);
		    			}
		    			
			
	    });
	});
}
function dialog_add_income(){
	var $form = $('#add_form_account'),
	val_acc_crop_id = $form.find( "input[name='acc_crop_id']" ).val(),
	val_acc_date = $form.find( "input[name='acc_date']" ).val(),
	val_acc_detail = $form.find( "input[name='acc_detail']" ).val(),
	val_acc_price = $form.find( "input[name='acc_price']" ).val(),
	val_acc_cost_type = $form.find( "select[name='acc_cost_type']" ).val();
	$.ajax({
	    url: site_url+'/api/v1.0/Crop/AddAccountData',
	    type: 'post',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	acc_crop_id: val_acc_crop_id,
	        acc_date: val_acc_date,
	        acc_detail: val_acc_detail,
	        acc_price: val_acc_price,
	        acc_cost_type: val_acc_cost_type,
	    },
	    success: function (data) {
	        account_table(val_acc_crop_id);
	    }
	});
}
function dialog_delete_income(dlt_id){
	var $form = $('#add_form_account'),
	val_acc_crop_id = $form.find( "input[name='acc_crop_id']" ).val();
	$.ajax({
	    url: site_url+'/api/v1.0/Crop/DeleteAccountData',
	    type: 'DELETE',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	_method:"DELETE",
	    	dlt_user_ip: user_ip,
	    	dlt_acc_id: dlt_id,
	    	dlt_user_id: user_id,
	    },
	    success: function (data) {
	        account_table(val_acc_crop_id);
	    }
	});
}
function dialog_edit_income(){
	var $form = $('#add_form_account'),
	val_acc_crop_id = $form.find( "input[name='acc_crop_id']" ).val();
	var $tr_field = $('#tr_field_edit'),
	acc_id = $tr_field.find( "input[name='edt_acc_id']" ).val(),
	acc_date = $tr_field.find( "input[name='edt_acc_date']" ).val(),
	acc_price = $tr_field.find( "input[name='edt_acc_price']" ).val(),
	acc_cost_type = $tr_field.find( "input[name='edt_cost_type']" ).val(),
	acc_detail = $tr_field.find( "input[name='edt_acc_detail']" ).val();
	$.ajax({
	    url: site_url+'/api/v1.0/Crop/EditAccountData',
	    type: 'PUT',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	_method:"PUT",
	    	edt_acc_id: acc_id,
	    	edt_acc_date: acc_date,
	    	edt_acc_price: acc_price,
	    	edt_acc_cost_type: acc_cost_type,
	    	edt_acc_detail: acc_detail,
	    	edt_acc_crop_id: val_acc_crop_id,
	    },
	    success: function (data) {
	        account_table(val_acc_crop_id);
	    }
	});
}
function problem_table(id_prb){
	$(document).ready(function() {
	    $.ajax({
	        url: site_url+"/api/v1.0/Crop/getProblemCrop/"+id_prb
	    }).then(function(data) {
	var farm_menu_farm_problem = document.getElementById('farm_problem');
	var id_farm_problem_content = document.getElementById('id_farm_problem_content');
	if(id_farm_problem_content){
		id_farm_problem_content.remove();
	}
	var div_menu_wrap = document.createElement('div');
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
		    div_menu_wrap.setAttribute('id','id_farm_problem_content');
	    	farm_menu_farm_problem.appendChild(div_menu_wrap);
		    	var farm_problem_content = document.createElement('div');
		    	farm_problem_content.setAttribute('class','farm_problem_content');
		    	div_menu_wrap.appendChild(farm_problem_content);
		    	//ปุ่มเพิ่มปัญหา
		    		var form_problem = document.createElement('form');
		    		form_problem.setAttribute('method','post');
		    		form_problem.setAttribute('id','add_form_problem');
		    		form_problem.setAttribute('class','form-inline');
		    		form_problem.setAttribute('role','form');
		    		farm_problem_content.appendChild(form_problem);
		    			var inp_crop = document.createElement('input');
					    inp_crop.setAttribute('type','hidden');
					    inp_crop.setAttribute('name','pbm_crop_id');
					    inp_crop.setAttribute('value',id_prb)
					    form_problem.appendChild(inp_crop);
					    	var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-12');
				    		div_in.style.marginBottom = '15px';
				    		form_problem.appendChild(div_in);
					    		var inp_descript = document.createElement('textarea');
					    		inp_descript.style.width = '100%';
					    		inp_descript.setAttribute('class','form-control');
					    		inp_descript.setAttribute('name','pbm_detail');
					    		inp_descript.setAttribute('placeholder','ปัญหาที่พบ');
					    		div_in.appendChild(inp_descript);
				    		var button_add_problem = document.createElement('button');
				    		button_add_problem.setAttribute('type','button');
				    		button_add_problem.setAttribute('onclick','dialog_add_problem();');
				    		button_add_problem.setAttribute('class','btn btn-success btn_add_problem');
				    		button_add_problem.innerHTML = 'เพิ่มปัญหา';
				    		form_problem.appendChild(button_add_problem);

		    		//ปัญหา
		    		var table_content = document.createElement('table');
		    		table_content.setAttribute('class','table table-bordered');
		    		farm_problem_content.appendChild(table_content);

		    			var thead = document.createElement('thead');
		    			table_content.appendChild(thead);
		    				var tr = document.createElement('tr');
		    				thead.appendChild(tr);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'วัน/เดือน/ปี';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'ปัญหา';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'สถานะ';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'ตัวเลือก';
		    					tr.appendChild(th);

		    			var tbody = document.createElement('tbody');
		    			table_content.appendChild(tbody);
		    			if(data.status=='1'){
		    				var count = 0;
		    				var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
							"เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
							"ตุลาคม","พฤศจิกายน","ธันวาคม");
			    			for(i=0;i<data.data.length;i++){
			    				var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					var accdate = data.data[count].created_at;
			    					var text = accdate.split("-");
			    					var year = parseInt(text[0]);
			    					var month = parseInt(text[1]);
			    					var day = parseInt(text[2]);
			    					year = year;
			    					td.innerHTML = day+' '+thmonth[month-1]+' '+year;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = data.data[count].tp_title;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].tp_status=='0'){
			    						td.innerHTML = 'รอคำตอบ';
			    						td.style.textAlign = 'center';
			    						td.style.color = 'orange';
			    					}else if(data.data[count].tp_status=='1'){
			    						td.innerHTML = 'ดูคำตอบ';
			    						td.style.color = 'green';
			    						td.style.textAlign = 'center';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<a onclick="edit_problem_table('+id_prb+','+data.data[count].tp_id+')" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="dialog_delete_problem('+data.data[count].tp_id+')" title="ลบ"><i class="fa fa-trash delete_acc"></i></a>';
			    					tr.appendChild(td);
			    					count++;
							}
						}else{
		    					var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					td.innerHTML = 'ไม่มีข้อมูลปัญหาการเพาะปลูก';
			    					td.style.textAlign = 'center';
			    					td.setAttribute('colspan','4');
			    					tr.appendChild(td);
		    			}
	    });
	});
}
function dialog_add_problem(){
	var $form = $('#add_form_problem'),
	add_pbm_detail = $form.find( "textarea[name='pbm_detail']" ).val(),
	add_pbm_crop_id = $form.find( "input[name='pbm_crop_id']" ).val();
	$.ajax({
	    url: site_url+'/api/v1.0/Crop/AddProblemData',
	    type: 'post',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	pbm_detail: add_pbm_detail,
	        pbm_crop_id: add_pbm_crop_id,
	    },
	    success: function (data) {
	        problem_table(add_pbm_crop_id);
	    }
	});
}
function dialog_delete_problem(dlt_id){
	var $form = $('#add_form_problem'),
	val_acc_crop_id = $form.find( "input[name='pbm_crop_id']" ).val();
	$.ajax({
	    url: site_url+'/api/v1.0/Crop/DeleteProblemData',
	    type: 'DELETE',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	_method:"DELETE",
	    	dlt_pbm_id: dlt_id,
	    },
	    success: function (data) {
	        problem_table(val_acc_crop_id);
	    }
	});
}
function edit_problem_table(id_prb,edt_id){
	$(document).ready(function() {
	    $.ajax({
	        url: site_url+"/api/v1.0/Crop/getProblemCrop/"+id_prb
	    }).then(function(data) {
	var farm_menu_farm_problem = document.getElementById('farm_problem');
	var id_farm_problem_content = document.getElementById('id_farm_problem_content');
	if(id_farm_problem_content){
		id_farm_problem_content.remove();
	}
	var div_menu_wrap = document.createElement('div');
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
		    div_menu_wrap.setAttribute('id','id_farm_problem_content');
	    	farm_menu_farm_problem.appendChild(div_menu_wrap);
		    	var farm_problem_content = document.createElement('div');
		    	farm_problem_content.setAttribute('class','farm_problem_content');
		    	div_menu_wrap.appendChild(farm_problem_content);
		    	//ปุ่มเพิ่มปัญหา
		    		var form_problem = document.createElement('form');
		    		form_problem.setAttribute('method','post');
		    		form_problem.setAttribute('id','add_form_problem');
		    		form_problem.setAttribute('class','form-inline');
		    		form_problem.setAttribute('role','form');
		    		farm_problem_content.appendChild(form_problem);
		    			var inp_crop = document.createElement('input');
					    inp_crop.setAttribute('type','hidden');
					    inp_crop.setAttribute('name','pbm_crop_id');
					    inp_crop.setAttribute('value',id_prb)
					    form_problem.appendChild(inp_crop);
					    	var div_in = document.createElement('div');
				    		div_in.setAttribute('class','col-md-12');
				    		div_in.style.marginBottom = '15px';
				    		form_problem.appendChild(div_in);
					    		var inp_descript = document.createElement('textarea');
					    		inp_descript.style.width = '100%';
					    		inp_descript.setAttribute('class','form-control');
					    		inp_descript.setAttribute('name','pbm_detail');
					    		inp_descript.setAttribute('placeholder','ปัญหาที่พบ');
					    		div_in.appendChild(inp_descript);
				    		var button_add_problem = document.createElement('button');
				    		button_add_problem.setAttribute('type','button');
				    		button_add_problem.setAttribute('onclick','dialog_add_problem();');
				    		button_add_problem.setAttribute('class','btn btn-success btn_add_problem');
				    		button_add_problem.innerHTML = 'เพิ่มปัญหา';
				    		form_problem.appendChild(button_add_problem);

		    		//ปัญหา
		    		var table_content = document.createElement('table');
		    		table_content.setAttribute('class','table table-bordered');
		    		farm_problem_content.appendChild(table_content);

		    			var thead = document.createElement('thead');
		    			table_content.appendChild(thead);
		    				var tr = document.createElement('tr');
		    				thead.appendChild(tr);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'วัน/เดือน/ปี';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'ปัญหา';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'สถานะ';
		    					tr.appendChild(th);
		    					var th = document.createElement('th');
		    					th.innerHTML = 'ตัวเลือก';
		    					tr.appendChild(th);

		    			var tbody = document.createElement('tbody');
		    			table_content.appendChild(tbody);
		    			if(data.status=='1'){
		    				var count = 0;
		    				var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
							"เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
							"ตุลาคม","พฤศจิกายน","ธันวาคม");
			    			for(i=0;i<data.data.length;i++){
			    				if(edt_id==data.data[count].pbm_id){
			    					var tr = document.createElement('tr');
			    					tr.setAttribute('id','tr_field_edit_problem');
			    					tr.innerHTML = '<input type="hidden" name="edt_pbm_id" value="'+data.data[count].pbm_id+'">';
			    					tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					var accdate = data.data[count].pbm_date;
			    					var text = accdate.split("-");
			    					var year = parseInt(text[0]);
			    					var month = parseInt(text[1]);
			    					var day = parseInt(text[2]);
			    					year = year;
			    					td.innerHTML = day+' '+thmonth[month-1]+' '+year;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<textarea name="edt_pbm_detail" class="form-control" width="100%">'+data.data[count].pbm_detail+'</textarea>';
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    						td.innerHTML = 'แก้ใข';
			    						td.style.textAlign = 'center';
			    						td.style.color = 'red';
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<button type="button" style="margin: 0px 5px; float: none;" class="btn btn-warning btn_add_account" onclick="dialog_edit_problem();">แก้ใข</button><button type="button" class="btn btn-danger style="margin: 0px 5px; float: none;" btn_add_account" onclick="problem_table('+id_prb+')">ยกเลิก</button>';
			    					tr.appendChild(td);
			    					count++;
			    				}else{
			    					var tr = document.createElement('tr');
			    					tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					var accdate = data.data[count].pbm_date;
			    					var text = accdate.split("-");
			    					var year = parseInt(text[0]);
			    					var month = parseInt(text[1]);
			    					var day = parseInt(text[2]);
			    					year = year;
			    					td.innerHTML = day+' '+thmonth[month-1]+' '+year;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = data.data[count].pbm_detail;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].pbm_status=='0'){
			    						td.innerHTML = 'รอคำตอบ';
			    						td.style.textAlign = 'center';
			    						td.style.color = 'orange';
			    					}else if(data.data[count].pbm_status=='1'){
			    						td.innerHTML = 'สำเร็จ';
			    						td.style.color = 'green';
			    						td.style.textAlign = 'center';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<a onclick="edit_problem_table('+id_prb+','+data.data[count].pbm_id+')" title="แก้ไข"><i class="fa fa-pencil-square edit_acc"></i></a><a onclick="dialog_delete_problem('+data.data[count].pbm_id+')" title="ลบ"><i class="fa fa-trash delete_acc"></i></a>';
			    					tr.appendChild(td);
			    					count++;
			    				}
			    				
							}
						}else{
		    					var tr = document.createElement('tr');
			    				tbody.appendChild(tr);
			    					var td = document.createElement('td');
			    					td.innerHTML = 'ไม่มีข้อมูลปัญหาการเพาะปลูก';
			    					td.style.textAlign = 'center';
			    					td.setAttribute('colspan','4');
			    					tr.appendChild(td);
		    			}
	    });
	});
}
function dialog_edit_problem(){
	var $form = $('#add_form_problem'),
	val_pbm_crop_id = $form.find( "input[name='pbm_crop_id']" ).val();
	var $tr_field = $('#tr_field_edit_problem'),
	edt_pbm_detail = $tr_field.find( "textarea[name='edt_pbm_detail']" ).val(),
	edt_pbm_id = $tr_field.find( "input[name='edt_pbm_id']" ).val();
	$.ajax({
	    url: site_url+'/api/v1.0/Crop/EditProblemData',
	    type: 'PUT',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	_method:"PUT",
	    	edt_pbm_id: edt_pbm_id,
	    	edt_pbm_detail: edt_pbm_detail,
	    },
	    success: function (data) {
	        problem_table(val_pbm_crop_id);
	    }
	});
}
//เติม , (คอมมา)
function dokeyup( obj )
{
  var key = event.keyCode;
  if( key != 37 & key != 39 & key != 110 )
  {
    var value = obj.value;
    var svals = value.split( "." ); //แยกทศนิยมออก
    var sval = svals[0]; //ตัวเลขจำนวนเต็ม
  
    var n = 0;
    var result = "";
    var c = "";
    for ( a = sval.length - 1; a >= 0 ; a-- )
    {
      c = sval.charAt(a);
      if ( c != ',' )
      {
        n++;
        if ( n == 4 )
        {
          result = "," + result;
          n = 1;
        };
        result = c + result;
      };
    };
  
    if ( svals[1] )
    {
      result = result + '.' + svals[1];
    };
  
    obj.value = result;
  };
};

//ให้ text รับค่าเป็นตัวเลขอย่างเดียว
function checknumber()
{
  key = event.keyCode;
  if ( key != 46 & ( key < 48 || key > 57 ) )
  {
    event.returnValue = false;
  };
};