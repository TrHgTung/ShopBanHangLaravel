<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/chatbox.css')}}" rel="stylesheet">
	<script src="{{('public/frontend/js/jquery.min.js')}}"></script>
	<script src="{{('public/frontend/js/jquery.js')}}"></script>
	<script src="{{('public/frontend/js/jquery.min.map')}}"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<!-- CHATBOX -->
				<!-- <div class="container">
					<div class="chatbox-wrapper">
						<div class="chatbox-toggle">
							<i class='bx bx-message-dots'></i>
						</div>
						<div class="chatbox-message-wrapper">
							<div class="chatbox-message-header">
								<div class="chatbox-message-profile">
									<img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" alt="" class="chatbox-message-image">
									<div>
										<h4 class="chatbox-message-name">NEKO STORE</h4>
										<p class="chatbox-message-status">Đang online</p>
									</div>
								</div>
								<div class="chatbox-message-dropdown">
									<i class='bx bx-dots-vertical-rounded chatbox-message-dropdown-toggle'></i>
									<ul class="chatbox-message-dropdown-menu">
										<li>
											<a href="#">Search</a>
										</li>
										<li>
											<a href="#">Report</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="chatbox-message-content">
								<h4 class="chatbox-message-no-message">Chưa có tin nhắn gì hết! </h4>
								<p class="">(Hãy nhắn kèm với họ tên/username/e-mail để được giải quyết vấn đề của riêng bạn nha)</p>
								
							</div>
							<div class="chatbox-message-bottom">
								<form action="#" class="chatbox-message-form">
									<textarea rows="1" placeholder="Nhắn gì đó với Neko Store..." class="chatbox-message-input"></textarea>
									<button type="submit" class="chatbox-message-submit"><i class='bx bx-send' ></i></button>
								</form>
							</div>
						</div>
					</div>
				</div> -->
				<!-- end of CHATBOX -->
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg" alt="" width="75" height="75" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Xin chào, <?php $customer_id = Session::get('customer_name'); echo $customer_id; ?></a></li>
								<li><a href="{{URL::to('/')}}"><i class="fa fa-star"></i> Thịnh hành</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									// ham check session user
									if($customer_id != NULL && $shipping_id == NULL){ // da login nhung chua nhap thong tin ship
								?>
									<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-lock"></i> K.Tra Thanh Toán</a></li>
								<?php 
									}
									else if($customer_id != NULL && $shipping_id != NULL){ // da authen day du
								?>
									<li><a href="{{URL::to('/payment')}}"><i class="fa fa-lock"></i> Thanh toán</a></li>
								<?php
									} else{ // chua authen gi het
								?>
									<!-- <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Thanh toán</a></li> -->
								<?php
									}
								?>
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php
									$customer_id = Session::get('customer_id');
									// ham check session user
									if($customer_id != NULL){
								?>
									<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								<?php 
									}
									else{
								?>
									<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php
									}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<li ><a href="{{URL::to('/promotion')}}">Khuyến mãi</a></li>
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
								<li><a href="{{('wheel/wheel-index.html')}}" target="_blank">Thử vận may</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="post">
							{{ csrf_field() }}
							<div class="search_box pull-right">
								<input type="text" name="keywords_submit" id="keywords" placeholder="Tìm kiếm bằng từ khóa"/>
								<div id="search_ajax"></div>

								<input type="submit" style="margin-top:0px; color:#ffffff" name="search_items" class="btn btn-primary btn-sm" value="Tìm sản phẩm">
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Neko</span>-Store</h1>
									<h2>Hãy để Neko Store mang đến trải nghiệm đọc sách cho bạn</h2>
									<p>Với phương châm "Đổi mới vì khách hàng", Neko Store luôn lấy khách hàng làm trọng tâm để xây dựng, phát triển và luôn luôn đổi mới cửa hàng. Cố gắng trên đà trở thành Top cửa hàng trực tuyến thị trường Việt Nam!</p>
									<a href="{{URL::to('/promotion')}}"><button type="button" class="btn btn-default get">Xem khuyến mãi</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Neko</span>-Store</h1>
									<h2>Dự án website kinh doanh sách của Nhóm 2 - Mô hình B2C</h2>
									<p>Với phương châm "Đổi mới vì khách hàng", Neko Store luôn lấy khách hàng làm trọng tâm để xây dựng, phát triển và luôn luôn đổi mới cửa hàng. Cố gắng trên đà trở thành Top cửa hàng trực tuyến số 1 Việt Nam!</p>
									<a href="{{URL::to('/promotion')}}"><button type="button" class="btn btn-default get">Xem khuyến mãi</button></a>

								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Neko</span>-Store</h1>
									<h2>Dự án của Nhóm 2</h2>
									<p>Luôn luôn lắng nghe và luôn luôn đổi mới! Neko Store luôn cải thiện và tích hợp nhiều tính năng vào website của mình nhằm phục vụ tất cả khách hàng của mình!</p>
									<a href="{{URL::to('/promotion')}}"><button type="button" class="btn btn-default get">Xem khuyến mãi</button></a>

								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category_product as $key => $cate)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
									</div>
								</div>
							@endforeach
						</div><!--/category-products-->

						<h2>Thương hiệu</h2>
						<div class="panel-group category-products" id="accordian">
							@foreach($brand_product as $key => $brand)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></h4>
									</div>
								</div>
							@endforeach
						</div>
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')		
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="companyinfo">
							<h2><span>NEKO</span>-STORE</h2>
							<h5>Tự hào là đơn vị kinh doanh sản phẩm sách uy tín, chất lượng.</h5>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="companyinfo">
							<h2><span>NEKO</span>-HOTLINE</h2>
							<h4>0909-091-223</h4>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="companyinfo">
							<h2><span>NEKO</span>-TEAM</h2>
							<p class="lead">Chịu trách nhiệm kỹ thuật</p>
							<h5>Hoàng Tùng - Anh Quân - Trịnh Thành - Quốc Đạt</h5>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
			
					<div class="col-sm-9 col-sm-offset-1">
						<div class="single-widget">
							<img src="{{('public/frontend/images/map.jpg')}}" width="50%" height="50%" alt="" />
						</div>
						<div class="single-widget">
							<p><strong>Địa chỉ văn phòng kỹ thuật:</strong> 280 Đ. An Dương Vương - Quận 5 - TP.HCM</p>
						</div>
					</div>

	
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2023 NEKO Store Inc.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<!-- <script src="{{('public/frontend/js/chatbox.js')}}"></script> -->
	<script>
		$(document).ready(function(){
			$('#keywords').keyup(function(){
				var query = $(this).val();
				// alert(query);
				if(query != '')
				{
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url:"{{ route('autocomplete.fetch') }}",
						method:"POST",
						data:{query:query, _token:_token},
						success:function(data){
							$('#search_ajax').fadeIn();
							$('#search_ajax').html(data);
						}
					});
				}
				else{
					$('#search_ajax').fadeOut();
				}
			});
		});
		$(document).on('click','li',function(){
			$('#keywords').val($(this).text());
			$('#search_ajax').fadeOut();
		});

		// MESSAGE INPUT
const textarea = document.querySelector('.chatbox-message-input')
const chatboxForm = document.querySelector('.chatbox-message-form')

textarea.addEventListener('input', function () {
	let line = textarea.value.split('\n').length

	if(textarea.rows < 6 || line < 6) {
		textarea.rows = line
	}

	if(textarea.rows > 1) {
		chatboxForm.style.alignItems = 'flex-end'
	} else {
		chatboxForm.style.alignItems = 'center'
	}
})



// TOGGLE CHATBOX
const chatboxToggle = document.querySelector('.chatbox-toggle')
const chatboxMessage = document.querySelector('.chatbox-message-wrapper')

chatboxToggle.addEventListener('click', function () {
	chatboxMessage.classList.toggle('show')
})



// DROPDOWN TOGGLE
const dropdownToggle = document.querySelector('.chatbox-message-dropdown-toggle')
const dropdownMenu = document.querySelector('.chatbox-message-dropdown-menu')

dropdownToggle.addEventListener('click', function () {
	dropdownMenu.classList.toggle('show')
})

document.addEventListener('click', function (e) {
	if(!e.target.matches('.chatbox-message-dropdown, .chatbox-message-dropdown *')) {
		dropdownMenu.classList.remove('show')
	}
})







// CHATBOX MESSAGE
const chatboxMessageWrapper = document.querySelector('.chatbox-message-content')
const chatboxNoMessage = document.querySelector('.chatbox-message-no-message')

chatboxForm.addEventListener('submit', function (e) {
	e.preventDefault()

	if(isValid(textarea.value)) {
		writeMessage()
		setTimeout(autoReply, 1000)
	}
})



function addZero(num) {
	return num < 10 ? '0'+num : num
}

function writeMessage() {
	const today = new Date()
	let message = `
		<div class="chatbox-message-item sent">
			<span class="chatbox-message-item-text">
				${textarea.value.trim().replace(/\n/g, '<br>\n')}
			</span>
			<span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
		</div>
	`
	chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
	chatboxForm.style.alignItems = 'center'
	textarea.rows = 1
	textarea.focus()
	textarea.value = ''
	chatboxNoMessage.style.display = 'none'
	scrollBottom()
}

function autoReply() {
	const today = new Date()
	let message = `
		<div class="chatbox-message-item received">
			<span class="chatbox-message-item-text">
				Cảm ơn bạn đã chat với chúng tôi! Neko Store sẽ giải đáp thắc mắc của bạn sớm nhất có thể nha!
			</span>
			<span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
		</div>
	`
	chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
	scrollBottom()
}

function scrollBottom() {
	chatboxMessageWrapper.scrollTo(0, chatboxMessageWrapper.scrollHeight)
}

function isValid(value) {
	let text = value.replace(/\n/g, '')
	text = text.replace(/\s/g, '')

	return text.length > 0
}
	</script>
  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>