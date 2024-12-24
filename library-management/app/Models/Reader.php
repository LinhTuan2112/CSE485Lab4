<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    // Cấu hình các trường có thể mass assign
    protected $fillable = ['name', 'birthday', 'address', 'phone'];
}
