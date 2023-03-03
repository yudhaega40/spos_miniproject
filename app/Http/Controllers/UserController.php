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
        $user = DB::table('users')->where('id','!=',Auth::user()->id)->get();

        return view('user.user', ['user' => $user]);
    }

    public function new_user()
    {
        return view('user.new_user');
    }

    public function simpan_new_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
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
        $user = DB::table('users')->where('id', $id)->first();

        return view('user.edit_user', ['user' => $user]);
    }

    public function simpan_edit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
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
        DB::table('users')->where('id', $id)->delete();

        return redirect('/user');
    }
}
