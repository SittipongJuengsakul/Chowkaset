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
	    			card_menu.appendChild(select_choose);
	    				var option_choose = document.createElement('option');
	    				option_choose.setAttribute('value','1');
	    				option_choose.innerHTML = 'ไร่ 1';
	    				select_choose.appendChild(option_choose);
	    				var option_choose = document.createElement('option');
	    				option_choose.setAttribute('value','2');
	    				option_choose.innerHTML = 'ไร่ 2';
	    				select_choose.appendChild(option_choose);
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_account.appendChild(div_menu_wrap);
		    	var farm_account_content = document.createElement('div');
		    	farm_account_content.setAttribute('class','farm_account_content');
		    	div_menu_wrap.appendChild(farm_account_content);
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
		    					th.innerHTML = 'รายการ';
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

		    			var tbody = document.createElement('tbody');
		    			table_content.appendChild(tbody);
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2 มกราคม 2558';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'กู้เงินไถนา';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2000';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '-';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2000';
		    					tr.appendChild(td);
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = '';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'จ่ายค่าเครื่องไถ';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '-';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '1000';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '1000';
		    					tr.appendChild(td);
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = '23 มกราคม 2558';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'ค่าปุ๋ยเคมี';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '-';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '1215';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '-215';
		    					td.style.color = 'red';
		    					tr.appendChild(td);
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = '';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'กู้เงินตามี';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '3000';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '-';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2785';
		    					tr.appendChild(td);
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = '';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'จ่ายค่าคนงานไส่ปุ๋ย';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '-';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '500';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2285';
		    					tr.appendChild(td);
		    				//รวมเงิน
		    				var tr = document.createElement('tr');
		    				tbody.appendChild(tr);
		    					var td = document.createElement('td');
		    					td.innerHTML = 'รวม';
		    					td.style.textAlign = 'center';
		    					td.setAttribute('colspan','2');
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '5000';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2715';
		    					tr.appendChild(td);
		    					var td = document.createElement('td');
		    					td.innerHTML = '2285';
		    					tr.appendChild(td);

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
	    			card_menu.appendChild(select_choose);
	    				var option_choose = document.createElement('option');
	    				option_choose.setAttribute('value','1');
	    				option_choose.innerHTML = 'ไร่ 1';
	    				select_choose.appendChild(option_choose);
	    				var option_choose = document.createElement('option');
	    				option_choose.setAttribute('value','2');
	    				option_choose.innerHTML = 'ไร่ 2';
	    				select_choose.appendChild(option_choose);
	    	var div_menu_wrap = document.createElement('div');
	    	div_menu_wrap.setAttribute('class','col-md-12 wrap_card');
	    	farm_menu_farm_problem.appendChild(div_menu_wrap);
		    	var farm_account_content = document.createElement('div');
		    	farm_account_content.setAttribute('class','farm_problem_content');
		    	div_menu_wrap.appendChild(farm_account_content);
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

}
function close_farm_management_console(){
	$('#farm_management_console').remove();
}