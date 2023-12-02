@extends('layout')
@section('content')

<div class="container">
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
								<!-- <div class="chatbox-message-item sent">
									<span class="chatbox-message-item-text">
										Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Quod, fugiat?
									</span>
									<span class="chatbox-message-item-time">08:30</span>
								</div>
								<div class="chatbox-message-item received">
									<span class="chatbox-message-item-text">
										Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Quod, fugiat?
									</span>
									<span class="chatbox-message-item-time">08:30</span>
								</div> -->
							</div>
							<div class="chatbox-message-bottom">
								<form action="#" class="chatbox-message-form">
									<textarea rows="1" placeholder="Nhắn gì đó với Neko Store..." class="chatbox-message-input"></textarea>
									<button type="submit" class="chatbox-message-submit"><i class='bx bx-send' ></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
<div class="features_items">
	<a href="{{URL::to('/trang-chu')}}"><input type="button" class="btn btn-default" value="Sách mới ra lò"></a>
	<a href="{{URL::to('/trang-chu')}}"><input type="button" class="btn btn-default" value="Bán chạy nhất"></a>
	<a href="{{URL::to('/pre-release-products')}}"><input type="button" class="btn btn-default" value="Sắp phát hành"></a>
	<a href="{{('wheel/wheel-index.html')}}" target="_blank"><input type="button" class="btn btn-default" value="Mini Game"></a>

	<!-- !!! -->
	<h2 class="title text-center">Sản phẩm mới</h2>
	@foreach($all_product as $key => $product)
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
							<h2>{{$product->product_name}}</h2>
							<p>Giá bán: {{number_format($product->product_price)}} VND</p>
						</div>
						<div class="product-overlay">
							<div class="overlay-content">
								<h2>{{$product->product_name}}</h2>
								<?php
									$fake_price = number_format(100000 + ($product->product_price));
									echo '<p class="text-danger"><del>Giá cũ: '.$fake_price.' VND</del></p>';
								?>
								<p>{{number_format($product->product_price)}} VND</p>
								<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem sản phẩm</a>
							</div>
						</div>
					</div>
				</a>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
					</ul>
				</div>
	    	</div>
		</div>
	@endforeach
		<!-- <div class="mt-4 mb-4">
			<h2 class="title text-center">Về chúng tôi</h2>
			<p>Images carousel > about us > slider (about / store / history / which sell for ...)</p>					
		</div> -->
	</div>
<script>
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
@endsection