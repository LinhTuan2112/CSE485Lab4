<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::all();
        return view('readers.index', compact('readers'));
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        // Validate các trường cần thiết
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // Tạo mới độc giả
        Reader::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('readers.index')->with('success', 'Thêm người đọc thành công.');
    }

    public function show($id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.show', compact('reader'));
    }

    public function edit($id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, $id)
    {
        // Validate các trường cần thiết
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // Cập nhật thông tin độc giả
        $reader = Reader::findOrFail($id);
        $reader->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('readers.index')->with('success', 'Cập nhật người đọc thành công.');
    }

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();

        return redirect()->route('readers.index')->with('success', 'Xóa người đọc thành công.');
    }
}
