@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Danh Mục Mới
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="VD: sách giáo khoa">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" row="10" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="VD: Dành cho đối tượng trẻ em, mang tính giáo dục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Ẩn/Hiện Danh mục</label>
                                    <select class="form-control input-sm m-bot15">
                                        <option>Ẩn</option>
                                        <option>Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm Danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection