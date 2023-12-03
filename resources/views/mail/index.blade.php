@extends('secondLayout')
@section('mailcontent')

    <form action="{{URL::to('/send-mail')}}" method="post">
        {{ csrf_field() }}
        <label>Nhập địa chỉ e-mail của bạn: </label><input type="text" name="mail" required>
        <label>Nhập nội dung feedback: </label><textarea type="text" name="content" required></textarea>
        <button type="submit">Gửi nội dung</button>
    </form>

@endsection