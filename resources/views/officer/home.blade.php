@extends('app')
@section('title', 'ห้องพูดคุยชาวเกษตร')
@section('content')
	<div id="officer_header">
		<div class="box-left">
			<ul class="nav nav-pills chatkaset_nav">
			  <li class="active"><a data-toggle="pill" href="#farmer"><i class="fa fa-user"></i>   เกษตรกร</a></li>
			  <li><a data-toggle="pill" href="#breeds"><i class="fa fa-leaf"></i>   พันธุ์พืช</a></li>
			  <li><a data-toggle="pill" href="#plans"><i class="fa fa-calendar"></i>   แผนเพาะปลูก</a></li>
			</ul>
		</div>
	</div>
	<div id="officer_content">
		<div class="tab-content">
		  <div id="farmer" class="tab-pane fade in active">
		    <div class="col-md-3 menu-content">
		    	<ul id="list_topic_recent">
		    		<li class="li_details">
		    			<div class="aumphur">
		    				<span>เมือง</span>
		    			</div>
		    			<div class="aumphur_detail">
		    				<h3>จำนวน</h3><span class="num_farmer">1,500 คน</span>
		    			</div>
		    		</li>
		    		<li class="li_details">
		    			<div class="aumphur">
		    				<span>โกสัมพีนคร</span>
		    			</div>
		    			<div class="aumphur_detail">
		    				<span></span>
		    			</div>
		    		</li>
		    		<li class="li_details">
		    			<div class="aumphur">
		    				<span>ขาณุวรลักษบุรี</span>
		    			</div>
		    			<div class="aumphur_detail">
		    				<span></span>
		    			</div>
		    		</li>
		    		<li class="li_details">
		    			<div class="aumphur">
		    				<span>คลองขลุง</span>
		    			</div>
		    			<div class="aumphur_detail">
		    				<span></span>
		    			</div>
		    		</li>
		    		<li class="li_details">
		    			<div class="aumphur">
		    				<span>คลองลาน</span>
		    			</div>
		    			<div class="aumphur_detail">
		    				<span></span>
		    			</div>
		    		</li>
		    		<li class="li_details">
		    			<div class="aumphur">
		    				<span>ทรายทองวัฒนา</span>
		    			</div>
		    			<div class="aumphur_detail">
		    				<span></span>
		    			</div>
		    		</li>
		    	</ul>
		    </div>

		    <div class="col-md-9 sidebar-content"></div>
		  </div>
		  <div id="breeds" class="tab-pane fade">
		    <div class="col-md-12 main-content">
		    	<div class="head_content">

			    </div>
		    </div>
		  </div>
		  <div id="plans" class="tab-pane fade">
		    <div class="col-md-12 main-content">
		    	<div class="head_content">
		    	
				</div>
		    </div>
		  </div>
		</div>
	</div>
@stop