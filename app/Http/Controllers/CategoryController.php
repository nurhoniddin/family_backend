<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::latest()->paginate(10);
        return view('category.index',compact('cats'));
    }

    public function create()
    {
        //Categories drop down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='0' selected>Kategoriyalar...</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name_uz . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--------&nbsp;" . $sub_cat->name_uz . "</option>";
                $sub_cat = Category::where(['parent_id' => $sub_cat->id])->get();
                foreach ($sub_cat as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;-------------------&nbsp;" . $sub_cat->name_uz . "</option>";
                }
            }
    	}
        //Categories drop down ends

        return view('category.create',compact('categories_dropdown'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
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

    public function show($id){
        $cat = Category::findOrFail($id);
        return view('category.show',compact('cat'));
    }

    public function edit($id)
    {
        $category= Category::findOrFail($id);

        //Categories drop down start
    	$categories =Category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='0' selected>Kategoriyalar...</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name_uz."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach($sub_categories as $sub_cat){
    			$categories_dropdown.= "<option value='".$sub_cat->id."'>&nbsp;--------&nbsp;".$sub_cat->name_uz."</option>";
                $sub_cat = Category::where(['parent_id'=>$sub_cat->id])->get();
                foreach($sub_cat as $sub_cat){
                    $categories_dropdown.= "<option value='".$sub_cat->id."'>&nbsp;-------------------&nbsp;".$sub_cat->name_uz."</option>";
                }
    		}
    	}
        //Categories drop down ends

        return view('category.edit',compact('category','categories_dropdown'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' => 'required',
        ]);
        $cat = Category::findOrFail($id);
        $cat->name_uz = $request->name_uz;
        $cat->name_ru = $request->name_ru;
        $cat->parent_id = $request->parent_id;
        $cat->save();
        return redirect()->route('category.index')->with('success','Kategory O`zgartirildi');
    }

    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        return back()->with('error','Kategory O`chirildi');
    }
}
