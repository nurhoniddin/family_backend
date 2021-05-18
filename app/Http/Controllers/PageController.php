<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    public function index()
    {
        $page = Page::latest()->paginate(10);
        return view('page.index',compact('page'));
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

        return view('page.create',compact('categories_dropdown'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

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

        return view('page.edit',compact('categories_dropdown','page'));

    }

    public function update(Request $request, $id)
    {

        $data = Page::findOrFail($id);

        $data->title_uz = $request->title_uz;
        $data->title_ru = $request->title_ru;
        $data->content_uz = $request->content_uz;
        $data->content_ru = $request->content_ru;
        $data->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('page_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('page.index')->with('success','O`zgartirildi');
    }

    public function store(Request $request)
    {

        $data = new Page();

        $data->title_uz = $request->input('title_uz');
        $data->title_ru = $request->input('title_ru');
        $data->content_uz = $request->input('content_uz');
        $data->content_ru = $request->input('content_ru');
        $data->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('page_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('page.index')
            ->with('success', 'Yaratildi');
    }

    public function destroy($id)
    {
        $page= Page::find($id);
        Storage::disk('public')->delete($page->image);
        $page->delete();
        return back()->with('error','O`chirildi');
    }
}
