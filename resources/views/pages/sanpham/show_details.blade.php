@extends('layout')
@section('content')
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
								<p>Mã sản phẩm: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>Giá: {{number_format($value->product_price)}} VND</span>
									<label>Số lượng có sẵn: {{$value->product_quantity}}</label>
									<span>Mô tả ngắn gọn: {{$value->product_desc}}</span>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand</b> (brand_id): {{$value->brand_id}}</p>
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
                                <p>{{$value->product_content}}</p>
							</div>
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
                                <ul>
									<li>LẦN CUỐI CẬP NHẬT:</a></li>
									<li class=""><a href="#" id="hienthithoigian"><i class="fa fa-clock-o"></i>12:41 PM</a></li>
									<!-- <li><a href="#"><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> -->
								</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
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
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									
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
@endsection