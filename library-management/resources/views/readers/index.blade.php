<h1>Danh sách Độc giả</h1>
<a href="{{ route('readers.create') }}">Thêm Độc giả</a>
<table>
    <thead>
        <tr>
            <th>Số thứ tự</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($readers as $reader)
            <tr>
                <td>{{ $reader->id }}</td>
                <td>{{ $reader->name }}</td>
                <td>{{ $reader->birthday }}</td>
                <td>{{ $reader->address }}</td>
                <td>{{ $reader->phone }}</td>
                <td>
                    <a href="{{ route('readers.edit', $reader->id) }}">Sửa</a>
                    <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Xóa độc giả này?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
