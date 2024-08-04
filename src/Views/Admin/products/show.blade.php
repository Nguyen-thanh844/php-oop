@extends('layouts.master')

@section('title')
Xem chi tiết: {{ $product['name'] }}
@endsection

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi tiết sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Chi tiết sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>
                @foreach ($product as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <!-- <td>{!! $value !!}</td> -->
                    <td>
                        <?php
                        switch ($key) {
                            case 'image':
                                echo '<img src="' . htmlspecialchars($value) . '" alt="Product Image" style="max-width: 200px; height: auto;">';
                                break;
                            case 'category_id':
                                // $i = 0;
                                $sx_categories = array_reverse($categories);
                                echo $sx_categories[2]["name"];
                                // print_r($categories);
                                break;
                            default:
                                echo htmlspecialchars($value);
                                break;
                        }
                        ?>
                    </td>
                </tr>
                @endforeach

            </table>
            <a class="btn btn-info" href="{{ url('admin/products') }}">Quay lại</a>
        </div>
    </div>
</div>
@endsection