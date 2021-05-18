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
		$statistic = new Statistic();
		$statistic->title_statistic_uz = $request->input('title_statistic_uz');
    	$statistic->text_statistic_uz = $request->input('text_statistic_uz');
    	$statistic->title_statistic_ru = $request->input('title_statistic_ru');
    	$statistic->text_statistic_ru = $request->input('text_statistic_ru');
    	$statistic->title_marriage_uz = $request->input('title_marriage_uz');
    	$statistic->count_marriage_uz = $request->input('count_marriage_uz');
    	$statistic->title_marriage_ru = $request->input('title_marriage_ru');
    	$statistic->count_marriage_ru = $request->input('count_marriage_ru');
    	$statistic->title_happy_family_uz = $request->input('title_happy_family_uz');
    	$statistic->count_happy_family_uz = $request->input('count_happy_family_uz');
    	$statistic->title_happy_family_ru = $request->input('title_happy_family_ru');
    	$statistic->count_happy_family_ru = $request->input('count_happy_family_ru');
    	$statistic->divorce_title_uz = $request->input('count_divorce_uz');
    	$statistic->count_divorce_uz = $request->input('count_divorce_uz');
    	$statistic->divorce_title_ru = $request->input('divorce_title_ru');
    	$statistic->count_divorce_ru = $request->input('count_divorce_ru');
    	$statistic->title_women_uz = $request->input('title_women_uz');
    	$statistic->count_women_uz = $request->input('count_women_uz');
    	$statistic->title_women_ru = $request->input('title_women_ru');
    	$statistic->count_women_ru = $request->input('count_women_ru');
    	$statistic->save();
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
	    
//		$statistic = new Statistic();
	    $statistic->count_marriage_uz = $request->input('count_marriage_uz');
	    $statistic->count_marriage_ru = $request->input('count_marriage_ru');
	    $statistic->count_happy_family_uz = $request->input('count_happy_family_uz');
	    $statistic->count_happy_family_ru = $request->input('count_happy_family_ru');
	    $statistic->count_divorce_uz = $request->input('count_divorce_uz');
	    $statistic->count_divorce_ru = $request->input('count_divorce_ru');
	    $statistic->count_women_uz = $request->input('count_women_uz');
	    $statistic->count_women_ru = $request->input('count_women_ru');
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
