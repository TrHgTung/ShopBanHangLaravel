@extends('secondLayout')
@section('mailcontent')

    <form action="{{URL::to('/send-mail')}}" method="post">
        {{ csrf_field() }}
        <label>Nhập địa chỉ e-mail của bạn: </label><input type="text" name="mail" required><br>
        <label>Nhập nội dung phản hồi: </label><textarea type="text" name="content" required></textarea>
        <button type="submit" class="btn btn-primary">Gửi nội dung</button>
    </form>
    <div>
        <i>Nội dung mà bạn có thể phản hồi là về các lỗi mà bạn gặp khi trải nghiệm, trường hợp sản phẩm sai giá, sai thông tin sản phẩm (mô tả, tên, hình ảnh,...) hoặc bất cứ trường hợp nào khác mà bạn thấy không bình thường khi sử dụng website của Neko Store</i>
    </div>

@endsection