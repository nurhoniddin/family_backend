<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::with('post')->latest()->paginate(10);
        return view('comment.index',compact('comment'));
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.edit',compact('comment'));
    }

    public function comupdate(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();
        return redirect()->route('comment.index')->with('success','Komment O`zgartirildi');
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
