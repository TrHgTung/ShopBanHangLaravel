@extends('layout')
@section('content')

<!-- login form trước khi truy cập giỏ hàng -->
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập vào tài khoản của bạn</h2>
						<form action="{{URL::to('/login-customer')}}" method="post">
							{{ csrf_field() }}
							<input type="text" name="email_account" placeholder="Địa chỉ E-mail" />
							<input type="password" name="password_account" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Duy trì đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">HOẶC</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký tài khoản mới!</h2>
						<p>Trở thành thành viên của chúng tôi</p>
						<form action="{{URL::to('/add-customer')}}" method="post">
							{{csrf_field()}}
							<input type="text" name="customer_name" placeholder="Họ và tên của bạn"/>
							<input type="email" name="customer_email" placeholder="Địa chỉ Email"/>
							<input type="password" name="customer_password" placeholder="Mật khẩu"/>
							<input type="text" name="customer_phone" placeholder="Số điện thoại"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection