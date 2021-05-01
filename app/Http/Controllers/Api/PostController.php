<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::orderBy('id','DESC')->get();
        return response()->json(compact('post'));
    }

    public function posts($category_id)
    {
        $categoryDetails = Category::where('id',$category_id)->first();
        if ($categoryDetails->parent_id==0) {
            // If url is main Category url
            $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
            foreach($subCategories as $subcat){
                $cat_ids[] = $subcat->id;
            }
            $posts = Post::whereIn('category_id',$cat_ids)->get();
        }else{
            // If url is sub category url
            $posts = Post::where(['category_id' => $categoryDetails->id])->get();
        }
        return response()->json(compact('posts'));
    }

    public function details($id)
    {
        $details = Post::with('tag')->where('id',$id)->first();
        $comment = Comment::where('post_id',$id)->where('status',1)->get();
        return response()->json(compact('details','comment'));
    }

    public function search(Request $request)
    {
        $search = $request->input('name');
        $search_post = Post::where('title_uz','like','%'.$search.'%')
            ->orwhere('title_ru','like','%'.$search.'%')
            ->orwhere('description_uz','like','%'.$search.'%')
            ->orwhere('description_ru','like','%'.$search.'%')->get();

        return response()->json(compact('search_post'));
    }

    function downloadFile($id){
        $post = Post::findOrFail($id);
        return response()->download(storage_path("app/public/{$post->file}"));
    }
}
