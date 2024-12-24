<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderByDesc('id')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
        ], [
            'title.required' => 'Chủ đề là bắt buộc.',
            'title.string' => 'Chủ đề phải là một chuỗi văn bản.',
            'title.max' => 'Chủ đề không được vượt quá 255 ký tự.',

            'author.required' => 'Tác giả là bắt buộc.',
            'author.string' => 'Tác giả phải là một chuỗi văn bản.',
            'author.max' => 'Tác giả không được vượt quá 255 ký tự.',

            'publisher.required' => 'Nhà xuất bản là bắt buộc.',
            'publisher.string' => 'Nhà xuất bản phải là một chuỗi văn bản.',
            'publisher.max' => 'Nhà xuất bản không được vượt quá 255 ký tự.',

            'published_year.required' => 'Năm xuất bản là bắt buộc.',
            'published_year.integer' => 'Năm xuất bản phải là một số nguyên.',
            'published_year.min' => 'Năm xuất bản phải lớn hơn hoặc bằng 1000.',
            'published_year.max' => 'Năm xuất bản không được lớn hơn năm hiện tại.',

            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
        ]);

        try {
            $book = Book::create($validatedData);
            if (!$book) {
                return redirect()->back()->withInput()->with('error', 'Không thể lưu sách.');
            }

            return redirect()->route('books.index')->with('success', 'Thêm sách thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
        ], [
            'title.required' => 'Chủ đề là bắt buộc.',
            'title.string' => 'Chủ đề phải là một chuỗi văn bản.',
            'title.max' => 'Chủ đề không được vượt quá 255 ký tự.',

            'author.required' => 'Tác giả là bắt buộc.',
            'author.string' => 'Tác giả phải là một chuỗi văn bản.',
            'author.max' => 'Tác giả không được vượt quá 255 ký tự.',

            'publisher.required' => 'Nhà xuất bản là bắt buộc.',
            'publisher.string' => 'Nhà xuất bản phải là một chuỗi văn bản.',
            'publisher.max' => 'Nhà xuất bản không được vượt quá 255 ký tự.',

            'published_year.required' => 'Năm xuất bản là bắt buộc.',
            'published_year.integer' => 'Năm xuất bản phải là một số nguyên.',
            'published_year.min' => 'Năm xuất bản phải lớn hơn hoặc bằng 1000.',
            'published_year.max' => 'Năm xuất bản không được lớn hơn năm hiện tại.',

            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
        ]);

        try {
            $book = Book::findOrFail($id);
            $book->update($validatedData);
            if (!$book) {
                return redirect()->back()->withInput()->with('error', 'Không thể lưu sách.');
            }
            return redirect()->route('books.index')->with('success', 'Cập nhật sách thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Đã xảy ra lỗi khi cập nhật sách. Vui lòng thử lại.');
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Xóa sách thành công.');
    }
}
