<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;


class BbsController extends Controller
{
    public function post() {
        return view('bbs.post');
    }

    public function home(Request $request) {
        $posts = DB::table('posts')->get();
        $is_image = false;
        if (Storage::disk('local')->exists('public/post-image/{{post->image}}')) {
            $is_image = true;
        }
          
        return view('home',['posts' => $posts],['is_image' => $is_image]);
    }

    public function store(Request $request) {

        if ($request->file('img')) {
            $filename = $request->img->store('public/post-image');
            $request->image = basename($filename);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }

        DB::table('posts')->insert(
            ['title' => $request->title, 'body' => $request->content, 'created_at' => date('Y/m/d H:i'), 'image' => $request->img->hashName()]);
        
        return redirect('home');
    }
       
    public function delete(Request $request,$id) {
        \App\Post::find($id)->delete();
       
        return redirect('home');
    }

    public function preview(Request $request,Post $post) {
        // $posts = Post::find($id);
        // $posts->all();

        return view('bbs.preview',compact('post'));
    }

    public function update(Request $request,$id) {
        $posts = Post::$id;
    
        return view('update');
    }
}
