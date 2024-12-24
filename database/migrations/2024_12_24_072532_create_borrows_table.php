<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reader_id')->constrained('readers')->onDelete('cascade'); // Tạo cột reader_id và khóa ngoại
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');     // Tạo cột book_id và khóa ngoại
            $table->date('borrow_date');                                                // Ngày mượn
            $table->date('return_date')->nullable();                                    // Ngày trả (có thể null)
            $table->timestamps();                                                      // Tự động thêm created_at và updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
