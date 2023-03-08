<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index(){
        $tag = DB::table('tag')->paginate(10);

        return view('tag.tag', ['tag' => $tag]);
    }

    public function cari_tag($q){
        $tag = DB::table('tag')
        ->where('name','LIKE','%'.$q.'%')
        ->orWhere('desc','LIKE','%'.$q.'%')
        ->paginate(10);

        return view('tag.tag', ['tag' => $tag]);
    }

    public function new_tag(){
        return view('tag.new_tag');
    }

    public function simpan_new_tag(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:20', 'unique:tag,name'],
            'desc' => ['required', 'string', 'max:50'],
        ]);

        DB::table('tag')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/tag');
    }

    public function edit_tag($id){
        $tag = DB::table('tag')->where('id', $id)->first();

        return view('tag.edit_tag', ['tag' => $tag]);
    }

    public function simpan_edit_tag(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'desc' => ['required', 'string', 'max:50'],
        ]);

        DB::table('tag')->where('id', $request->id_tag)->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/tag');
    }

    public function delete_tag($id){
        DB::table('tag')->where('id', $id)->delete();
        DB::table('post_tag')->where('id_tag', $id)->delete();

        return redirect('/tag');
    }
}
