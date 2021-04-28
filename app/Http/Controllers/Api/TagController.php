<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        $tag = Tag::orderBy('id','DESC')->get();
        return response()->json(compact('tag'));
    }

    public function tagsearch(Request $request)
    {
        $search = $request->input('name');
        $search_tag = Post::where('title_uz','like','%'.$search.'%')
            ->orwhere('title_ru','like','%'.$search.'%')
            ->orwhere('description_uz','like','%'.$search.'%')
            ->orwhere('description_ru','like','%'.$search.'%')->get();

        return response()->json(compact('search_tag'));
    }
}
