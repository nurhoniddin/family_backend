<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::with('post')->paginate(10);
        return view('comment.index',compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->status == 0){
            $comment->status = 1;
        }else{
            $comment->status = 0;
        }
        $comment->save();

        return redirect()->route('comment.index')->with('success','Status O`zgartirildi');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('error','Komment O`chirildi');
    }
}
