@extends('admin_layout')
@section('admin_content')

		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <b>LIỆT KÊ MÃ GIẢM GIÁ</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php
		$message = Session::get('message');
		if($message){
			echo $message;
			Session::put('message', null);
		}
	?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Mã khách hàng</th>
            <th>Mã giảm giá tương ứng với khách hàng</th>
            <th>Mã giảm giá tương ứng với sản phẩm</th>
              <!-- <th>Mã vận chuyển</th>
              <th>Tổng giá</th>
              <th>Ngày thực hiện</th> -->
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_coupon as $key => $coupon)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $coupon->coupon_id }}</td>
            <td>{{ $coupon->customer_id }}</td>
            <td>{{ $coupon->coupon }}</td>
            <td>{{ $coupon->product_id }}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection