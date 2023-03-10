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
use Storage;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){
        $post = Post::with('user')
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        return view('post.post', ['post'=>$post]);
    }

    public function cari_post($q){
        $post = Post::with('user')
        ->orderBy('created_at', 'desc')
        ->where('title','LIKE','%'.$q.'%')
        ->paginate(5);

        return view('post.post', ['post'=>$post]);
    }

    public function post_by_author($id){
        $author_name = DB::table('users')->where('id', $id)->first();
        $type = "by_author";

        $post = Post::with('user')
        ->orderBy('created_at', 'desc')
        ->where('id_user',$id)
        ->paginate(5);

        return view('post.post', ['post'=>$post,'type'=>$type,'author_name'=>$author_name]);
    }

    public function post_by_tag($id){
        $tag_name = DB::table('tag')->where('id', $id)->first();
        $type = "by_tag";

        $tag = DB::table('post_tag')->select('id_post')->where('id_tag', $id)->get();
        $array = json_decode(json_encode($tag), true);

        $post = Post::with('user')
        ->whereIn('id',$array)
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        return view('post.post', ['post'=>$post,'type'=>$type,'tag_name'=>$tag_name]);
    }

    public function post_by_category($id){
        $category_name = DB::table('category')->where('id', $id)->first();
        $type = "by_category";

        $category = DB::table('post_category')->select('id_post')->where('id_category', $id)->get();
        $array = json_decode(json_encode($category), true);

        $post = Post::with('user')
        ->whereIn('id',$array)
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        return view('post.post', ['post'=>$post,'type'=>$type,'category_name'=>$category_name]);
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
            'title' => ['required', 'string', 'max:100'],
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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
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

    public function edit_post($id){
        $post = DB::table('post')->where('id', $id)->first();
        $author = DB::table('users')->where('id', $post->id_user)->first();

        if($post->id_user == 0){
            $author_name = 'Account Deleted';
        }else{
            $author_name = $author->name;
        }
        
        
        if(Auth::user()->role != '3' && !(Auth::user()->role == 2 && ($post->id_user != 0 && $author->role != 3)) && !(Auth::user()->role == 1 && Auth::user()->id == $post->id_user)){
            session()->flash('post_red', 'Anda Tidak Diperbolehkan Melakukan Aksi Ini!');
            return redirect('/post');
        }
        
        $post_tag = DB::table('post_tag')->where('id_post', $id)->pluck('id_tag')->toArray();
        $post_category = DB::table('post_category')->where('id_post', $id)->pluck('id_category')->toArray();
        $tag = DB::table('tag')->get();
        $category = DB::table('category')->get();
        
        return view('post.edit_post', ['post' => $post, 'author' => $author_name, 'post_category'=>$post_category, 'post_tag'=>$post_tag,'category' => $category, 'tag' => $tag]);
    }

    public function simpan_edit_post(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
        ]);

        $old = DB::table('post')->where('id', $request->id_post)->first();

        if($request->remove_img){     //remove photo	
            if($old->photo_dir != 'foto/default.jpg' && $old->photo_dir != null){
                if(Storage::exists($old->photo_dir)){
                    Storage::delete($old->photo_dir);
                }
            }
            
            DB::table('post')->where('id', $request->id_post)->update([
                'title' => $request->title,
                'content' => $request->content,
                'photo_dir' => null,
                'updated_at' => Carbon::now(),
            ]);
		}else if ($request->hasFile('foto')){     //change photo
            if($old->photo_dir != 'foto/default.jpg' && $old->photo_dir != null){
                if(Storage::exists($old->photo_dir)){
                    Storage::delete($old->photo_dir);
                }
            }

            $path = $request->foto->store('foto');
            DB::table('post')->where('id', $request->id_post)->update([
                'title' => $request->title,
                'content' => $request->content,
                'photo_dir' => $path,
                'updated_at' => Carbon::now(),
            ]);
        }else{                              //No Change
			DB::table('post')->where('id', $request->id_post)->update([
                'title' => $request->title,
                'content' => $request->content,
                'updated_at' => Carbon::now(),
            ]);
		}

        DB::table('post_tag')->where('id_post', $request->id_post)->delete();
        DB::table('post_category')->where('id_post', $request->id_post)->delete();
        
        if(!empty($request->tag)){
            foreach($request->tag as $t){
                DB::table('post_tag')->insert([
                    'id_post' => $request->id_post,
                    'id_tag' => $t,
                ]);
            }
        }
        
        if(!empty($request->category)){
            foreach($request->category as $c){
                DB::table('post_category')->insert([
                    'id_post' => $request->id_post,
                    'id_category' => $c,
                ]);
            }
        }

        return redirect('/lihat_post/'.$request->id_post);
    }
}
