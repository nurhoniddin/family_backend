<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    public function index()
    {
        $page = Page::latest()->paginate(10);
        return view('page.index',compact('page'));
    }

    public function create()
    {
        return view('page.create');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('page.edit',compact('page'));

    }

    public function update(Request $request, $id)
    {
        $data = Page::findOrFail($id);

        $data->title_uz = $request->title_uz;
        $data->title_ru = $request->title_ru;
        $data->content_uz = $request->content_uz;
        $data->content_ru = $request->content_ru;

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('page_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('page.index')->with('success','O`zgartirildi');
    }

    public function store(Request $request)
    {

        $data = new Page();

        $data->title_uz = $request->input('title_uz');
        $data->title_ru = $request->input('title_ru');
        $data->content_uz = $request->input('content_uz');
        $data->content_ru = $request->input('content_ru');

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('page_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('page.index')
            ->with('success', 'Yaratildi');
    }

    public function destroy($id)
    {
        $page= Page::find($id);
        Storage::disk('public')->delete($page->image);
        $page->delete();
        return back()->with('error','O`chirildi');
    }
}
