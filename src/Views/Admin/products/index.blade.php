@extends('layouts.master')

@section('title')
Quản lý Sản phẩm
@endsection

@section('content')
<!-- <div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Danh sách</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                <div class="table-responsive">
                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                    <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

                    @php
                    unset($_SESSION['status']);
                    unset($_SESSION['msg']);
                    @endphp
                    @endif

                    @if (isset($_SESSION['status']) && !$_SESSION['status'])
                    <div class="alert alert-warning">{{ $_SESSION['msg'] }}</div>

                    @php
                    unset($_SESSION['status']);
                    unset($_SESSION['msg']);
                    @endphp
                    @endif

                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary">Thêm mới</a>

                    
                </div>

            </div>
        </div>
    </div>
</div> -->


<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        {{$title}}
        <br><a class="btn btn-info" href="{{ url('admin/products/create') }}">Thêm sản phẩm</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Số lượng</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>
                                <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
                            </td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['c_name'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ $product['created_at'] }}</td>
                            <td>{{ $product['updated_at'] }}</td>
                            <td>
                                <a href="{{ url("admin/products/{$product['id']}/show") }}" class="btn btn-info">Xem chi tiết</a>
                                <a href="{{ url("admin/products/{$product['id']}/edit") }}" class="btn btn-warning">Sửa</a>
                                <a href="{{ url("admin/products/{$product['id']}/delete") }}" onclick="return confirm('Chắc chắn xóa không?');" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection