<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class m_users extends Controller
{
    public function show_data(){
        $menu = 'data-user';
        $data = User::all();

        return view('master.data_user.index',compact(['data','menu']));
    }

    public function edit_data(User $user){
        $menu = 'data-user';

        return view('master.data_user.edit_user',compact(['user','menu']));
    }

    public function update_data(Request $request, User $user){
        $request->validate([
            // 'username' => 'required|unique:users|max:255',
            'username' => 'required|max:255',
            'role' => 'required',
        ]);
        // dd($user->m_penduduk->nik);

        // dd($request->reset_passw);
        if($request->reset_passw == '1'){
            $user->update([
                'username' => $request->username,
                'role' => $request->role,
                'password' => bcrypt($user->m_penduduk->nik),
            ]);
        }else{
            $user->update([
                'username' => $request->username,
                'role' => $request->role,
            ]);
        }


        return redirect('/data-user')->with('update','Berhasil mengubah data user.');
    }
}
