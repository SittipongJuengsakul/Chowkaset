<div id="place_kaset_add" class="place_kaset_class" style="display: none;">
<div id="background_place_kaset_add"class="background_full"></div>

<div class="col_place_kaset col-md-6 col-md-offset-3" id="id_col_place_kaset" style="margin-left: 25%">
<form class="form_content_place_detail" role="form" method="POST" action="{{ url('/api/v1.0/Crop/new_crop') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="latitude" id="latitude_add_new_crop">
<input type="hidden" name="longitude" id="longitude_add_new_crop">
		<div class="place_kaset_header" id="name_rai">
			<div class="col-md-6 col-md-offset-3">
					        <input type="text" class="form-control" id="text" placeholder="ชื่อไร่" data-validation="required" value="" name="namerai" validation="required">
					</div>
		</div>
		<div class="tab_controll_place" id="id_tab_controll_place">
			<ul class="nav nav-tabs">
				<li class="active" id="tab_one" style="width: 100%;"><a data-toggle="tab" href="#add_tab_detail" >ข้อมูลเพาะปลูก</a></li>
			</ul>
		</div>
		<div class="place_kaset_content tab-content" id="id_place_kaset_content" style="padding: 10px 0px;">
			<div class="tab-pane fade in active tab-kaset-detail" id="add_tab_detail">
				<div class="form-group col-md-6">
					<div class="col-md-12">
						<label for="seeds">พืชที่ปลูก</label>
					</div>
					<div class="col-md-12">
					        <select data-placeholder="พืชที่ปลูก" class="form-control" id="seeds_area"name="seed" style="margin-bottom: 10px;"> 
				    		</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="col-md-12">
						<label for="seeds">พันธุ์ที่ปลูก</label>
					</div>
					<div class="col-md-12">
					        <select data-placeholder="พืชที่ปลูก" class="form-control" name="breed" style="margin-bottom: 10px;" id="breeds_area">
				    		</select>
					</div>
				</div>

				<div class="form-group col-md-6">
					<div class="col-md-12">
						<label for="seeds">แผนการเพาะปลูก</label>
					</div>
					<div class="col-md-12">
					        <select data-placeholder="พืชที่ปลูก" class="form-control" name="prefix_id" style="margin-bottom: 10px;"> 
				            <option value="1">ออแกนิก</option>
				    		</select>
					</div>
				</div>
				<div class="form-group col-md-12">
					<div class="col-md-12">
						<label for="seeds">พื้นที่ปลูก</label>
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" id="text" placeholder="จำนวนไร่" data-validation="required number" value="" name="rai" style="margin-bottom: 10px;">
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" id="text" placeholder="งาน" data-validation="required number" value="" name="ngarn" style="margin-bottom: 10px;">
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" id="text" placeholder="ตารางวา" data-validation="required number" value="" name="wah" style="margin-bottom: 10px;">
					</div>
				</div>
				<div class="form-group col-md-12">
					<div class="col-md-4 col-md-offset-4">
						<button type="submit" class="btn btn-success">ตกลง</button>
						<button id="cancle_add_new_crops" type="button" class="btn btn-danger">ยกเลิก</button>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
<script>

	$.validate({
			modules: 'security,file',
			onModulesLoaded: function () {
			$('input[name="pass_confirmation"]').displayPasswordStrength();
		}
	});
$( "#cancle_add_new_crops" ).click(function() {
  $("#place_kaset_add").hide();
});
var site_url = '{{ URL::to("/")}}';
$.ajax({
		url: site_url+"/api/v1.0/Crop/getSeedAll"
		}).then(function(seeds) {
		   	  var opt = '';
		   	  $.each(seeds.data, function(index, value) {
		   	  	opt += '<option value="'+value.seed_id+'">'+value.seed_name+'</option>';
		   	  });
		   	  $("#seeds_area").html(opt);
		   	  $("#breeds_area").empty();
				$.ajax({
				  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$("#seeds_area").val()
				}).then(function(breeds) {
				   	  var opt = '';
				   	  $.each(breeds.data, function(index, value) {
				   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
				   	  });
				   	  $("#breeds_area").html(opt);
				});	
});
	$("#seeds_area").change(function(){
		$("#breeds_area").empty();
		$.ajax({
		  url: site_url+"/api/v1.0/Crop/getBreedOfSeed/"+$("#seeds_area").val()
		}).then(function(breeds) {
				var opt = '';
				if(breeds.status==0){
					opt += '<option value="0">ไม่มีข้อมูลพันธุ์พืช</option>';
				}else{
				   	  $.each(breeds.data, function(index, value) {
				   	  	opt += '<option value="'+value.breed_id+'">'+value.breed_name+'</option>';
				   	  });
				}
				$("#breeds_area").html(opt);
		});	
	});
</script>