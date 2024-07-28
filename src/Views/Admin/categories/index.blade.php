@extends('layouts.master')

@section('title')
Danh sách danh mục
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        
        <br><a class="btn btn-info" href="{{ url('admin/categories/create') }}">Thêm danh mục</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách danh mục
            </h6>
        </div>
        @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">
            {{ $_SESSION['msg'] }}
        </div>

        @php
        unset($_SESSION['status']);
        unset($_SESSION['msg']);
        @endphp
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('admin/categories/' . $category['id'] . '/edit') }}">Sửa</a>
                                <a class="btn btn-danger" href="{{ url('admin/categories/' . $category['id'] . '/delete') }}" onclick="return confirm('Bạn có chăc muốn xóa không?')">Xóa</a>
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