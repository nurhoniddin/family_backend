<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::paginate(10);
        return view('category.index',compact('cats'));
    }

    public function create()
    {
        return view('category.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name_uz' => 'required',
        ]);
        $data = new Category();
        $data->name_uz = $request->input('name_uz');
        $data->name_ru = $request->input('name_ru');
        $data->parent_id = $request->input('parent_id');
       $data->save();
       return redirect()->route('category.index')
           ->with('success','Kategoriya Yaratildi');
    }
}
