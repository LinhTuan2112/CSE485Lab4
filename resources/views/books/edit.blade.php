@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Chỉnh Sửa Sách</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card shadow-sm p-4">
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Chủ đề</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" placeholder="Nhập chủ đề sách" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Tác giả</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" placeholder="Nhập tên tác giả" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Nhà xuất bản</label>
                <input type="text" name="publisher" id="publisher" class="form-control" value="{{ $book->publisher }}" placeholder="Nhập tên nhà xuất bản" required>
            </div>

            <div class="mb-3">
                <label for="published_year" class="form-label">Năm xuất bản</label>
                <input type="number" name="published_year" id="published_year" class="form-control" value="{{ $book->published_year }}" placeholder="Nhập năm xuất bản" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $book->quantity }}" placeholder="Nhập số lượng sách" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection