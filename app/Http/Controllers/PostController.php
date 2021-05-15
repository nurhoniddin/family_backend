<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Str;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use \App\Notifications\InvoicePaid;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    function downloadFile($id){
        $post = Post::findOrFail($id);
        return response()->download(storage_path("app/public/{$post->file}"));
    }

    public function index()
    {
        $post = Post::latest()->paginate(10);
        return view('posts.index',compact('post'));
    }

    public function create()
    {
        //Categories drop down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='0' selected disabled>Kategoriyalar...</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name_uz . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--------&nbsp;" . $sub_cat->name_uz . "</option>";
                $sub_cat = Category::where(['parent_id' => $sub_cat->id])->get();
                foreach ($sub_cat as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;-------------------&nbsp;" . $sub_cat->name_uz . "</option>";
                }
            }
    	}
        //Categories drop down ends

        return view('posts.create',compact('categories_dropdown'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        //Categories drop down start
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='0' selected disabled>Kategoriyalar...</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name_uz . "</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--------&nbsp;" . $sub_cat->name_uz . "</option>";
                $sub_cat = Category::where(['parent_id' => $sub_cat->id])->get();
                foreach ($sub_cat as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;-------------------&nbsp;" . $sub_cat->name_uz . "</option>";
                }
            }
        }
        //Categories drop down ends

        return view('posts.edit',compact('post','categories_dropdown'));

    }

    public function update(Request $request, $id)
    {
        $data = Post::findOrFail($id);

        $data->title_uz = $request->title_uz;
        $data->title_ru = $request->title_ru;
        $data->description_uz = $request->description_uz;
        $data->description_ru = $request->description_ru;
        $data->content_uz = $request->content_uz;
        $data->content_ru = $request->content_ru;
        $data->category_id = $request->category_id;
	    $data->keywords_uz = $request->keywords_uz;
	    $data->keywords_ru = $request->keywords_ru;
	    $data->meta_description_uz = $request->meta_description_uz;
	    $data->meta_description_ru = $request->meta_description_ru;
        $data->status = $request->input('status');

        if ($request->hasFile('image')) {
        $imagePath = request('image')->store('post_images', 'public');
        $data->image = $imagePath;
        }

        if ($request->hasFile('file')) {
        Storage::disk('public')->delete($data->file);
        $data->delete();
        $filePath = request('file')->store('post_files', 'public');
        $data->file = $filePath;
        }

        $data->save();

        // Telegram send message channel
        if ($request->telegram == 1){
            Notification::send($data, new InvoicePaid());
        }

        return redirect()->route('posts.index')->with('success','Yangilik O`zgartirildi');
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    public function store(Request $request)
    {
//	    $request->validate([
//		    'Matn  Lotin harflarida bo\'lih kerak'=>'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
//		    'Matn Ruscha harflarida bo\'lih kerak'=> 'required|regex:/[А-Яа-яЁё]/u',
//	    ]);

	    $data = new Post();

        $data->title_uz = $request->input('title_uz');
        $data->title_ru = $request->input('title_ru');
        $data->description_uz = $request->input('description_uz');
        $data->description_ru = $request->input('description_ru');
        $data->content_uz = $request->input('content_uz');
        $data->content_ru = $request->input('content_ru');
        $data->category_id = $request->input('category_id');
	    $data->keywords_uz = $request->keywords_uz;
	    $data->keywords_ru = $request->keywords_ru;
	    $data->meta_description_uz = $request->meta_description_uz;
	    $data->meta_description_ru = $request->meta_description_ru;
	    $data->status = $request->input('status');

        if ($request->hasFile('image')) {
        $imagePath = request('image')->store('post_images', 'public');
        $data->image = $imagePath;
        }

        if ($request->hasFile('file')) {
        $filePath = request('file')->store('post_files', 'public');
        $data->file = $filePath;
        }

        $data->save();

        // Telegram send message channel
        if ($request->telegram == 1){
            Notification::send($data, new InvoicePaid());
        }

        $post_id = DB::getPdo()->lastInsertId();

        $data = $request->all();

        $tag = [];
        for($i= 0; $i < count($data['name_uz']); $i++){
            $tag[] = [
                'post_id' => $post_id,
                'name_uz' => $data['name_uz'][$i],
                'name_ru' => $data['name_ru'][$i],

            ];
        }
        DB::table('tags')->insert($tag);

	    return redirect()->route('posts.index')
            ->with('success', 'Yangilik yaratildi');
    }

    public function destroy($id)
    {
        $post= Post::find($id);
        Storage::disk('public')->delete($post->image);
        Storage::disk('public')->delete($post->file);
        $post->delete();
        return back()->with('error','Yangilik O`chirildi');
    }
}
