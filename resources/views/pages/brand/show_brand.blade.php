@extends('layout')
@section('content')

<div class="features_items"><!--features_items-->
    @foreach($brand_name as $key => $bn)
	    <h2 class="title text-center">Thương hiệu {{$bn->brand_name}}</h2>
    @endforeach

	@foreach($brand_by_id as $key => $bbid)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$bbid->product_id)}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/upload/product/'.$bbid->product_image)}}" alt="" />
                            <h2>{{$bbid->product_name}}</h2>
                            <p>Giá bán: {{number_format($bbid->product_price)}} VND</p>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$bbid->product_name}}</h2>
                                <p>{{number_format($bbid->product_price)}} VND</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
        </a>
	@endforeach
						
</div><!--features_items-->

@endsection