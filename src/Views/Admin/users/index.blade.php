@extends('layouts.master')

@section('title')
Danh sách User
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">

        <br><a class="btn btn-info" href="{{ url('admin/users/create') }}">Thêm người dùng</a>

    </h1>

    <!-- DataTales Example -->
    <div class=" card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách người dùng
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
                            <th>Họ và Tên</th>
                            <th>Avata</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>
                                <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                            </td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                {!! $user['type'] == 'admin'
                                ? '<span class="badge badge-primary">admin</span>'
                                : '<span class="badge badge-warning">member</span>' !!}
                            </td>
                            <td>{{ $user['created_at'] }}</td>
                            <td>{{ $user['updated_at'] }}</td>
                            <td>

                                <a class="btn btn-info" href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem chi tiết</a>
                                <a class="btn btn-warning" href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                <a class="btn btn-danger" href="{{ url('admin/users/' . $user['id'] . '/delete') }}" onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

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