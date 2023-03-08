<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $category = DB::table('category')->paginate(10);

        return view('category.category', ['category' => $category]);
    }

    public function cari_category($q){
        $category = DB::table('category')
        ->where('name','LIKE','%'.$q.'%')
        ->orWhere('desc','LIKE','%'.$q.'%')
        ->paginate(10);

        return view('category.category', ['category' => $category]);
    }

    public function new_category(){
        return view('category.new_category');
    }

    public function simpan_new_category(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:20', 'unique:category,name'],
            'desc' => ['required', 'string', 'max:50'],
        ]);

        DB::table('category')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/category');
    }

    public function edit_category($id){
        $category = DB::table('category')->where('id', $id)->first();

        return view('category.edit_category', ['category' => $category]);
    }

    public function simpan_edit_category(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'desc' => ['required', 'string', 'max:50'],
        ]);

        DB::table('category')->where('id', $request->id_category)->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/category');
    }

    public function delete_category($id){
        DB::table('category')->where('id', $id)->delete();
        DB::table('post_category')->where('id_category', $id)->delete();

        return redirect('/category');
    }
}
