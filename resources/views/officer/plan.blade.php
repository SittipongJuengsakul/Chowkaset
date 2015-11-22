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