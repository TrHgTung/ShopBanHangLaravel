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
            
			<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Thẻ Ngân hàng Nội địa</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Trả bằng tiền mặt (sau khi nhận được sản phẩm)</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> MoMo (đang phát triển)</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

	

@endsection