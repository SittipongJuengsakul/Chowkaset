function loginMenu(){
	//สร้างฟอร์มเพื่อเข้าสุ่หน้า login Menu
	var login_form = document.getElementById('login_form');
	var register_form = document.getElementById('register_form');
	if(register_form){
		register_form.remove();
	}
	if(login_form){
		login_form.remove();
	}else{
		var login_wrap = document.createElement('div');
		login_wrap.setAttribute('class','box-default col-md-6 col-md-offset-3');
		login_wrap.setAttribute('id','login_form');
		document.getElementById('map_canvas').appendChild(login_wrap);

		var panel_box = document.createElement('div');
		panel_box.setAttribute('class','panel box-default');
		login_wrap.appendChild(panel_box);
			var panel_head = document.createElement('div');
			panel_head.setAttribute('class','panel-heading');
			panel_box.appendChild(panel_head);
				var head_col = document.createElement('h3');
				head_col.setAttribute('class','head-col');
				head_col.innerHTML = 'เลือกเข้าสู่ระบบด้วย';
				panel_head.appendChild(head_col);
				var hr = document.createElement('hr');
				panel_head.appendChild(hr);
			var panel_body = document.createElement('div');
			panel_body.setAttribute('class','panel-body');
			panel_box.appendChild(panel_body);
				var login_form = document.createElement('form');
				login_form.setAttribute('class','form-horizontal');
				login_form.setAttribute('role','form');
				login_form.setAttribute('id','form');
				login_form.setAttribute('method','POST');
				login_form.setAttribute('action',site_url+'/auth/login');
				panel_body.appendChild(login_form);
					//token csrf 
					var tk = document.createElement('input');
					tk.setAttribute('type','hidden');
					tk.setAttribute('name','_token');
					tk.setAttribute('value',$('meta[name="csrf-token"]').attr('content'));
					login_form.appendChild(tk);
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var abtn = document.createElement('a');
						abtn.setAttribute('class','btn-cks-full btn btn-color-green');
						abtn.setAttribute('onclick','loginChowkaset()');
						abtn.innerHTML = '<div><i class="fa fa-check-square fa-2" style="font-size: 30px"> ชาวเกษตร</i></div>';
						wrap.appendChild(abtn);
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var abtn = document.createElement('a');
						abtn.setAttribute('class','btn-cks-full btn btn-color-blue');
						abtn.setAttribute('href',site_url+'/auth/facebook');
						abtn.innerHTML = '<div><i class="fa fa-facebook-square fa-2" style="font-size: 30px"> เฟซบุ๊ก</i></div>';
						wrap.appendChild(abtn);
					$.validate({
						modules: 'security, file',
							onModulesLoaded: function () {
								$('input[name="pass_confirmation"]').displayPasswordStrength();
							}
					});
	}
}
function loginChowkaset(){
	//สร้างฟอร์มเพื่อเข้าสุ่หน้า login
	var login_form = document.getElementById('login_form');
	var register_form = document.getElementById('register_form');
	if(register_form){
		register_form.remove();
	}
	if(login_form){
		login_form.remove();
	}
		var login_wrap = document.createElement('div');
		login_wrap.setAttribute('class','box-default col-md-6 col-md-offset-3');
		login_wrap.setAttribute('id','login_form');
		document.getElementById('map_canvas').appendChild(login_wrap);

		var panel_box = document.createElement('div');
		panel_box.setAttribute('class','panel box-default');
		login_wrap.appendChild(panel_box);
			var panel_head = document.createElement('div');
			panel_head.setAttribute('class','panel-heading');
			panel_box.appendChild(panel_head);
				var head_col = document.createElement('h3');
				head_col.setAttribute('class','head-col');
				head_col.innerHTML = 'เข้าสู่ระบบ';
				panel_head.appendChild(head_col);
				var hr = document.createElement('hr');
				panel_head.appendChild(hr);
			var panel_body = document.createElement('div');
			panel_body.setAttribute('class','panel-body');
			panel_body.style.overflow = 'scroll;';
			panel_box.appendChild(panel_body);
				var login_form = document.createElement('form');
				login_form.setAttribute('class','form-horizontal');
				login_form.setAttribute('role','form');
				login_form.setAttribute('id','form_login');
				login_form.setAttribute('method','POST');
				//login_form.setAttribute('action',site_url+'/auth/chowkaset/postLogin');
				panel_body.appendChild(login_form);
					//token csrf 
					var tk = document.createElement('input');
					tk.setAttribute('type','hidden');
					tk.setAttribute('name','_token');
					tk.setAttribute('value',$('meta[name="csrf-token"]').attr('content'));
					login_form.appendChild(tk);
					//username
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var us = document.createElement('input');
						us.setAttribute('type','text');
						us.setAttribute('class','form-control input-cks-form');
						us.setAttribute('name','username');
						us.setAttribute('placeholder','กรอก Username');
						wrap.appendChild(us);
					//password
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var ps = document.createElement('input');
						ps.setAttribute('type','password');
						ps.setAttribute('class','form-control input-cks-form');
						ps.setAttribute('name','password');
						ps.setAttribute('placeholder','กรอกรหัสผ่าน');
						wrap.appendChild(ps);
					//password
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var h3 = document.createElement('h3');
						h3.style.color = 'red';
						h3.style.textAlign = 'center';
						h3.setAttribute('id','login_fail_area');
						wrap.appendChild(h3);
					//submit button
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var sm = document.createElement('button');
						sm.setAttribute('type','button');
						sm.setAttribute('onclick','loginUser();');
						sm.setAttribute('class','btn btn-cks-full btn-color-green');
						sm.innerHTML = 'เข้าสู่ระบบ';
						wrap.appendChild(sm);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var abtn = document.createElement('a');
						abtn.setAttribute('class','btn-cks-full btn btn-color-blue');
						abtn.setAttribute('onclick','registerChowkaset()');
						abtn.innerHTML = 'สมัครสมาชิก';
						wrap.appendChild(abtn);
						var abtn = document.createElement('a');
						abtn.setAttribute('class','btn-cks-full btn btn-color-red');
						abtn.setAttribute('onclick','loginMenu()');
						abtn.innerHTML = 'ยกเลิก';
						wrap.appendChild(abtn);
					$.validate({
						modules: 'security, file',
							onModulesLoaded: function () {
								$('input[name="pass_confirmation"]').displayPasswordStrength();
							}
					});
}
function loginUser(){
	var $form = $('#form_login'),
	username_user = $form.find( "input[name='username']" ).val(),
	password_user = $form.find( "input[name='password']" ).val();
	$.ajax({
	    url: site_url+'/auth/chowkaset/postLogin',
	    type: 'post',
	    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
	    data: {
	    	username: username_user,
	        password: password_user,
	    },
	    success: function (data) {
	        if(data=='pass'){
	        	window.location.href = site_url+'/home';
	        }else{
	        	document.getElementById('login_fail_area').innerHTML = 'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด!';
	        }
	    }
	});
}
function checkProfile(){
	//สร้างฟอร์มเพื่อเข้าสุ่หน้า login
	var login_form = document.getElementById('login_form');
	if(login_form){
		login_form.remove();
	}else{
		var login_wrap = document.createElement('div');
		login_wrap.setAttribute('class','box-default col-md-6 col-md-offset-3');
		login_wrap.setAttribute('id','login_form');
		document.getElementById('map_canvas').appendChild(login_wrap);

		var panel_box = document.createElement('div');
		panel_box.setAttribute('class','panel box-default');
		login_wrap.appendChild(panel_box);
			var panel_head = document.createElement('div');
			panel_head.setAttribute('class','panel-heading');
			panel_box.appendChild(panel_head);
				var head_col = document.createElement('h3');
				head_col.setAttribute('class','head-col');
				head_col.innerHTML = 'เข้าสู่ระบบ';
				panel_head.appendChild(head_col);
				var hr = document.createElement('hr');
				panel_head.appendChild(hr);
			var panel_body = document.createElement('div');
			panel_body.setAttribute('class','panel-body');
			panel_box.appendChild(panel_body);
				var login_form = document.createElement('form');
				login_form.setAttribute('class','form-horizontal');
				login_form.setAttribute('role','form');
				login_form.setAttribute('method','POST');
				login_form.setAttribute('action',site_url+'/auth/login');
				panel_body.appendChild(login_form);
					//token csrf 
					var tk = document.createElement('input');
					tk.setAttribute('type','hidden');
					tk.setAttribute('name','_token');
					tk.setAttribute('value',$('meta[name="csrf-token"]').attr('content'));
					login_form.appendChild(tk);
					//username
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var us = document.createElement('input');
						us.setAttribute('type','text');
						us.setAttribute('class','form-control input-cks-form');
						us.setAttribute('name','username');
						wrap.appendChild(us);
					//password
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var ps = document.createElement('input');
						ps.setAttribute('type','password');
						ps.setAttribute('class','form-control input-cks-form');
						ps.setAttribute('name','password');
						wrap.appendChild(ps);
					//submit button
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var sm = document.createElement('button');
						sm.setAttribute('type','submit');
						sm.setAttribute('class','btn-cks-full btn-color-green');
						sm.innerHTML = 'เข้าสู่ระบบ';
						wrap.appendChild(sm);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var h5 = document.createElement('h5');
						h5.innerHTML = 'หรือ';
						h5.style.textAlign = 'center';
						wrap.appendChild(h5);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var abtn = document.createElement('a');
						abtn.setAttribute('class','btn-cks-full btn btn-color-blue');
						abtn.setAttribute('href',site_url+'/auth/facebook');
						abtn.innerHTML = '<i class="fa fa-facebook-square fa-2" style="font-size: 30px"></i>';
						wrap.appendChild(abtn);
	}
}
function registerChowkaset(){
	//สร้างฟอร์มเพื่อเข้าสุ่หน้า login
	var login_form = document.getElementById('login_form');
	if(login_form){
		login_form.remove();
	}
	var register_form = document.createElement('div');
		register_form.setAttribute('class','box-default col-md-6 col-md-offset-3');
		register_form.setAttribute('id','register_form');
		register_form.style.overflow = 'scroll';
		register_form.style.height = '95%';
		document.getElementById('map_canvas').appendChild(register_form);

		var panel_box = document.createElement('div');
		panel_box.setAttribute('class','panel box-default');
		register_form.appendChild(panel_box);
			var panel_head = document.createElement('div');
			panel_head.setAttribute('class','panel-heading');
			panel_box.appendChild(panel_head);
				var head_col = document.createElement('h3');
				head_col.setAttribute('class','head-col');
				head_col.innerHTML = 'สมัครสมาชิก';
				panel_head.appendChild(head_col);
				var hr = document.createElement('hr');
				panel_head.appendChild(hr);
			var panel_body = document.createElement('div');
			panel_body.setAttribute('class','panel-body');
			panel_body.style.overflow = 'scroll';
			panel_body.style.height = '100%';
			panel_box.appendChild(panel_body);
				var login_form = document.createElement('form');
				login_form.setAttribute('class','form-horizontal');
				login_form.setAttribute('role','form');
				login_form.setAttribute('method','POST');
				login_form.setAttribute('action',site_url+'/auth/chowkaset/postRegister');
				login_form.setAttribute('enctype','multipart/form-data');
				panel_body.appendChild(login_form);
					//token csrf 
					var tk = document.createElement('input');
					tk.setAttribute('type','hidden');
					tk.setAttribute('name','_token');
					tk.setAttribute('value',$('meta[name="csrf-token"]').attr('content'));
					login_form.appendChild(tk);
					//picture user
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					wrap.style.textAlign = 'center';
					form_group.appendChild(wrap);
					var picarea = document.createElement('img');
					picarea.setAttribute('id','picarea');
					picarea.setAttribute('class','thumb');
					wrap.appendChild(picarea);
					var imf = document.createElement('input');
					imf.setAttribute('type','file');
					imf.setAttribute('id','PictureFile');
					imf.setAttribute('name','Picture');

					imf.style.marginLeft = '35%';
					imf.setAttribute('onchange','resizeImg(this)')
					imf.setAttribute('data-validation','mime size');
					imf.setAttribute('data-validation-allowing','jpg, png');
					imf.setAttribute('data-validation-max-size','2M');
					wrap.appendChild(imf);
					//username
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					wrap.setAttribute('id','regis_username');
					form_group.appendChild(wrap);
						var us = document.createElement('input');
						us.setAttribute('type','text');
						us.setAttribute('class','form-control input-cks-form');
						us.setAttribute('data-validation','required server length');
						us.setAttribute('data-validation-length','min6');
						us.setAttribute('data-validation-url',site_url+'/checkUsername');
						us.setAttribute('name','username');
						us.setAttribute('id','regisinp_username');
						us.setAttribute('placeholder','กรอก Username');
						wrap.appendChild(us);
					//password
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var ps = document.createElement('input');
						ps.setAttribute('type','password');
						ps.setAttribute('class','form-control input-cks-form');
						ps.setAttribute('name','pass_confirmation');
						ps.setAttribute('data-validation-length','min6');
						ps.setAttribute('placeholder','กรอกรหัสผ่าน');
						ps.setAttribute('data-validation','length strength');
						ps.setAttribute('data-validation-strength','1');
						wrap.appendChild(ps);
					//Confirm password
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var ps = document.createElement('input');
						ps.setAttribute('type','password');
						ps.setAttribute('class','form-control input-cks-form');
						ps.setAttribute('data-validation-length','min4');
						ps.setAttribute('data-validation','required length');
						ps.setAttribute('name','pass');
						ps.setAttribute('placeholder','กรอกรหัสผ่าน อีกครั้ง');
						ps.setAttribute('data-validation','confirmation');
						wrap.appendChild(ps);
					// ชื่อ ผู้ใช้
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var nm = document.createElement('input');
						nm.setAttribute('type','text');
						nm.setAttribute('class','form-control input-cks-form');
						nm.setAttribute('name','name');
						nm.setAttribute('placeholder','กรอกชื่อที่ต้องการแสดง');
						nm.setAttribute('data-validation','required');
						wrap.appendChild(nm);
					// อีเมล์ ผู้ใช้
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var nm = document.createElement('input');
						nm.setAttribute('type','email');
						nm.setAttribute('class','form-control input-cks-form');
						nm.setAttribute('name','email');
						nm.setAttribute('placeholder','กรอกอีเมล์ที่ต้องการใช้งาน');
						nm.setAttribute('data-validation','required email');
						wrap.appendChild(nm);
					//ประเภทผู้ใช้งาน
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
					var label = document.createElement('label');
					label.innerHTML = 'คุณคือ : ';
					wrap.appendChild(label);
					var select_choose = document.createElement('select');
	    			select_choose.setAttribute('name','typeuser_id')
	    			select_choose.setAttribute('class','form-control');
	    			select_choose.setAttribute('data-validation','required');
	    			wrap.appendChild(select_choose);
	    				var option = document.createElement('option');
	    				option.setAttribute('value','1')
	    				option.innerHTML = 'เกษตรกร';
	    				select_choose.appendChild(option);
	    				var option = document.createElement('option');
	    				option.setAttribute('value','2')
	    				option.innerHTML = 'ผู้สนใจสินค้าการเกษตร';
	    				select_choose.appendChild(option);

					//submit button
					var form_group = document.createElement('div');
					form_group.setAttribute('class','form-group');
					login_form.appendChild(form_group);
					var wrap = document.createElement('div');
					wrap.setAttribute('class','col-md-12');
					form_group.appendChild(wrap);
						var sm = document.createElement('button');
						sm.setAttribute('type','submit');
						sm.setAttribute('class','btn-cks-full btn-color-green');
						sm.innerHTML = 'สมัครสมาชิก';
						wrap.appendChild(sm);
						var sm = document.createElement('button');
						sm.setAttribute('type','button');
						sm.setAttribute('onclick','loginChowkaset()');
						sm.setAttribute('class','btn-cks-full btn-color-red');
						sm.innerHTML = 'ยกเลิก';
						wrap.appendChild(sm);
					
					$.validate({
						modules: 'security, file',
							onModulesLoaded: function () {
								$('input[name="pass_confirmation"]').displayPasswordStrength();
							}
					});
}
function resizeImg(input){
	if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#picarea')
        .attr('src', e.target.result);
    	};
    reader.readAsDataURL(input.files[0]);
  }
}

