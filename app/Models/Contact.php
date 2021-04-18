<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'question_id',
        'message',
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
