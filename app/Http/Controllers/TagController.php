<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::with('post')->latest()->paginate(10);
        return view('tags.index', compact('tag'));
    }

    public function destroy($id)
    {
        $tag= Tag::find($id);
        $tag->delete();
        return back()->with('error','Teg O`chirildi');
    }
}
