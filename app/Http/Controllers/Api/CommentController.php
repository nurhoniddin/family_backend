<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $data = new Comment();

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->message = $request->input('message');
        $data->post_id = $request->input('post_id');
        $data->save();


        return response()->json(['status' => 'success']);
    }
}
