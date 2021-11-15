<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function show($id){
        $users =User::all();
        $user = User::find($id);

        return view('users.profile', compact(['user', 'users']));
    }

    public function edit($id) {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update($id, UserStoreRequest $request) {
        $user = User::find($id);

        $params = $request->validated();
        $file = Storage::put('public/users', $params['image']);
        $params['image'] = substr($file, 7);
        $user->update($params);

        return redirect()->route('userProfile', $user->id);
    }


    public function updatePasswordForm($id){
        $user = User::find($id);
        return view('users.updatePassword', compact('user'));
    }

    public function updatePassword($id, Request $request) {
        $user = User::find($id);
        $params = $request->all();

        if(Hash::check($params['current_password'], $user->password) && ($params['new_password'] == $params['password_confirmation'])){
            $user->update([
                "password" => bcrypt($params['new_password']),
            ]);
        }
        else {
            return back()->withErrors(['msg' => 'Your password reset does not meet requirement']);
        }

        return redirect()->route('userProfile', $user->id);
    }
}
