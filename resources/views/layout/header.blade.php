<ul id="gn-menu" class="gn-menu-main">
				@if (Auth::guest())
				<li class="gn-trigger clear-nav-style">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="ค้นหา" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li><a class="gn-icon gn-icon-cog" href="{{ URL::to('auth/login') }}">เข้าสู่ระบบ</a></li>
								<li><a class="gn-icon gn-icon-help">ช่วยเหลือ</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				@else
				<li class="gn-trigger clear-nav-style">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="ค้นหา" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li id="my_farm">
									<a class="gn-icon gn-icon-download">ข้อมูลฟาร์มตนเอง</a>
								</li>
								<li id="farm_management"><a class="gn-icon gn-icon-cog">จัดการข้อมูลการเพาะปลูก</a></li>
								<!-- <li><a class="gn-icon gn-icon-help">ช่วยเหลือ</a></li> -->
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				@endif
				@if (Auth::guest())
				<li class="clear-nav-style codrops-icon codrops-icon-drop">
				<a class="codrops-icon codrops-icon-drop" href="{{ URL::to('auth/login') }}"><span class="login-col">เข้าสู่ระบบ</span></a>
				</li>
				@else
				<li class="dropdown clear-nav-style codrops-icon codrops-icon-drop">
		          <a href="#" class="dropdown-toggle login-col login-col-size" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-nav" src="{{ URL::asset('assets/img/user') }}/{{ Auth::user()->picture }}">{{ " ".Auth::user()->fname." ".Auth::user()->lname }}<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <!--<li><a href="#">เปลี่ยนรหัสผ่าน</a></li>-->
		            <li><a href="{{ URL::to('changeprofile') }}">แก้ใขข้อมูลส่วนตัว</a></li>
		            <!--<li><a href="{{ URL::to('auth/login') }}">รายงานปัญหา</a></li>-->
		            <li><a href="{{ URL::to('auth/logout') }}">ออกจากระบบ</a></li>
		          </ul>
		        </li>
				@endif
				
			</ul>