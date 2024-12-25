@extends("layouts/app")

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Danh mục Sách</h1>
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3 float-end">Thêm Sách</a>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Số thứ tự</th>
                <th>Chủ đề</th>
                <th>Tác giả</th>
                <th>Nhà xuất bản</th>
                <th>Năm xuất bản</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 + ($books->currentPage() - 1) * $books->perPage() }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->published_year }}</td>
                <td>{{ $book->quantity }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sách này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links('pagination::bootstrap-4')}}

</div>
@endsection