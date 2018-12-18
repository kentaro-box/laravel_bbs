<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Authenticatable;

class BbsController extends Controller
{
    public function post() {
        return view('bbs.post');
    }

    public function home(Request $request) {
        $user = Auth::user();
        $posts = DB::table('posts')->get();
        $comments = DB::table('comments')->get();
        $is_image = false;

        if (Storage::disk('local')->exists('public/post-image/{{post->image}}')) {
            $is_image = true;
        }
          
        return view('home',['posts' => $posts],['is_image' => $is_image],['comments' => $comments]);
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
            ['title' => $request->title, 'body' => $request->content, 'created_at' => date('Y/m/d H:i'), 'user_id' => Auth::id(),'image' => $request->img->hashName()]);
        
        return redirect('home');
    }
       
    public function delete(Request $request,$id) {
        \App\Post::find($id)->delete();
       
        return redirect('home');
    }

    public function preview(Request $request,Post $post) {
        return view('bbs.preview',compact('post'));
    }

    public function update(Request $request,Post $post) {

        if ($request->file('img')) {
            $filename = $request->img->store('public/post-image');
            $request->image = basename($filename);
        } else {
            if ($post->img) {
                $filename = $post->img->store('public/post-image');
                $post->img = basename($filename);
            }           
        }

        $post->title = $request->title;
        $post->body = $request->content;
        if ($request->img) {
            $post->image = $request->img->hashName();
        } else {
            $post->image = $post->image;
        }
        $post->save();
    
        return redirect()->route('home');
    }

    public function comment(Request $request,Post $post) {
        return view('bbs.comment',['post'=>$post]);
    }

    public function commentup(Request $request,Post $post,Comment $comment) {
        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->postid = $request->id;
        $comment->save();

        
        return redirect()->action('HomeController@index',compact('comment'));
    }
}
