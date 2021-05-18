<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable = [
    	'title_statistic_uz',
    	'text_statistic_uz',
    	'title_statistic_ru',
    	'text_statistic_ru',
    	'title_marriage_uz',
    	'count_marriage_uz',
    	'title_marriage_ru',
    	'count_marriage_ru',
    	'title_happy_family_uz',
    	'count_happy_family_uz',
    	'title_happy_family_ru',
    	'count_happy_family_ru',
    	'divorce_title_uz',
    	'count_divorce_uz',
    	'divorce_title_ru',
    	'count_divorce_ru',
    	'title_women_uz',
    	'count_women_uz',
    	'title_women_ru',
    	'count_women_ru',
    ];
}
