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
		    	div_menu_wrap.appendChild(card_menu);

	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-4 wrap_card');
	    	farm_menu_farm_detail.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('class','card_menu');
		    	div_menu_wrap.appendChild(card_menu);

	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_detail.appendChild(div_menu_wrap);
		    	var card_menu = document.createElement('div');
		    	card_menu.setAttribute('class','card_menu');
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
							for(i=0;i<data.data.length;i++){
								var option_choose = document.createElement('option');
			    				option_choose.setAttribute('value',data.data[count].crop_id);
			    				option_choose.innerHTML = data.data[count].crop_name;
			    				document.getElementById('farm_problem_select').appendChild(option_choose);
			    				count++;
							}
						});
	    			problem_table();
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
					    		$('#dpd1').datepicker('setValue', '20-10-2015');

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
				    		button_add_account.setAttribute('class','btn btn-warning btn_add_account');
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
			    						td.innerHTML = data.data[count].acc_price; 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					if(data.data[count].acc_cost_type=='2'){ 
			    						money_outcome = money_outcome+data.data[count].acc_price;
			    						money_total = money_total-data.data[count].acc_price;
			    						td.innerHTML = data.data[count].acc_price; 
			    					}else{
			    						td.innerHTML = '-';
			    					}
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_total;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = '<a href="#edit'+data.data[count].acc_id+'" title="แก้ไข"><i class="fa fa-pencil-square"></i></a>';
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
			    					td.innerHTML = money_income;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_outcome;
			    					tr.appendChild(td);
			    					var td = document.createElement('td');
			    					td.innerHTML = money_total;
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

function problem_table(id_prb){
	$(document).ready(function() {
	    $.ajax({
	        url: site_url+"/api/v1.0"
	    }).then(function(data) {
	var farm_menu_farm_problem = document.getElementById('farm_problem');
	var id_farm_problem_content = document.getElementById('id_farm_problem_content');
	if(id_farm_problem_content){
		id_farm_problem_content.remove();
	}
	var div_menu_wrap = document.createElement('div');
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_problem.appendChild(div_menu_wrap);
		    	var farm_problem_content = document.createElement('div');
		    	farm_problem_content.setAttribute('class','id_farm_problem_content');
		    	farm_problem_content.setAttribute('class','farm_problem_content');
		    	div_menu_wrap.appendChild(farm_problem_content);
		    	//ปุ่มรายรับรายจ๋าย
		    		var button_add_problem = document.createElement('button');
		    		button_add_problem.setAttribute('type','button');
		    		button_add_problem.setAttribute('class','btn btn-info btn_add_problem');
		    		button_add_problem.innerHTML = 'เพิ่มปัญหา';
		    		farm_problem_content.appendChild(button_add_problem);
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
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2 มกราคม 2558';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'ดินแข็ง ไถนาไม่ได้ครับ';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'สำเร็จ';
		    					td.style.color = 'green';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'คำแนะนำ';
		    					tr.appendChild(td);
			
	    });
	});
}