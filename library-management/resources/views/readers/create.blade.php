@csrf

<h1>Thêm Độc giả</h1>
<form action="{{ route('readers.store') }}" method="POST"> <!-- Với thêm mới -->

    @csrf
    <input type="text" name="name" placeholder="Họ Tên">
    <input type="date" name="birthday" placeholder="Ngày Sinh">
    <input type="text" name="address" placeholder="Địa Chỉ">
    <input type="text" name="phone" placeholder="Số Điện Thoại">
    <button type="submit">Lưu</button>
</form>
