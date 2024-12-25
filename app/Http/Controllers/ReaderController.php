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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:readers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Reader::create($request->all());

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:readers,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $reader = Reader::findOrFail($id);
        $reader->update($request->all());

        return redirect()->route('readers.index')->with('success', 'Cập nhật người đọc thành công.');
    }
    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();

        return redirect()->route('readers.index')->with('success', 'Xóa người đọc thành công.');
    }

}
