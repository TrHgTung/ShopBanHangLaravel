@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
			</div><!--/breadcrums-->

			
			<div class="register-req">
				<p>Vui lòng đăng nhập tài khoản và kiểm tra thông tin trước khi thực hiện thanh toán</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Hãy cung cấp chính xác các thông tin sau cho chúng tôi</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-customer')}}" method="post">
									{{ csrf_field() }}
									<input type="text" name="shipping_name" id="" placeholder="Họ tên của bạn">
									<textarea name="shipping_address"  placeholder="Nhập địa chỉ của bạn (địa chỉ nhận hàng chính)" rows="8"></textarea>
									<small><b>Chúng tôi nên xưng hô với bạn là: </b></small>
									<select name="customer_sex" id="" >
										<option value="">--- Chọn 1 nhân xưng ---</option>
										<option value="anh">Anh</option>
										<option value="chi">Chị</option>
										<option value="co">Cô</option>
										<option value="bac_chu">Bác/Chú</option>
										<option value="ong">Ông</option>
										<option value="ba">Bà</option>
									</select>
									<small><b>Hãy ghi chú những thứ cần thiết, như là chi tiết nơi giao hàng đến, những khung giờ không thể nhận được hàng,..</b></small>
									<input type="tel" name="shipping_phone" placeholder="Số điện thoại của bạn">
									<input type="text" name="shop_note" placeholder="Ghi chú cho bên cửa hàng">
									<input type="text" name="delivery_note" placeholder="Ghi chú cho bên vận chuyển">
									<small><b>Trong trường hợp bạn không thể tự nhận hàng:</b></small>
									<input type="text" name="recipients_name" placeholder="Họ tên người nhận thay">
									<small><b>Chúng tôi nên xưng hô với người đó là: </b></small>
									<select name="recipients_sex" id="" >
										<option value="">--- Chọn 1 nhân xưng ---</option>
										<option value="anh">Anh</option>
										<option value="chi">Chị</option>
										<option value="co">Cô</option>
										<option value="bac_chu">Bác/Chú</option>
										<option value="ong">Ông</option>
										<option value="ba">Bà</option>
									</select>
									<small><b>Hãy cho chúng tôi biết địa chỉ nhận thay: </b></small>
									<textarea name="recipients_address" placeholder="Địa chỉ người nhận thay (để trống thì vẫn gửi về địa chỉ của bạn)" row="8"></textarea>
									<small><b>Cũng như số điện thoại người nhận thay: </b></small>
									<input type="text" name="recipients_phone" placeholder="Số điện thoại người nhận thay">
									<input type="submit" class="btn btn-primary" value="Thanh toán trực tuyến" >
									<a href="#">Thanh toán bằng tiền mặt sau khi nhận hàng trực tiếp</a>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Mã khuyến mãi</p>
							<textarea name="message"  placeholder="Nhập mã khuyến mãi của bạn" rows="8"></textarea>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
			
	</section> <!--/#cart_items-->

	

@endsection