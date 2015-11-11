@extends('app')

@section('title', 'หน้าหลัก')

@section('content')
	
	{!! $map['js'] !!}
	
	<div style="background-color: white;height: 100%;padding: 0px;" class="col-md-3">

		<div class="map_search_header">
			<h1>ตั้งค่าแผนที่เพาะปลูก</h1>
		</div>
		<div class="map_search_tab">
			<ul class="nav nav-pills">
			  <li class="active"><a data-toggle="pill" href="#home">พืช</a></li>
			  <li><a data-toggle="pill" href="#menu1">เกษตรกร</a></li>
			  <li><a data-toggle="pill" href="#menu2">พื้นที่</a></li>
			</ul>
		</div>
		<div class="map_search_content">
		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		    <form role="form">
			  <div class="form-group" style="margin-top: 15px;">
		    	<label>ชนิดพืช : </label>
			    <select data-placeholder="เลือกชนิดพืช" class="form-control chosen-select" tabindex="1">
	            <option value=""></option>
	            <option value="United States">ข้าว</option>
	            <option value="United States">อ้อย</option>
	            <option value="United States">มันสำปะหลัง</option>
	    		</select>
			  </div>
			  <div class="form-group" style="margin-top: 15px;">
		    	<label>พันธุ์พืช : </label>
			    <select data-placeholder="เลือกพันธุ์พืช" class="form-control chosen-select" tabindex="1">
	            <option value=""></option>
	            <option value="United States">กข. 47</option>
	    		</select>
			  </div>
			  <div class="form-group" style="margin-top: 15px;">
		    	<label>แผนการเพาะปลูก : </label>
			    <select data-placeholder="เลือกแผนการเพาะปลูก" class="form-control chosen-select" tabindex="1">
	            <option value=""></option>
	            <option value="United States">กข.47 (ออแกนิก)</option>
	            <option value="dddd">กข.47 (ทนแล้ง)</option>
	    		</select>
			  </div>
			  <button type="submit" class="btn btn-default" style="margin-left: 40%;">ค้นหา</button>
			</form>
		  </div>
		  <div id="menu1" class="tab-pane fade">
		    <form role="form">
			  <div class="form-group" style="margin-top: 15px;">
		    	<label>ชื่อ-นามสกุล : </label>
		    	<input type="text" class="form-control" id="email" placeholder="กรอกชื่อบุคคลที่ต้องการค้นหา">
			  </div>
			  <div class="form-group" style="margin-top: 15px;">
		    	<label>รหัสบัตรประชาชน : </label>
		    	<input type="text" class="form-control" id="email" placeholder="กรอกเลขบัตรประชาชนที่ต้องการค้นหา">
			  </div>
			  <button type="submit" class="btn btn-default" style="margin-left: 40%;">ค้นหา</button>
			</form>
		  </div>
		  <div id="menu2" class="tab-pane fade">
		    <form>
			<div class="side-by-side clearfix">
			  <div class="form-group" style="margin-top: 15px;">
		    	<label>จังหวัด : </label>
			    <select data-placeholder="เลือกชนิดพืช" class="chosen-select" tabindex="2">
	            <option value=""></option>
	            <option value="444">ข้าว</option>
	    		</select>
			  </div>
			 </div>
			  <button type="submit" class="btn btn-default" style="margin-left: 40%;">ค้นหา</button>
			</form>
		  </div>
		</div>
		</div>
	</div>
	{!! $map['html'] !!}
	

	<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  	</script>
	<script src="{{ URL::asset('assets/js/interact-1.2.5.min.js') }}"></script>
	<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        window.location.hash = '';
    }
	</script>
	<script>
	 $( document ).ready(function() {
	    //create Element Menu
	    //var map_canvas = document.getElementById('map_canvas');
	    //var dashboard_menu = document.createElement('div');
	    //dashboard_menu.setAttribute('id','chowkaset_dashboard_menu');
	    //map_canvas.appendChild(dashboard_menu);
	    //alert
	});
	 </script>
@stop