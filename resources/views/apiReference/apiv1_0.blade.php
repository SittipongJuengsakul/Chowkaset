@extends('app')

@section('title', 'Api Refference V 1.0')

@section('content')
<div class="container-fluid" style="padding: 0px;height: 100%;">
	<div class="col-md-3 reference-menu">
		<div class="col-md-12 menu-wrap">
			<h3>เนื้อหา</h3>
			<hr>
			<ul>
				<li><a href="#token">โทเค็น</a></li>
				<li><a href="#authen">ระบุตัวตน</a></li>
				<li><a href="#crops">แปลงปลูก</a></li>
				<li><a href="#account">บัญชี</a></li>
				<li><a href="#account">ปัญหา</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-9 reference-content">
		<div class="col-md-12 content-wrap">
			<div id="overview">
				<h3>คำอธิบาย</h3>
				<h5>พื้นที่เก็บรวมรวม API ของระบบชาวเกษตร(Chowkaset)</h5>
			</div>
			<hr>
			<div id="authen">
				<h3>โทเค็น</h3>
				
				<h5>ระบบต้องการค่า Token เก็บไว้เพื่อไช้ระบุ Client ที่ไช้งาน</h5>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Method</td>
							<td>Url</td>
							<td>Descript</td>
							<td>Params</td>
							<td>Return</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Get</td>
							<td>http://localhost/chowkaset/public/index.php/api/v1.0/getToken</td>
							<td>ขอค่า Token จากระบบ</td>
							<td>ไม่มี</td>
							<td>token (string)</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div id="authen">
				<h3>ระบุตัวตน</h3>
				<h5>โหมดการใช้งานระบบตัวตน</h5>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Method</td>
							<td>Url</td>
							<td>Descript</td>
							<td>Header</td>
							<td>Params</td>
							<td>Return</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Post</td>
							<td>http://localhost/chowkaset/public/index.php/api/v1.0/Auth</td>
							<td>ล็อคอิน</td>
							<td>X-CSRF-TOKEN (Token ของระบบ)</td>
							<td>email,password</td>
							<td>success (int),message (String)</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
@stop