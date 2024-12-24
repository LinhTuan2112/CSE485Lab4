<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book', 'reader')->get();
        return view('borrows.index', compact('borrows'));
    }
    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.create', compact('books', 'readers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'reader_id' => 'required|exists:readers,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        Borrow::create($request->all());

        return redirect()->route('borrows.index')->with('success', 'Thêm lượt mượn thành công.');
    }
    public function show($id)
    {
        $borrow = Borrow::with('book', 'reader')->findOrFail($id);
        return view('borrows.show', compact('borrow'));
    }
    public function edit($id)
    {
        $borrow = Borrow::findOrFail($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.edit', compact('borrow', 'books', 'readers'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'reader_id' => 'required|exists:readers,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->update($request->all());

        return redirect()->route('borrows.index')->with('success', 'Cập nhật lượt mượn thành công.');
    }
    public function destroy($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return redirect()->route('borrows.index')->with('success', 'Xóa lượt mượn thành công.');
    }

}
