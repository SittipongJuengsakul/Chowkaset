//@Author : Sittipong Jungsakul
//Javascript Library for chowkaset  Web Application
//for help web application make element by javascript
function place_kaset(map_id) {
  var id_map_detail = document.getElementById('place_kaset');
  if(id_map_detail){
      $.ajax({
          url: site_url+"/api/v1.0/Crop/mapdetail/"+map_id
        }).then(function(data) {
          //ชื่อไร่
          $('#name_rai').html(data[0].crop_name);
          $('#pic_area').attr("src", data[0].picture);
          //ชื่อเกษตรกร
          if(data[0].fname==null||data[0].fname=='null'){
            $('#kaset_name').html(data[0].name);
          }else{
            $('#kaset_name').html(data[0].prefix_name+' '+data[0].fname+' '+data[0].lname);
          }
          //ชื่อพืช และ พันธุ์พืช
          $('#kaset_seed').html(data[0].seed_name+' ('+data[0].breed_name+')');
          //พื้นที่ปลูก
          $('#kaset_place').html(data[0].crop_rai+' ไร่ '+data[0].crop_ngarn+' งาน '+data[0].crop_wah+' ตารางวา');
          //จำนวนผลผลิต
          $('#kaset_product').html(data[0].crop_product+' กิโลกรัม');

          //display place kaset block
          $('#tab_two').removeClass('active');
          $('#tab-contact').removeClass('active in');
          $('#tab_one').addClass('active');
          $('#tab-detail').addClass('active in');
          $("#place_kaset").css("display", "block");
          if(data[0].fname==null||data[0].fname=='null'||data[0].fname==''){
            $('#kaset_phone').html('เกษตรกรท่านนี้ยังไม่ได้ระบุเบอร์โทรศัพท์');
            $('#kaset_email').html('เกษตรกรท่านนี้ยังไม์ได้ระบุอีเมล์');
            $('#facebook_place').html('เกษตรกรท่านนี้ยังไม่ได้ระบุเฟสบุ้ก');
          }else{
            $.ajax({
              url: site_url+"/api/v1.0/Profiles/phone_profile/"+data[0].pf_id
            }).then(function(phone) {
              //เบอร์โทรศัพท์
              var phone_number = '';
              var count = 1;
              var lengthdata = phone.length;
              if(lengthdata == 0){
                  phone_number = 'ไม่มีเบอร์โทรศัพท์';
              }else{
                $.each(phone, function(index, value) {
                  if(count<lengthdata){
                    phone_number += value.ct_detail+' , ';
                  }else{
                    phone_number += value.ct_detail;
                  }
                  count++;
                });
              }
              $('#kaset_phone').html(phone_number);
              });
              $.ajax({
              url: site_url+"/api/v1.0/Profiles/email_profile/"+data[0].pf_id
              }).then(function(emaildt) {
              //เบอร์โทรศัพท์
              var email = '';
              var count = 1;
              var lengthdata = emaildt.length;
              if(lengthdata == 0){
                email = 'ไม่มีอีเมล์';
              }else{
                $.each(emaildt, function(index, value) {
                  if(count<lengthdata){
                    email += value.ct_detail+' , ';
                  }else{
                    email += value.ct_detail;
                  }
                  count++;
                });
              }
              $('#kaset_email').html(email);
              });
              $.ajax({
              url: site_url+"/api/v1.0/Profiles/facebook_profile/"+data[0].pf_id
              }).then(function(facebookdt) {
              //เบอร์โทรศัพท์
              var facebook = '';
              var count = 1;
              var lengthdata = facebookdt.length;
              if(lengthdata == 0){
                facebook = 'ไม่มีเฟสบุ้ก';
              }else{
                $.each(facebookdt, function(index, value) {
                  if(value.ct_detail == ''){
                    facebook = 'ไม่มีเฟสบุ้ก';
                  }else{
                    if(count<lengthdata){
                    $('href_kaset_facebook').append();
                    facebook += '<a href="'+value.ct_detail+'"><p>'+value.ct_detail+'</p></a>';
                    }else{
                      facebook += '<a href="'+value.ct_detail+'"><p>'+value.ct_detail+'</p></a>';
                    } 
                  }
                  count++;
                });
              }
              $('#facebook_place').html(facebook);
            });
          }
        });
  }else{
    alert('ข้อผิดพลาด!! ไม่สามารถแสดงข้อมูลได้');
  }
}

function drop_row(){
    var id_tooltip = document.getElementById('id_tooltip_option');
    if(id_tooltip){
        id_tooltip.remove();
    }else{
    }
}

function right_click_tooltip(lat,lng){
    var id_tooltip = document.getElementById('id_tooltip_option');
    $("#latitude_add_new_crop").val(lat);
    $("#longitude_add_new_crop").val(lng);
    if(!id_tooltip){
        create_tooltip(lat,lng);
    }else{        
        drop_tooltip();
        create_tooltip(lat,lng);
    }
}
function create_tooltip(lat,lng){
    var e = window.event;
    var posX = e.clientX;
    var posY = e.clientY;
    var tooltip_option = document.createElement('div');
    tooltip_option.setAttribute('class','tooltip-option');
    tooltip_option.setAttribute('id','id_tooltip_option');
    tooltip_option.style.top = (posY-60)+'px';
    tooltip_option.style.left = (posX-0)+'px';
    document.getElementById("map_canvas").appendChild(tooltip_option);
    create_tooltip_list(lat,lng);
}

function create_tooltip_list(lat,lng){
    var id_tooltip_option = document.getElementById('id_tooltip_option');
    var tooltip_unordered_list = document.createElement('ul');
    tooltip_unordered_list.setAttribute('class','nav nav-pills nav-stacked');
    id_tooltip_option.appendChild(tooltip_unordered_list);
        //list 1 create_
        
        var list_tooltip = document.createElement('li');
        list_tooltip.setAttribute('role','option-list');
        list_tooltip.setAttribute('class','list_option_tooltip');
        tooltip_unordered_list.appendChild(list_tooltip);
            var a_li_tooltip = document.createElement('a');
            a_li_tooltip.setAttribute('name',lat+'/'+lng);
            a_li_tooltip.setAttribute('value','12.11111');
            a_li_tooltip.setAttribute('onclick','crate_row_new_crops(this);');
            a_li_tooltip.innerHTML = 'เพิ่มพื้นที่เพาะปลูก';
            list_tooltip.appendChild(a_li_tooltip);
            var hr = document.createElement("hr");
            list_tooltip.appendChild(hr);
        //list 2 create_
        var list_tooltip_two = document.createElement('li');
        list_tooltip_two.setAttribute('role','option-list');
        list_tooltip_two.setAttribute('class','list_option_tooltip');
        tooltip_unordered_list.appendChild(list_tooltip_two);
            var a_li_tooltip = document.createElement('a');
            a_li_tooltip.setAttribute('onclick','drop_tooltip();pin_map.setMap(null);');
            a_li_tooltip.innerHTML = 'ยกเลิก';
            list_tooltip_two.appendChild(a_li_tooltip);
}

function drop_tooltip(){
    var id_tooltip = document.getElementById('id_tooltip_option');
    if(id_tooltip){
        id_tooltip.remove();
    }
}
/* จัดการการเพาะปลูก */
function show_farm_management(){
    var id_dashboard_row = document.getElementById('id_dashboard_row');
    if(id_dashboard_row){
        id_dashboard_row.style.display = 'block';
    }
}
function crate_row_new_crops(){
      drop_row();
      $("#place_kaset_add").show();
}