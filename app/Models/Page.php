<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_uz',
        'title_ru',
        'content_uz',
        'content_ru',
        'category_id',
        'image'
    ];
}
