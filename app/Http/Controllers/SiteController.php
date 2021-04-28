<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('site_setting.index',compact('settings'));
    }
    public function create(){
        return view('site_setting.create');
    }
    public function store(Request $request){
    	$request->validate([
    		'phone' => 'required',
    		'email' => 'required',
    		'address_uz' => 'required',
    		'work_day' => 'required',
    		'instagram' => 'required',
    		'tik_tok' => 'required',
    		'facebook' => 'required',
    		'youtube' => 'required',
    		'telegram' => 'required',
	    ]);
    	$data = new Setting();
    	$data->phone = $request->input('phone');
    	$data->email = $request->input('email');
    	$data->address_uz = $request->input('address_uz');
    	$data->address_ru = $request->input('address_ru');
    	$data->work_day = $request->input('work_day');
    	$data->instagram = $request->input('instagram');
    	$data->tik_tok = $request->input('tik_tok');
    	$data->facebook = $request->input('facebook');
    	$data->youtube = $request->input('youtube');
    	$data->telegram = $request->input('telegram');
    	$data->save();
	    return redirect()->route('setting.index')
		    ->with('success','Sozlamalar qo\'shildi');
    }

	public function update(Request $request, $id){
		$request->validate([
			'phone' => 'required',
			'email' => 'required',
			'address_uz' => 'required',
			'work_day' => 'required',
			'instagram' => 'required',
			'tik_tok' => 'required',
			'facebook' => 'required',
			'youtube' => 'required',
			'telegram' => 'required',
		]);
		$data = Setting::findOrFail($id);
		$data->phone = $request->input('phone');
		$data->email = $request->input('email');
		$data->address_uz = $request->input('address_uz');
		$data->address_ru = $request->input('address_ru');
		$data->work_day = $request->input('work_day');
		$data->instagram = $request->input('instagram');
		$data->tik_tok = $request->input('tik_tok');
		$data->facebook = $request->input('facebook');
		$data->youtube = $request->input('youtube');
		$data->telegram = $request->input('telegram');
		$data->save();
		return redirect()->route('setting.index')
			->with('success','Sozlamalar yangilandi');
	}
	public function edit($id){
    	$setting = Setting::findOrFail($id);
    	return view('site_setting.edit',compact('setting'));
	}
}
