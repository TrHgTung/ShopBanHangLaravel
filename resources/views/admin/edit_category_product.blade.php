@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Danh Mục
                        </header>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $edit_value) 
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thay đổi tên Danh mục</label>
                                    <input type="text" value="{{ $edit_value->category_name }}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="VD: sách giáo khoa">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cập nhật Mô tả danh mục</label>
                                    <textarea style="resize: none" row="10" class="form-control" name="category_product_desc" id="exampleInputPassword1">{{ $edit_value->category_desc }}</textarea>
                                </div>
                                
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật Danh mục</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
@endsection