
@extends('staticLayout')
@section('display')


    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>Mã đơn hàng: <span class="text-primary font-weight-bold">#{query_shipping_id_from_db}</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Dự kiến tới nơi: <span>01/12/19</span></p>
                <!-- <p>USPS <span class="font-weight-bold">234094567242423422898</span></p> -->
            </div>
        </div>
        <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="step0"></li>
            </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Ghi<br>Nhận</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Xuất<br>Kho</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Vận<br>Chuyển</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Đến<br>Nơi</p>
                </div>
            </div>
        </div>
    </div>

@endsection