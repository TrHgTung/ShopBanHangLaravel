@extends('layout')
@section('content')

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
				<p>Hãy kiểm tra lại thông tin hóa đơn. Nếu bạn muốn chúng tôi xuất hóa đơn điện tử, hãy nhập địa chỉ e-mail của bạn, 
                    <br>chúng tôi sẽ gửi hóa đơn đến địa chỉ này.</p>
                <form action="#" method="post" >
                    <label for="">E-mail: </label>
                    <input type="e-mail" >
                </form>
			</div>
			
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tạm tính <span>{{number_format(Cart::total())}} VND</span></li>
							<li>Thuế <span>{{number_format(Cart::tax())}} VND</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Phải trả <span>{{number_format(Cart::total())}} VND</span></li>
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


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


@endsection