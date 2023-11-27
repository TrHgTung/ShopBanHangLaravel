@extends('layout')
@section('content')

<div class="features_items">
	<a href="{{URL::to('/trang-chu')}}"><input type="button" class="btn btn-default" value="Sách mới ra lò"></a>
	<a href="{{URL::to('/trang-chu')}}"><input type="button" class="btn btn-default" value="Bán chạy nhất"></a>
	<a href="{{URL::to('/pre-release-products')}}"><input type="button" class="btn btn-default" value="Sắp phát hành"></a>

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

@endsection