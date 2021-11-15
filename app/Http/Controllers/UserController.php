<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
