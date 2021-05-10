<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $page = Page::orderBy('id','DESC')->get();
        return response()->json(compact('page'));
    }
}
