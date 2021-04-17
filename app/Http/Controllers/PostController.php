<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::paginate(10);
        return view('posts.index',compact('post'));
    }

    public function create()
    {
        //Categories drop down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='0' selected disabled>Kategoriyalar...</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'disabled>" . $cat->name_uz . "</option>";
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

        return view('posts.create',compact('categories_dropdown'));
    }

    public function store(Request $request)
    {
        $data = new Post();

        $data->title_uz = $request->input('title_uz');
        $data->title_ru = $request->input('title_ru');
        $data->description_uz = $request->input('description_uz');
        $data->description_ru = $request->input('description_ru');
        $data->content_uz = $request->input('content_uz');
        $data->content_ru = $request->input('content_ru');
        $data->category_id = $request->input('category_id');

        $imagePath = request('image')->store('post_images', 'public');
        $data->image = $imagePath;

        $imagePath = request('file')->store('post_files', 'public');
        $data->file = $imagePath;

        $data->save();

        return redirect()->route('posts.index')
            ->with('success', 'Yangilik yaratildi');
    }

    public function destroy($id)
    {
        $post= Post::find($id);
        Storage::disk('public')->delete($post->image);
        Storage::disk('public')->delete($post->file);
        $post->delete();
        return back()->with('error','Yangilik O`chirildi');
    }
}
