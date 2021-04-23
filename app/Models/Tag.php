<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
    'name_uz',
    'name_ru',
    'post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
