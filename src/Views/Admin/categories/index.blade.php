@extends('layouts.master')

@section('title')
    Quản lý Sản phẩm
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách danh mục</h1>
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

                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary">Thêm mới</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['name'] }}</td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ url('admin/category/' . $category['id'] . '/edit') }}">Sửa</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('admin/category/' . $category['id'] . '/delete') }}"
                                                onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection