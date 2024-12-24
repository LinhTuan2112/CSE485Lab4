@csrf

<h1>Chỉnh sửa Độc giả</h1>
<form action="{{ route('readers.update', $reader->id) }}" method="POST"> <!-- Với chỉnh sửa -->
    @method('PUT')

    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $reader->name }}">
    <input type="date" name="birthday" value="{{ $reader->birthday }}">
    <input type="text" name="address" value="{{ $reader->address }}">
    <input type="text" name="phone" value="{{ $reader->phone }}">
    <button type="submit">Cập Nhật</button>
</form>
