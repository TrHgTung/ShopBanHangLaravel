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
									<img src="{{asset('public/frontend/images/logo.png')}}" alt="" class="chatbox-message-image">
									<div>
										<h4 class="chatbox-message-name">NEKO STORE</h4>
										<p class="chatbox-message-status">Sẽ trả lời bạn sau ít phút</p>
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
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                    $content = Cart::content();

                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';

                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh t.nhỏ</td>
							<td class="description">Sản phẩm</td>
							<td class="price">Giá đã chốt</td>
							<td class="quantity">Số lượng đặt</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        @foreach($content as $v_content )
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$v_content->name}}</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{number_format($v_content->price)}} VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
										<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
											{{ csrf_field() }}
											<input type="number" class="cart_quantity_input"  name="cart_quantity" value="{{$v_content->qty}}" min="1">
											<input type="hidden" class="form-control" value="{{$v_content->rowId}}" name="rowId_cart">
											<input type="submit" class="btn btn-default btn-sm" value="Cập nhật" name="update_qty">
										</form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{number_format($v_content->price * $v_content->qty)}} VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

    <section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Kiểm tra thông tin hóa đơn</h3>
				<!-- <p>Hãy kiểm tra lại thông tin hóa đơn. Nếu bạn muốn chúng tôi xuất hóa đơn điện tử, hãy nhập địa chỉ e-mail của bạn, 
                    <br>chúng tôi sẽ gửi hóa đơn đến địa chỉ này.</p>
                <form action="#" method="post" >
                    <label for="">E-mail: </label>
                    <input type="e-mail" >
                </form> -->
			</div>
			
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tạm tính <span>{{number_format((float)Cart::total())}} 000 VND</span></li>
							<li>Thuế (15%) <span>{{number_format((float)Cart::tax())}} 000 VND</span></li>
							<li>Phí vận chuyển <span>Miễn phí</span></li>
							<li>Phải trả <span>{{number_format((float)Cart::total())}} 000 VND</span></li>
						</ul>
						<?php
									$customer_id = Session::get('customer_id');
									// ham check session user
									if($customer_id != NULL){
								?>
									 <a href="{{URL::to('/checkout')}}"> <input type="button" class="btn btn-primary" value="Thanh toán"></a>
								<?php 
									}
									else{
								?>
									<a href="{{URL::to('/login-checkout')}}"> <input type="button" class="btn btn-primary" value="Thanh toán"></a>
								<?php
									}
								?>					
						</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

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
				Cảm ơn bạn đã chat với chúng tôi! Neko Store sẽ giải đáp thắc mắc của bạn sớm nhất có thể nha!  Hoặc liên hệ <a href="https://www.facebook.com/nguyentuanhung12345" target="_blank">địa chỉ Facebook này</a> để được giải đáp trong vòng thời gian ngắn hơn
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
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


@endsection