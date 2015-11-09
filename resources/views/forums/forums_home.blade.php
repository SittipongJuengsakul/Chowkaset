@extends('app')
@section('title', 'ห้องพูดคุยชาวเกษตร')
@section('content')
	<div id="chatkaset_header">
		<div class="box-left">
			<ul class="nav nav-pills chatkaset_nav">
			  <li class="active"><a data-toggle="pill" href="#recent"><i class="fa fa-history"></i>   ไหม่</a></li>
			  <li><a data-toggle="pill" href="#follow"><i class="fa fa-users"></i>   ที่ติดตาม</a></li>
			</ul>
		</div>
		<div class="box-right">
			<form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="ค้นหา">
		        </div>
		        <button type="submit" class="btn btn-default">ตกลง</button>
		     </form>
		</div>
	</div>
	<div id="chatkaset_content">
		<div class="tab-content">
		  <div id="recent" class="tab-pane fade in active">
		    <div class="col-md-9 main-content">
		    	<ul id="list_topic_recent">
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    	</ul>
		    </div>
		    <div class="col-md-3 sidebar-content"></div>
		  </div>
		  <div id="follow" class="tab-pane fade">
		    <div class="col-md-12 main-content">
		    	<ul id="list_topic_follow">
		    		<li class="topic">
			    		<a href="#">
				    		<div class="topic_pic">
				    			
				    		</div>
				    	</a>
		    		</li>
		    	</ul>
		    </div>
		  </div>
		</div>
	</div>
@stop