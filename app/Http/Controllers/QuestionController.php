<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(10);
        return view('question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'savol_uz' => 'required'
        ]);
        $data = new Question();
        $data->question_uz = $request->input('savol_uz');
        $data->question_ru = $request->input('savol_ru');
//        dd($data);
        $data->save();
        return redirect()->route('question.index')
            ->with('success','Savol Qo\'shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return  view('question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'savol_uz' => 'required'
        ]);
       $question->question_uz = $request->input('savol_uz');
       $question->question_ru = $request->input('savol_ru');
//       dd($question);
        $question->save();
        return redirect()->route('question.index')->with('success','Savol Yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('error','Savol O`chirildi');
    }
}
