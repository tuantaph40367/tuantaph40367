@extends('layouts.master')

@section('title', 'Sửa Danh mục')

@section('content')
    <h1>Sửa danh mục</h1>

    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url("admin/category/{$category['id']}/update") }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
