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
@foreach($detail_product as $key => $value)
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							
								<div class="view-product">
									<img src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" />
								</div>
							
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
							

								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
						</div>
					
					</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p><strong>{{$value->category_name}}</strong></p>
								<p>Mã sản phẩm: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<form action="{{URL::to('/save-cart')}}" method="post">
										{{ csrf_field() }}
										<?php
											$fake_price = number_format(100000 + ($value->product_price));
											echo '<p class="text-danger"><del>Giá cũ: '.$fake_price.' VND</del></p>';
										?>
										<span>{{number_format($value->product_price)}} VND</span>
										x  <input name="qty" type="number" min="1" value="1" />
										<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Thêm vào giỏ
										</button>
									</form>
								</span>
								<label for="">Nhập mã coupon giảm giá: </label>
								<input type="text" name="coupon" id="coupon" size="20" maxlength="20">
								<p><b>Mô tả ngắn gọn:</b> {{$value->product_desc}}</p>
								<p><b>Tình trạng:</b> Mới / Còn hàng</p>
								<p><b>Đơn vị cung cấp</b>: {{$value->brand_name}}</p>
								<p><b>Tặng kèm*</b>: {{$value->product_gift}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
                  
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Mô tả chi tiết</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá sản phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<p><strong>Về <i>{{$value->product_name}}</i></strong></p>
                                <p>{!!$value->product_content!!}</p>
							</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
                                <ul>
									<li><strong>LẦN CUỐI CẬP NHẬT: </strong></a></li>
									<li class=""><a href="#" id="hienthithoigian"><i class="fa fa-clock-o"></i>12:41 PM</a></li>
									<!-- <li><a href="#"><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> -->
								</ul>
									<p><b>Nếu cần thiết, hãy để lại phản hồi ẩn danh cho chúng tôi biết về tình trạng sản phẩm</b></p>
									
									<form action="{{URL::to('/comment')}}" method="POST">
										{{ csrf_field() }}
										<span>
											<select id="cars" name="rating">
												<option value="5">Quá tuyệt vời @^_^@</option>
												<option value="4">Tốt ^o^</option>
												<option value="3">Bình thường -.-</option>
												<option value="2">Tệ @.@</option>
												<option value="1">Quá tệ khiến tôi trả lại hàng !$@#$%#^</option>
											</select>
										</span>
										<div class="mt-4">
											<label for="" >Viết nội dung phản hồi (feedback) của bạn</label>
										</div>
									
										<textarea name="content" ></textarea>
										
											<button type="submit" class="btn btn-default pull-right">
												Gửi phản hồi
											</button>
									</form>
								</div>
								<div>
									<p><strong>*: </strong>Quà tặng dành cho khách hàng không tính vào phí vận chuyển</p>
								</div>
							</div>
							<script>
								function hienThiThoiGianThuc() {
									var date = new Date(); // Tạo một đối tượng Date mới
									
									var gio = date.getHours(); // Lấy giờ hiện tại
									var phut = date.getMinutes(); // Lấy phút hiện tại
									var giay = date.getSeconds(); // Lấy giây hiện tại
									
									// Định dạng lại chuỗi để hiển thị theo định dạng hh:mm:ss
									var gioFormatted = gio < 10 ? "0" + gio : gio;
									var phutFormatted = phut < 10 ? "0" + phut : phut;
									var giayFormatted = giay < 10 ? "0" + giay : giay;
									
									var thoiGian = gioFormatted + ":" + phutFormatted + ":" + giayFormatted;
									
									// console.log(thoiGian); // In thời gian ra console
									var outputElement = document.getElementById("hienthithoigian"); // Truy cập phần tử có id "output"
  									outputElement.textContent = thoiGian;
								}

								hienThiThoiGianThuc();
							</script>
							
						</div>
					</div><!--/category-tab-->
					@endforeach
         
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm tương tự</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($relate as $key=>$lienquan)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="{{URL::to('public/upload/product/'.$lienquan->product_image)}}" alt="" />
															<h2>{{number_format($lienquan->product_price)}} VND</h2>
															<p><strong>{{$lienquan->product_name}}</strong></p>
															<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem ngay</button>
														</div>
													</div>
												</a>
											</div>
										</div>
									@endforeach
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
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
				Cảm ơn bạn đã chat với chúng tôi! Neko Store sẽ giải đáp thắc mắc của bạn sớm nhất có thể nha! Hoặc liên hệ <a href="https://www.facebook.com/nguyentuanhung12345" target="_blank">địa chỉ Facebook này</a> để được giải đáp trong vòng thời gian ngắn hơn
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