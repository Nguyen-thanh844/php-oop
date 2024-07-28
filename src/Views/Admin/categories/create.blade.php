@extends('layouts.master')

@section('title')
Thêm mới danh mục
@endsection

@section('content')
<h1>Thêm mới danh mục</h1>

@if (!empty($_SESSION['errors']))
<div class="alert alert-warning">
    <ul>
        @foreach ($_SESSION['errors'] as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    @php
    unset($_SESSION['errors']);
    @endphp
</div>
@endif

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Thêm danh mục
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/categories/store') }}" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục:</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục" name="name">
                        </div>

                        <button type="submit" class="btn btn-primary">Nhập</button>
                        <a class="btn btn-info" href="{{ url('admin/categories') }}">Quay lại</a>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection