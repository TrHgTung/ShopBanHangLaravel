@extends('admin_layout')
@section('admin_content')

<div class="market-updates" id="contentToPrint">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Số lượng khách vãng lai</h4>
					<h3>13,500</h3>
					<p>Tính đến thời điểm hiện tại</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Số lượng tài khoản thành viên Neko</h4>
						<h3>1,250</h3>
						<p>Tổng số tài khoản còn hoạt động</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Tổng doanh thu mà khách đã trả</h4>
						<h3>1,500</h3>
						<p>Ở mọi phương thức thanh toán</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Tổng đơn đặt hàng</h4>
						<h3>1,500</h3>
						<p>Tính đến thời điểm hiện tại</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary" onclick="printContent()">Xuất dữ liệu</button>
		</div>
		
<script>
function printContent() {
  var content = document.getElementById('contentToPrint'); // Get the element to print
  var originalContents = document.body.innerHTML; // Store original body content

  // Replace the current body content with the content you want to print
  document.body.innerHTML = content.innerHTML;

  // Call the print function
  window.print();

  // Restore the original content after printing
  document.body.innerHTML = originalContents;
}
</script>
@endsection