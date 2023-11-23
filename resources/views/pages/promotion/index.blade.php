@extends('layout')
@section('content')
				
	
<section id="slider"><!--slider-->
	<div class="left-sidebar mt-4">
			<h2>VÒNG QUAY MAY MẮN</h2>
		</div>
		<div class="container mt-4">
			<a href="{{('wheel/wheel-index.html')}}" target="_blank"><img src="{{asset('public/frontend/images/wheel.jpg')}}" alt="" srcset=""></a>
		</div>
	<div class="left-sidebar mt-4">
			<h2>GIÁNG SINH AN LÀNH</h2>
	</div>
		<div class="container">
			<a href="#"><img src="{{asset('public/frontend/images/promotion_Dec12.jpg')}}" alt="" srcset=""></a>
		</div>
		<div class="left-sidebar mt-4">
			<h2>TẾT ĐONG ĐẦY</h2>
		</div>
		<div class="container mt-4">
			<a href="#"><img src="{{asset('public/frontend/images/promotion_LunarNewYear.jpg')}}" alt="" srcset=""></a>
		</div>
		
	</section><!--/slider-->
					

@endsection
