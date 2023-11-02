@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Phương thức thanh toán </li>
				</ol>
			</div><!--/breadcrums-->


	

			<div class="review-payment">
				
				<h2>Xem lại giỏ hàng</h2>
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
                                    <p>.</p>
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

			<div class="payment-options">
                <form action="{{URL::to('/order-place')}}" method="POST">
                    <?php
                        $total_after = number_format($v_content->price * $v_content->qty);
                    ?>
                    <td class="cart_total">
                        <p class="cart_total_price">{{number_format($v_content->price * $v_content->qty)}} VND</p>
                        <input type="hidden" name="total_pay" value="{{number_format($v_content->price * $v_content->qty)}}">
                    </td>
                    {{ csrf_field() }}
                    <input type="hidden" name="total_momo" value="{{$total_after}}">
                    <h4><strong>Chọn một hình thức thanh toán*</strong></h4>
                        <span>
                            <label><input name="payment_option" value="1" type="radio"> Giao thức QuickPay (MoMo)</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="2" type="radio"> Thẻ ngân hàng nội địa (với ONEPAY)</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="3" type="radio"> Thẻ ngân hàng nội địa (với MoMo)</label>
                        </span>
                        <span>
                            <label><input name="payment_option" value="4" type="radio"> Trả bằng tiền mặt **</label>
                        </span>
                        
                        <input type="submit" value="Thanh toán & Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
                </form>
                <?php
                    print($total_after);
                ?>
                <!-- <form action="{{URL::to('/order-place')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="total_momo" value="{{$total_after}}">
                    <input type="submit" value="MoMo Test" class="btn btn-default" name="payUrl">
                </form> -->
            </div>
		</div>
        <div class="mt-3">
            <div >
                <strong>* Lưu ý: </strong>Các phương thức thanh toán trực tuyến được tích hợp phía trên không đại diện cho một giao dịch thật sự, vì thế không nên điền bất cứ thông tin cá nhân nào được bảo vệ!
            </div>
            <div class="mt-4">
                <strong>**  </strong>Quý khách trả tiền mặt cho shipper ngay sau khi nhận được hàng được giao về trực tiếp, thông tin địa điểm giao hàng được lấy từ thông tin thanh toán
            </div>
        </div>
	</section> <!--/#cart_items-->

	

@endsection