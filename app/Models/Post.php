<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_uz',
        'title_ru',
        'description_uz',
        'description_ru',
        'content_uz',
        'content_ru',
        'image',
        'file',
        'views',
        'category_id'
    ];
}