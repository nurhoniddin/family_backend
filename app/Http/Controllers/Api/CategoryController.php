<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
<<<<<<< Updated upstream


class CategoryController extends Controller
{

=======
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::orderBy('id','DESC')->get();
        return response()->json(compact('category'));
    }
>>>>>>> Stashed changes
}
