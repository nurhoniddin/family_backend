<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
    	$setting = Setting::all();
    	return response()->json(compact('setting'));
    }
}
