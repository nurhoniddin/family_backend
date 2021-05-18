<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
	public function index(){
		$statistic = Statistic::all();
		return response()->json(compact('statistic'));
	}
}
