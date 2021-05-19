<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable = [
	        'text_statistic_uz',
            'title_statistic_ru',
            'text_statistic_ru',
            'title_marriages_uz',
            'count_marriages_uz',
            'title_marriages_ru',
	         'count_marriages_ru',
            'title_born_uz',
            'count_born_uz',
            'title_born_ru',
	         'count_born_ru',
            'title_happy_uz',
            'count_happy_uz',
            'title_happy_ru',
	         'count_happy_ru',
    ];
}
