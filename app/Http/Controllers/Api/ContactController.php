<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function store(Request $request){
        $data = new Contact();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->call_back = $request->input('call_back');
//        dd($data);
        $data->save();
        return response()->json(compact('data'),201);
    }
}
