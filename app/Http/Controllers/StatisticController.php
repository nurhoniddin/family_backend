<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$statistic = Statistic::latest()->paginate(10);
        return view('statistic.index',compact('statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
	    $data = new Statistic();
	    $data->title_statistic_uz = $request->input('title_statistic_uz');
	    $data->text_statistic_uz = $request->input('text_statistic_uz');
	    $data->title_statistic_ru = $request->input('title_statistic_ru');
	    $data->title_marriages_uz = $request->input('title_marriages_uz');
	    $data->count_marriages_uz = $request->input('count_marriages_uz');
	    $data->title_marriages_ru = $request->input('title_marriages_ru');
	    $data->count_marriages_ru = $request->input('count_marriages_ru');
	    $data->title_born_uz = $request->input('title_born_uz');
	    $data->count_born_uz = $request->input('count_born_uz');
	    $data->title_born_ru = $request->input('title_born_ru');
	    $data->count_born_ru = $request->input('count_born_ru');
	    $data->title_happy_uz = $request->input('title_happy_uz');
	    $data->count_happy_uz = $request->input('count_happy_uz');
	    $data->title_happy_ru = $request->input('title_happy_ru');
	    $data->count_happy_ru = $request->input('count_happy_ru');
	    $data->save();
//	    dd($data);
	    return redirect()->route('statistic.index')
			->with('success','Statistika Yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
	    return view('statistic.show',compact('statistic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
	    return view('statistic.edit',compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Statistic $statistic)
    {
	    $statistic->title_statistic_uz = $request->input('title_statistic_uz');
	    $statistic->text_statistic_uz = $request->input('text_statistic_uz');
	    $statistic->title_statistic_ru = $request->input('title_statistic_ru');
	    $statistic->text_statistic_ru = $request->input('text_statistic_ru');
	    $statistic->title_marriages_uz = $request->input('title_marriages_uz');
	    $statistic->count_marriages_uz = $request->input('count_marriages_uz');
	    $statistic->title_marriages_ru = $request->input('title_marriages_ru');
	    $statistic->count_marriages_ru = $request->input('count_marriages_ru');
	    $statistic->title_born_uz = $request->input('title_born_uz');
	    $statistic->count_born_uz = $request->input('count_born_uz');
	    $statistic->title_born_ru = $request->input('title_born_ru');
	    $statistic->count_born_ru = $request->input('count_born_ru');
	    $statistic->title_happy_uz = $request->input('title_happy_uz');
	    $statistic->count_happy_uz = $request->input('count_happy_uz');
	    $statistic->title_happy_ru = $request->input('title_happy_ru');
	    $statistic->count_happy_ru = $request->input('count_happy_ru');
	    $statistic->save();
	  
	    $statistic->save();
		     return redirect()->route('statistic.index')
			     ->with('success','Statistika Yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('statistic.index')
	        ->with('success','Statistika o\'chirildi');
    }
}
