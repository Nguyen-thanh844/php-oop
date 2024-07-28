@extends('layouts.master')

@section('title')
Chi tiết người dùng: {{ $user['name'] }}
@endsection

@section('content')
<h1>Chi tiết người dùng: {{ $user['name'] }}</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($user as $field => $value)
        <tr>
            <td>{{ $field }}</td>
            <!-- <td>{{ $value }}</td> -->
            <th>
                <?php
                switch ($field) {
                    case 'password':
                        echo '**********';
                        break;
                    case 'type':
                        echo $value
                            ? '<span class="badge badge-success">Admin</span>'
                            : '<span class="badge badge-warning">Member</span>';
                        break;
                    default:
                        echo $value;
                        break;
                }
                ?>
            </th>
        </tr>
        @endforeach

    </tbody>
</table>
<a class="btn btn-info" href="{{ url('admin/users') }}">Quay lại</a>
@endsection