@extends('layouts.master')

@section('title')
Thêm mới Sản phẩm
@endsection

@section('content')
@if (!empty($_SESSION['errors']))
<div class="alert alert-warning">
    <ul>
        @foreach ($_SESSION['errors'] as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@php
unset($_SESSION['errors']);
@endphp
@endif

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Thêm mới sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/products/store') }}" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="img_thumbnail" class="form-label">Hình Ảnh:</label>
                            <input type="file" class="form-control" id="img_thumbnail" placeholder="Nhập Hình ảnh" name="img_thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Nhập Số lượng" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Danh mục:</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach ($categoryPluck as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="overview" class="form-label">Overview:</label>
                            <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea class="form-control" id="content" rows="4" placeholder="Enter content" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Nhập</button>
                        <a class="btn btn-info" href="{{ url('admin/products') }}">Quay lại</a>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection