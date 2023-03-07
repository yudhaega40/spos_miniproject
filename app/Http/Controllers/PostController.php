<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $post = Post::with('user')->paginate(5);

        return view('post.post', ['post'=>$post]);
    }

    public function cari_post($q){
        $post = Post::with('user')->where('title','LIKE','%'.$q.'%')->paginate(5);

        return view('post.post', ['post'=>$post]);
    }

    public function lihat_post($id){
        $post = Post::with('user')->where('id',$id)->first();
        $post_category = Post::find($id)->category;
        $post_tag = Post::find($id)->tag;
        
        return view('post.lihat_post', ['post' => $post, 'post_category'=>$post_category, 'post_tag'=>$post_tag]);
    }

    public function delete_post($id){
        $post = DB::table('post')->where('id', $id)->first();
        if(Auth::user()->role != '3' && Auth::user()->id != $post->id_user){
            session()->flash('post_red', 'Anda Tidak Diperbolehkan Melakukan Aksi Ini!');
            return redirect('/post');
        }

        DB::table('post')->where('id', $id)->delete();
        DB::table('post_tag')->where('id_post', $id)->delete();
        DB::table('post_category')->where('id_post', $id)->delete();

        return redirect('/post');
    }

    public function new_post()
    {
        $tag = DB::table('tag')->get();
        $category = DB::table('category')->get();

        return view('post.new_post', ['category' => $category, 'tag' => $tag]);
    }

    public function simpan_new_post(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        if ($request->hasFile('foto')){
			$path = $request->foto->store('foto');
		}else{
			$path = null;
		}

        $id_post = DB::table('post')->insertGetId([
            'title' => $request->title,
            'content' => $request->content,
            'id_user' => Auth::user()->id,
            'photo_dir' => $path,
        ], 'id');
        
        if(!empty($request->tag)){
            foreach($request->tag as $t){
                DB::table('post_tag')->insert([
                    'id_post' => $id_post,
                    'id_tag' => $t,
                ]);
            }
        }
        
        if(!empty($request->category)){
            foreach($request->category as $c){
                DB::table('post_category')->insert([
                    'id_post' => $id_post,
                    'id_category' => $c,
                ]);
            }
        }

        return redirect('/post');
    }

    
}
