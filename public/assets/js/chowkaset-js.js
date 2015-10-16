//@Author : Sittipong Jungsakul
//Javascript Library for chowkaset  Web Application 
//for help web application make element by javascript

var site_url = 'http://localhost/chowkaset/public/index.php';
var base_url = 'http://localhost/chowkaset/public/';
//var site_url = 'http://172.16.1.1/~buu/chowkaset/public/index.php';
//var base_url = 'http://172.16.1.1/~buu/chowkaset/public/';
function place_kaset(map_id) {

    var obj = '';
    var maps_detail = '';
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            obj = JSON.parse(xmlhttp.responseText);
            var id_place_kaset = document.getElementById('place_kaset');
            if(!id_place_kaset){
                create_row(obj);
            }else{
                drop_row();
                create_row(obj);
            }
        }

      }
    xmlhttp.open("GET",site_url+"/test/"+map_id,true);
    xmlhttp.send();
    
}

function place_mykaset(map_id) {
    var obj = '';
    var maps_detail = '';
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            obj = JSON.parse(xmlhttp.responseText);
            var id_place_kaset = document.getElementById('place_kaset');
            if(!id_place_kaset){
                create_row(obj);
            }else{
                drop_row();
            }
        }

      }
    xmlhttp.open("GET","test/"+map_id,true);
    xmlhttp.send();
    
}

function create_row(obj){
    var make_row = document.createElement("div");
    make_row.setAttribute("id", "place_kaset");
    make_row.setAttribute("class", "row");
    document.getElementById("map_canvas").appendChild(make_row);
    create_place_detail(obj);
}

function create_place_detail(obj){
    var para = document.createElement("div");
    para.setAttribute("class", "col_place_kaset");
    para.setAttribute("id", "id_col_place_kaset");
    para.setAttribute('draggable',true);
    //var t = document.createTextNode(map_id);
    //para.appendChild(t);
    document.getElementById("place_kaset").appendChild(para);
        //make header of place detail
        var header_place_kaset = document.createElement("div");
        header_place_kaset.setAttribute("class","place_kaset_header");
        if(obj[0].crop_name||obj[0].crop_name!=''){
            header_place_kaset.innerHTML = obj[0].crop_name; 
        }else{
            header_place_kaset.innerHTML = 'ไร่ '+obj[0].fname+ ' ' +obj[0].lname;
        }
        para.appendChild(header_place_kaset);
        //make content of place detail
        
        var progress_place_kaset = document.createElement("div");
        progress_place_kaset.setAttribute("class","place_kaset_progress");
        progress_place_kaset.setAttribute("id","id_place_kaset_progress");
        para.appendChild(progress_place_kaset);
        create_progress_content(obj);

        var tab_controll_place = document.createElement("div");
        tab_controll_place.setAttribute("class","tab_controll_place");
        tab_controll_place.setAttribute("id","id_tab_controll_place");
        para.appendChild(tab_controll_place);
        create_tab_controll(obj);

        var content_place_kaset = document.createElement("div");
        content_place_kaset.setAttribute("class","place_kaset_content tab-content");
        content_place_kaset.setAttribute("id","id_place_kaset_content");
        para.appendChild(content_place_kaset);
        create_form_in_content(obj);
        create_form_contact_in_content(obj);

        var footer_place_kaset = document.createElement("div");
        footer_place_kaset.setAttribute("class","footer_place_kaset ");
        footer_place_kaset.setAttribute("id","id_place_kaset_footer");
        para.appendChild(footer_place_kaset);

}

function create_progress_content(obj){
    var area_progress = document.getElementById('id_place_kaset_progress');
    var div_logo_area = document.createElement('div');
    div_logo_area.setAttribute('class','progress_logo_area');
    area_progress.appendChild(div_logo_area);
    var div_progress_area = document.createElement('div');
    div_progress_area.setAttribute('class','progress_progress_area');
    area_progress.appendChild(div_progress_area);
        //logo
        var logo_content = document.createElement('div');
        logo_content.setAttribute('class','logo-kaset');
        div_logo_area.appendChild(logo_content);
        var img_logo_conent = document.createElement('img');
        img_logo_conent.setAttribute('class','img-responsive');
        img_logo_conent.setAttribute('src',base_url+'assets/img/user/'+obj[0].picture);
        logo_content.appendChild(img_logo_conent);
        //progress
        var progress_content = document.createElement('div');
        progress_content.setAttribute('class','progress-kaset');
        div_progress_area.appendChild(progress_content);
            //pre content
            var pre_content_progress_bar = document.createElement('div');
            pre_content_progress_bar.setAttribute('class','pre_content_progress_bar');
            progress_content.appendChild(pre_content_progress_bar);
            var p_pre_content = document.createElement('p');
            p_pre_content.innerHTML = 'ความก้าวหน้าในการเก็บเกี่ยว';
            pre_content_progress_bar.appendChild(p_pre_content);
            //progress content
            var progress_content_progress = document.createElement('div');
            progress_content_progress.setAttribute('class','progress');
            progress_content.appendChild(progress_content_progress);
            var content_progress_bar = document.createElement('div');
            content_progress_bar.setAttribute('class','progress-bar progress-bar-success');
            content_progress_bar.setAttribute('role','progressbar');
            content_progress_bar.setAttribute('aria-valuenow','40');
            content_progress_bar.setAttribute('aria-valuemin','0');
            content_progress_bar.setAttribute('aria-valuemax','100');
            content_progress_bar.style.width = '40%';
            content_progress_bar.innerHTML = 'ความก้าวหน้า 40 %';
            progress_content_progress.appendChild(content_progress_bar);
}

function create_form_contact_in_content(obj){
    var area_content = document.getElementById("id_place_kaset_content");
    var tab_contact = document.createElement('div');
    tab_contact.setAttribute('class','tab-pane fade tab-kaset-contact');
    tab_contact.setAttribute('id','tab-contact');
    area_content.appendChild(tab_contact);
    var form_content_place_detail = document.createElement("form");
    form_content_place_detail.setAttribute("class","form_content_place_detail");
    form_content_place_detail.setAttribute("role","form");
    form_content_place_detail.setAttribute("method","POST");
    form_content_place_detail.setAttribute("action","FileJSJA");
    tab_contact.appendChild(form_content_place_detail);
        var form_group = document.createElement("div");
        form_group.setAttribute("class","form-group");
        form_content_place_detail.appendChild(form_group);
        var div_in_formgrop = document.createElement("div");
        div_in_formgrop.setAttribute("class","col-md-12 kaset-padding-bottom");
        form_group.appendChild(div_in_formgrop);
            //name + lastname 
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'tel';
            label_form_fname.innerHTML = "เบอร์โทรศัพท์";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("p");
            place_form_fname.innerHTML = obj[0].tel;
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            div_in_formgrop.appendChild(hr);
            // type of seeds
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'facebook';
            label_form_fname.innerHTML = "facebook";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("a");
            place_form_fname.href = obj[0].facebook;
            place_form_fname.setAttribute('class','a_facebook');
            place_form_fname.innerHTML = obj[0].facebook;
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            div_in_formgrop.appendChild(hr);
            //Address
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'address';
            label_form_fname.innerHTML = "ที่อยู่";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("p");
            place_form_fname.innerHTML = obj[0].address;
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            hr.setAttribute("class","end-form");
            div_in_formgrop.appendChild(hr);
}
function create_tab_controll(obj){
    var area_controll = document.getElementById('id_tab_controll_place');
    var ul_tab = document.createElement('ul');
    ul_tab.setAttribute('class','nav nav-tabs');
    area_controll.appendChild(ul_tab);
    var li_detail = document.createElement('li');
    li_detail.setAttribute('class','active');
    ul_tab.appendChild(li_detail);
    var a_detail = document.createElement('a');
    a_detail.innerHTML = 'ข้อมูลเพาะปลูก'
    a_detail.setAttribute('data-toggle','tab');
    a_detail.setAttribute('href','#tab-detail');
    li_detail.appendChild(a_detail);
    //contact
    var li_contact = document.createElement('li');
    ul_tab.appendChild(li_contact);
    var a_contact = document.createElement('a');
    a_contact.innerHTML = 'ติดต่อ'
    a_contact.setAttribute('data-toggle','tab');
    a_contact.setAttribute('href','#tab-contact');
    li_contact.appendChild(a_contact);
}
function create_form_in_content(obj){
    var area_content = document.getElementById("id_place_kaset_content");
    var tab_detail = document.createElement('div');
    tab_detail.setAttribute('class','tab-pane fade in active tab-kaset-detail');
    tab_detail.setAttribute('id','tab-detail');
    area_content.appendChild(tab_detail);
    var form_content_place_detail = document.createElement("form");
    form_content_place_detail.setAttribute("class","form_content_place_detail");
    form_content_place_detail.setAttribute("role","form");
    form_content_place_detail.setAttribute("method","POST");
    form_content_place_detail.setAttribute("action","FileJSJA");
    tab_detail.appendChild(form_content_place_detail);
        var form_group = document.createElement("div");
        form_group.setAttribute("class","form-group");
        form_content_place_detail.appendChild(form_group);
        var div_in_formgrop = document.createElement("div");
        div_in_formgrop.setAttribute("class","col-md-12 kaset-padding-bottom");
        form_group.appendChild(div_in_formgrop);
            //name + lastname 
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'fname';
            label_form_fname.innerHTML = "ชื่อ-นามสกุล เจ้าของไร่";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("p");
            place_form_fname.innerHTML = obj[0].fname+ ' ' +obj[0].lname;
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            div_in_formgrop.appendChild(hr);
            // type of seeds
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'seeds';
            label_form_fname.innerHTML = "พืชที่ปลูก";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("p");
            place_form_fname.innerHTML = obj[0].seed_name;
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            div_in_formgrop.appendChild(hr);
            // size
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'size';
            label_form_fname.innerHTML = "จำนวนพื้นที่ปลูก";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("p");
            place_form_fname.innerHTML = obj[0].rai+' ไร่ '+obj[0].ngarn+' งาน '+obj[0].wah+' ตารางวา';
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            div_in_formgrop.appendChild(hr);
            //product
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'product';
            label_form_fname.innerHTML = "จำนวนผลผลิตที่คาดว่าจะได้รับ (ต่อไร่)";
            div_in_formgrop.appendChild(label_form_fname);
            var place_form_fname = document.createElement("p");
            place_form_fname.innerHTML = obj[0].product+' กิโลกรัม';
            div_in_formgrop.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            hr.setAttribute("class","end-form");
            div_in_formgrop.appendChild(hr);
            
}
function drop_row(){
    var id_tooltip = document.getElementById('id_tooltip_option');
    if(id_tooltip){
        var id_pin = document.getElementById('id_pin_position');
        id_pin.remove();
        id_tooltip.remove();
    }else{
        var id_row = document.getElementById("place_kaset");
        if(id_row){
            id_row.remove();
        }
    }
}

function right_click_tooltip(lat,lng){
    var id_tooltip = document.getElementById('id_tooltip_option');
    var id_pin = document.getElementById('id_pin_position');
    if(!id_tooltip){
        create_pin_position();
        create_tooltip(lat,lng);
    }else{
        
        drop_tooltip();
        create_pin_position();
        create_tooltip(lat,lng);
    }
}

function create_pin_position(){
    var e = window.event;
    var posX = e.clientX;
    var posY = e.clientY;
    var pin_position = document.createElement('div');
    pin_position.style.top = (posY-75)+'px';
    pin_position.style.left = (posX-12)+'px';
    pin_position.setAttribute('class','pin-position');
    pin_position.setAttribute('id','id_pin_position');
    document.getElementById("map_canvas").appendChild(pin_position);
        var img_pin_position = document.createElement('img');
        img_pin_position.setAttribute('class','img-responsive');
        img_pin_position.setAttribute('src',base_url+'assets/img/map-pin.png');
        pin_position.appendChild(img_pin_position);
}

function create_tooltip(lat,lng){
    var e = window.event;
    var posX = e.clientX;
    var posY = e.clientY;
    var tooltip_option = document.createElement('div');
    tooltip_option.setAttribute('class','tooltip-option');
    tooltip_option.setAttribute('id','id_tooltip_option');
    tooltip_option.style.top = (posY-60)+'px';
    tooltip_option.style.left = (posX+3)+'px';
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
            a_li_tooltip.setAttribute('onclick','drop_tooltip();');
            a_li_tooltip.innerHTML = 'ยกเลิก';
            list_tooltip_two.appendChild(a_li_tooltip);
}

function drop_tooltip(){
    var id_tooltip = document.getElementById('id_tooltip_option');
    var id_pin = document.getElementById('id_pin_position');
    if(id_tooltip){
        id_tooltip.remove();
        id_pin.remove();
    }
}

//เพิ่ม พื้นที่ปลูก
function crate_row_new_crops(latlng){
    var str = '';
    str = latlng.name;
    var latNlng = str.toString().split('/');

    var id_tooltip = document.getElementById('id_tooltip_option');
    var id_pin = document.getElementById('id_pin_position');
    if(id_tooltip){
        id_tooltip.remove();
        id_pin.remove();
    }
    var id_place_kaset = document.getElementById('place_kaset');
    if(id_place_kaset){
        id_place_kaset.remove();
    }

    var make_row = document.createElement("div");
    make_row.setAttribute("id", "place_kaset");
    make_row.setAttribute("class", "row");
    document.getElementById("map_canvas").appendChild(make_row);
        var form_content_place_detail = document.createElement("form");
        form_content_place_detail.setAttribute("class","form_content_place_detail");
        form_content_place_detail.setAttribute("role","form");
        form_content_place_detail.setAttribute("method","POST");
        form_content_place_detail.setAttribute("action",site_url+"/new_crop");
        document.getElementById("place_kaset").appendChild(form_content_place_detail);

        var inp_token = document.createElement('input');
        inp_token.setAttribute('name','_token');
        inp_token.setAttribute('type','hidden');
        inp_token.setAttribute('value',csrf_token_js);
        form_content_place_detail.appendChild(inp_token);
    var para = document.createElement("div");
    para.setAttribute("class", "col_new_form_place_kaset col-md-6 col-md-offset-3");
    form_content_place_detail.appendChild(para);
        //make header of place detail
        var header_place_kaset = document.createElement("div");
        header_place_kaset.setAttribute("class","place_kaset_header");
        para.appendChild(header_place_kaset);
        var place_form_fname = document.createElement("input");
        place_form_fname.setAttribute('name','namerai');
        place_form_fname.setAttribute('placeholder','ชื่อไร่ ( หากเว้นว่างจะเป็นชื่อเจ้าของไร่ )');
        place_form_fname.setAttribute('class','form-control');
        place_form_fname.style.float = 'left';
        place_form_fname.style.marginLeft = '25%';
        place_form_fname.style.marginTop = '0px';
        place_form_fname.style.width = '50%';
        header_place_kaset.appendChild(place_form_fname);
        //make content of place detail
        

        var progress_place_kaset = document.createElement("div");
        progress_place_kaset.setAttribute("class","place_kaset_progress");
        progress_place_kaset.setAttribute("id","id_place_kaset_progress");
        para.appendChild(progress_place_kaset);

        var tab_controll_place = document.createElement("div");
        tab_controll_place.setAttribute("class","tab_controll_place");
        tab_controll_place.setAttribute("id","id_tab_controll_place");
        para.appendChild(tab_controll_place);

        

        var content_place_kaset = document.createElement("div");
        content_place_kaset.setAttribute("class","place_kaset_content tab-content");
        content_place_kaset.setAttribute("id","id_place_kaset_content");
        para.appendChild(content_place_kaset);

        var area_progress = document.getElementById('id_place_kaset_progress');
        var div_logo_area = document.createElement('div');
        div_logo_area.setAttribute('class','progress_logo_area');
        area_progress.appendChild(div_logo_area);
        var div_progress_area = document.createElement('div');
        div_progress_area.setAttribute('class','progress_progress_area');
        area_progress.appendChild(div_progress_area);
        //logo
        var logo_content = document.createElement('div');
        logo_content.setAttribute('class','logo-kaset');
        div_logo_area.appendChild(logo_content);
        var a_img = document.createElement('a');
        logo_content.appendChild(a_img);
        var img_logo_conent = document.createElement('img');
        img_logo_conent.setAttribute('class','img-responsive');
        img_logo_conent.setAttribute('src',base_url+'assets/img/user/test1.jpg');
        a_img.appendChild(img_logo_conent);
        

        var area_content = document.getElementById("id_place_kaset_content");

        var tab_contact = document.createElement('div');
        tab_contact.setAttribute('class','tab-pane fade tab-kaset-contact');
        tab_contact.setAttribute('id','tab-contact');
        area_content.appendChild(tab_contact);
        
        var form_content_place_detail = tab_contact;
            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            //tel
            var label_form_fname = document.createElement("label");
            label_form_fname.style.paddingTop = '5px';
            label_form_fname.htmlFor = 'tel';
            label_form_fname.innerHTML = "เบอร์โทรศัพท์";
            form_group.appendChild(label_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','tel');
            place_form_fname.setAttribute('pattern','[0-9]{3}-[0-9]{7}');
            place_form_fname.setAttribute('title','080-0000000');
            place_form_fname.setAttribute('placeholder','เบอร์โทรศัพท์');
            place_form_fname.setAttribute('class','form-control inp-2');
            place_form_fname.disabled = true;
            place_form_fname.setAttribute('value',user_tel);
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '20px';
            form_group.appendChild(place_form_fname).required = true;
            var hr = document.createElement("hr");
            form_group.appendChild(hr);
            // type of seeds
            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'facebook';
            label_form_fname.innerHTML = "facebook";
            form_group.appendChild(label_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','facebook');
            place_form_fname.setAttribute('placeholder','facebook');
            place_form_fname.disabled = true;
            place_form_fname.setAttribute('value',user_facebook);
            place_form_fname.setAttribute('class','form-control inp-1');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '20px';
            form_group.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            form_group.appendChild(hr);
            //Address
            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'address';
            label_form_fname.innerHTML = "ที่อยู่ของไร่";
            form_group.appendChild(label_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','address');
            place_form_fname.setAttribute('placeholder','ที่อยู่');
            place_form_fname.setAttribute('class','form-control inp-4');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '20px';
            form_group.appendChild(place_form_fname);
            var select_prefix = document.createElement("select");
            select_prefix.setAttribute('class','form-control inp-4');
            select_prefix.setAttribute('name','jungvad');
            select_prefix.style.float = 'left';
            select_prefix.style.marginLeft = '20px';
            form_group.appendChild(select_prefix);
            //ที่อยู่

            var hr = document.createElement("hr");
            form_group.appendChild(hr);

            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'latNlng';
            label_form_fname.innerHTML = "พิกัด ละติจูด,ลองจิจูด";
            form_group.appendChild(label_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','latitude');
            place_form_fname.setAttribute('placeholder','ตำแหน่งละติจูด');
            place_form_fname.setAttribute('class','form-control inp-2');
            place_form_fname.setAttribute('value',latNlng[0]);
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '20px';
            form_group.appendChild(place_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','longtitude');
            place_form_fname.setAttribute('placeholder','ตำแหน่งลองจิจูด');
            place_form_fname.setAttribute('class','form-control inp-2');
            place_form_fname.setAttribute('value',latNlng[1]);
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '10px';
            form_group.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            hr.setAttribute("class","end-form");
            form_group.appendChild(hr);
            


    var area_controll = document.getElementById('id_tab_controll_place');
    var ul_tab = document.createElement('ul');
    ul_tab.setAttribute('class','nav nav-tabs');
    area_controll.appendChild(ul_tab);
    var li_detail = document.createElement('li');
    li_detail.setAttribute('class','active');
    ul_tab.appendChild(li_detail);
    var a_detail = document.createElement('a');
    a_detail.innerHTML = 'ข้อมูลเพาะปลูก'
    a_detail.setAttribute('data-toggle','tab');
    a_detail.setAttribute('href','#tab-detail');
    li_detail.appendChild(a_detail);
    //contact
    var li_contact = document.createElement('li');
    ul_tab.appendChild(li_contact);
    var a_contact = document.createElement('a');
    a_contact.innerHTML = 'ติดต่อ'
    a_contact.setAttribute('data-toggle','tab');
    a_contact.setAttribute('href','#tab-contact');
    li_contact.appendChild(a_contact);


    var area_content = document.getElementById("id_place_kaset_content");
    var tab_detail = document.createElement('div');
    tab_detail.setAttribute('class','tab-pane fade in active tab-kaset-detail');
    tab_detail.setAttribute('id','tab-detail');
    area_content.appendChild(tab_detail);
    var form_content_place_detail = tab_detail;
        var form_group = document.createElement("div");
        form_group.setAttribute("class","form-group");
        form_content_place_detail.appendChild(form_group);
            //name + lastname 
            var label_form_fname = document.createElement("label");
            label_form_fname.style.paddingTop = '5px';
            label_form_fname.htmlFor = 'fname';
            label_form_fname.innerHTML = "ชื่อ-นามสกุล เจ้าของไร่";
            form_group.appendChild(label_form_fname);
            

            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','fname');
            place_form_fname.setAttribute('placeholder','ชื่อ');
            place_form_fname.style.float = 'left';
            place_form_fname.disabled = true;
            place_form_fname.setAttribute('value',user_fname);
            place_form_fname.style.marginLeft = '10px';
            place_form_fname.setAttribute('class','form-control inp-2');
            form_group.appendChild(place_form_fname).required = true;
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','lname');
            place_form_fname.setAttribute('placeholder','นามสกุล');
            place_form_fname.disabled = true;
            place_form_fname.setAttribute('value',user_lname);
            place_form_fname.setAttribute('class','form-control inp-2');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '10px';
            form_group.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            form_group.appendChild(hr);

            // type of seeds
            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'seeds';
            label_form_fname.innerHTML = "พืชที่ปลูก";
            form_group.appendChild(label_form_fname);
            var select_prefix = document.createElement("select");
            select_prefix.setAttribute('class','form-control inp-4');
            select_prefix.setAttribute('name','seeds');
            select_prefix.style.float = 'left';
            select_prefix.style.marginLeft = '20px';
            form_group.appendChild(select_prefix);
            var option_prefix = document.createElement("option");
            option_prefix.setAttribute('value','1');
            option_prefix.innerHTML = 'ข้าว';
            select_prefix.appendChild(option_prefix);
            var select_prefix = document.createElement("select");
            select_prefix.setAttribute('class','form-control inp-4');
            select_prefix.setAttribute('name','seeds');
            select_prefix.style.float = 'left';
            select_prefix.style.marginLeft = '20px';
            form_group.appendChild(select_prefix);

            var option_prefix = document.createElement("option");
            option_prefix.setAttribute('value','1');
            option_prefix.innerHTML = 'กข.41';
            select_prefix.appendChild(option_prefix);
            var option_prefix = document.createElement("option");
            option_prefix.setAttribute('value','2');
            option_prefix.innerHTML = 'กข.39';
            select_prefix.appendChild(option_prefix);
            var option_prefix = document.createElement("option");
            option_prefix.setAttribute('value','0');
            option_prefix.innerHTML = 'อื่นๆ';
            select_prefix.appendChild(option_prefix);
            var hr = document.createElement("hr");
            form_group.appendChild(hr);

            // size
            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'size';
            label_form_fname.innerHTML = "จำนวนพื้นที่ปลูก";
            form_group.appendChild(label_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','rai');
            place_form_fname.setAttribute('pattern','[0-9]');
            place_form_fname.setAttribute('title','เป็นตัวเลขเท่านั้น');
            place_form_fname.setAttribute('placeholder','พื้นที่ปลูก (ไร่)');
            place_form_fname.setAttribute('class','form-control inp-3');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '20px';
            form_group.appendChild(place_form_fname).required = true;
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','ngarn');
            place_form_fname.setAttribute('placeholder','พื้นที่ปลูก (งาน)');
            place_form_fname.setAttribute('pattern','[0-9]');
            place_form_fname.setAttribute('title','เป็นตัวเลขเท่านั้น');
            place_form_fname.setAttribute('class','form-control inp-3');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '10px';
            form_group.appendChild(place_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','wah');
            place_form_fname.setAttribute('placeholder','พื้นที่ปลูก (ตารางวา)');
            place_form_fname.setAttribute('class','form-control inp-3');
            place_form_fname.setAttribute('pattern','[0-9]');
            place_form_fname.setAttribute('title','เป็นตัวเลขเท่านั้น');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '10px';
            form_group.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            form_group.appendChild(hr);
            //product
            var form_group = document.createElement("div");
            form_group.setAttribute("class","form-group");
            form_content_place_detail.appendChild(form_group);
            var label_form_fname = document.createElement("label");
            label_form_fname.htmlFor = 'product';
            label_form_fname.innerHTML = "จำนวนผลผลิตที่คาดว่าจะได้รับ (ต่อไร่)";
            place_form_fname.setAttribute('pattern','[0-9]');
            place_form_fname.setAttribute('title','เป็นตัวเลขเท่านั้น');
            form_group.appendChild(label_form_fname);
            var place_form_fname = document.createElement("input");
            place_form_fname.setAttribute('name','product');
            place_form_fname.setAttribute('placeholder','จำนวนผลผลิตที่คาดว่าจะได้รับ (ต่อไร่)');
            place_form_fname.setAttribute('class','form-control inp-2');
            place_form_fname.style.float = 'left';
            place_form_fname.style.marginLeft = '20px';
            form_group.appendChild(place_form_fname);
            var hr = document.createElement("hr");
            hr.setAttribute("class","end-form");
            form_group.appendChild(hr);
            
            var tab_button_form = document.createElement("div");
            tab_button_form.setAttribute("class","tab_button_form");
            tab_button_form.setAttribute("id","tab_button_form");
            para.appendChild(tab_button_form);

            var div_button_area = document.createElement('div');
            div_button_area.setAttribute('class','div_button_area');
            tab_button_form.appendChild(div_button_area);

            var btn_summit = document.createElement('button');
            btn_summit.style.marginLeft = '40%';
            btn_summit.style.marginTop = '12px';
            btn_summit.setAttribute('type','submit');
            btn_summit.setAttribute('class','btn btn-success');
            btn_summit.innerHTML = 'ตกลง';
            div_button_area.appendChild(btn_summit);

            var btn_cancle = document.createElement('button');
            btn_cancle.setAttribute('type','button');
            btn_cancle.style.marginTop = '12px';
            btn_cancle.style.marginLeft = '5px';
            btn_cancle.setAttribute('onclick','drop_row();');
            btn_cancle.setAttribute('class','btn btn-danger');
            btn_cancle.innerHTML = 'ยกเลิก';
            div_button_area.appendChild(btn_cancle);
}
function drop_row_new_crop(){
    var id_crop = document.getElementById('new_crop_place_kaset');
    id_crop.remove();
}

function create_dashboard_row(){
    var id_dashboard_row = document.getElementById('id_dashboard_row');
    if(id_dashboard_row){
        id_dashboard_row.remove();
    }
    else{
    var row = document.createElement('div');
    row.setAttribute('id','id_dashboard_row');
    row.setAttribute('class','col-md-12');
    document.getElementById("map_canvas").appendChild(row);
    }
}
/* จัดการการเพาะปลูก */
function show_farm_management(){
    var id_dashboard_row = document.getElementById('id_dashboard_row');
    if(id_dashboard_row){
        id_dashboard_row.style.display = 'block';
    }
}

function drag_move(){
        interact('#id_col_place_kaset')
          .draggable({
            inertia: true,
            restrict: {
              restriction: "parent",
              endOnly: true,
              elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
            },
            onmove: dragMoveListener,
            
          });

          function dragMoveListener (event) {
            var target = event.target,
                x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
                y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
            target.style.webkitTransform =
            target.style.transform =
              'translate(' + x + 'px, ' + y + 'px)';
            target.setAttribute('data-x', x);
            target.setAttribute('data-y', y);
          }
          window.dragMoveListener = dragMoveListener;
}