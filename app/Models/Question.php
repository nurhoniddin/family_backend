<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_uz',
        'question_ru',
    ];
    public function contact(){
        return $this->hasMany(Contact::class,'question_id');
    }
}
