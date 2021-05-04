<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::with('post')->latest()->paginate(10);
        return view('tags.index', compact('tag'));
    }

    public function edit($id)
    {
        $tags = Tag::findOrFail($id);

        return view('tags.edit', compact('tags'));
    }

    public function update(Request $request, $id)
    {
        $cat = Tag::findOrFail($id);
        $cat->name_uz = $request->name_uz;
        $cat->name_ru = $request->name_ru;
        $cat->save();
        return redirect()->route('tags.index')->with('success','Teg O`zgartirildi');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return back()->with('error','Teg O`chirildi');
    }
}
