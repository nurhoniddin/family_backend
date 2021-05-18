<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index($category_id)
    {
        $page = Page::where(['category_id' => $category_id])->get();

        return response()->json(compact('page'));
    }
}
