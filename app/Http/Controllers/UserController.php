<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(){
        $user = DB::table('users')->where('id','!=',Auth::user()->id)->paginate(10);

        return view('user.user', ['user' => $user]);
    }

    public function cari_user($q){
        $user = DB::table('users')
        ->where('name','LIKE','%'.$q.'%')
        ->where('id','!=',Auth::user()->id)
        ->paginate(10);

        return view('user.user', ['user' => $user]);
    }

    public function new_user()
    {
        return view('user.new_user');
    }

    public function simpan_new_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/user');
    }

    public function edit($id){
        if(Auth::user()->role == '1'){
            session()->flash('user_red', 'Anda Tidak Diperbolehkan Melakukan Aksi Ini!');
            return redirect('/user');
        }

        $user = DB::table('users')->where('id', $id)->first();

        return view('user.edit_user', ['user' => $user]);
    }

    public function simpan_edit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required'],
        ]);

        $old_mail = DB::table('users')->where('id', $request->id_user)->first();
        if($old_mail->email === $request->email){
            DB::table('users')->where('id', $request->id_user)->update([
                'name' => $request->name,
                'role' => $request->role,
            ]);
        }else{
            DB::table('users')->where('id', $request->id_user)->update([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => null,
                'role' => $request->role,
            ]);
        }

        return redirect('/user');
    }

    public function delete_user($id){
        if(Auth::user()->role == '1'){
            session()->flash('user_red', 'Anda Tidak Diperbolehkan Melakukan Aksi Ini!');
            return redirect('/user');
        }

        DB::table('users')->where('id', $id)->delete();
        DB::table('post')->where('id_user', $id)->update(['id_user' => '0']);
        return redirect('/user');
    }

    public function ubah_password($id){
        if(Auth::user()->role == '1'){
            session()->flash('user_red', 'Anda Tidak Diperbolehkan Melakukan Aksi Ini!');
            return redirect('/user');
        }

        $user = DB::table('users')->where('id', $id)->first();

        return view('user.ubah_password', ['user' => $user]);
    }

    public function simpan_ubah_password(Request $request){
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        DB::table('users')->where('id', $request->id_user)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('/user');
    }
}
