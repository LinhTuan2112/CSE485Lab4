<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Định nghĩa mối quan hệ: Mỗi lượt mượn sách thuộc về một người đọc
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
}
