<div id="place_kaset" class="place_kaset_class" style="display: none;">
<div id="background_place_kaset" class="background_full"></div>

<div class="col_place_kaset" id="id_col_place_kaset">
		<div class="place_kaset_header" id="name_rai"></div>
			<div class="place_kaset_progress" id="id_place_kaset_progress">
				<div class="progress_logo_area">
					<div class="logo-kaset">
						<img class="img-responsive" src="" id="pic_area">
					</div>
				</div>
			<div class="progress_progress_area">
				<div class="progress-kaset">
					<div class="pre_content_progress_bar">
						<p>ความก้าวหน้าในการเก็บเกี่ยว</p>
					</div>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">ความก้าวหน้า 40 %
						</div>
					</div>
				</div>
			</div>
			</div>
		<div class="tab_controll_place" id="id_tab_controll_place">
			<ul class="nav nav-tabs">
				<li class="active" id="tab_one"><a data-toggle="tab" href="#tab-detail" >ข้อมูลเพาะปลูก</a></li>
				<li id="tab_two"><a data-toggle="tab" href="#tab-contact">ติดต่อ</a></li>
			</ul>
		</div>
		<div class="place_kaset_content tab-content" id="id_place_kaset_content">
			<div class="tab-pane fade in active tab-kaset-detail" id="tab-detail">
				<form class="form_content_place_detail" role="form" method="POST" action="FileJSJA">
					<div class="form-group"><div class="col-md-12 kaset-padding-bottom">
						<label for="fname">ชื่อ-นามสกุล เจ้าของไร่</label><p id="kaset_name"></p><hr>
						<label for="seeds">พืชที่ปลูก</label><p p id="kaset_seed"></p><hr>
						<label for="size">จำนวนพื้นที่ปลูก</label><p id="kaset_place"></p><hr>
						<label for="product">จำนวนผลผลิตที่คาดว่าจะได้รับ (รวม)</label><p id="kaset_product"></p>
						<hr class="end-form">
					</div>
				</div>
				</form>
			</div>
				<div class="tab-pane fade tab-kaset-contact" id="tab-contact">
				<form class="form_content_place_detail" role="form" method="POST" action="FileJSJA">
					<div class="form-group"><div class="col-md-12 kaset-padding-bottom">
						<label for="tel">เบอร์โทรศัพท์</label><p id="kaset_phone"></p><hr>
						<label for="facebook">เฟสบุ๊ก</label>
						<div id="facebook_place">	
						</div>
						<hr>
						<label for="address">อีเมล์</label><p id="kaset_email"></p><hr class="end-form">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="footer_place_kaset " id="id_place_kaset_footer"></div>
	</div>
</div>
<script>
$( "#background_place_kaset" ).click(function() {
  $("#place_kaset").hide();
});
</script>

