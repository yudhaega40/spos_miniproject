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
        // $post = DB::table('post')
        // ->join('users', 'post.id_user', '=', 'users.id')
        // ->select('post.*','users.role')
        // ->get();

        $post = Post::with('user')->get();

        return view('post.post', ['post'=>$post]);
    }

    public function lihat_post($id){
        // $post = DB::table('post')->where('id', $id)->first();
        // $author = DB::table('users')->where('id', $post->id_user)->first();
        // $post_tag = DB::table('post_tag')
        // ->join('tag', 'post_tag.id_tag', '=', 'tag.id')
        // ->where('id_post', $id)->get();
        // $post_category = DB::table('post_category')
        // ->join('category', 'post_category.id_category', '=', 'category.id')
        // ->where('id_post', $id)->get();

        $post = Post::with('user')->where('id',$id)->first();
        $post_category = Post::find($id)->category;
        $post_tag = Post::find($id)->tag;
        
        return view('post.lihat_post', ['post' => $post, 'post_category'=>$post_category, 'post_tag'=>$post_tag]);
    }

    public function delete_post($id){
        DB::table('post')->where('id', $id)->delete();
        DB::table('post_tag')->where('id_post', $id)->delete();
        DB::table('post_category')->where('id_post', $id)->delete();

        return redirect('/post');
    }

}
