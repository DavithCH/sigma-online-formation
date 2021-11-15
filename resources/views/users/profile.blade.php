@extends('layouts.layout')

@section('content')
    <div>
        <h3 class="text-center font-bold text-lg uppercase">Welcome to your profile, {{$user['firstname']}}!</h3>
    </div>

    <div class="text-lg">
        <h4>First name : {{$user['firstname']}}</h4>
        <h4>Last name : {{$user['lastname']}}</h4>
        <h4>Email : {{$user['email']}}</h4>
        <div>
            <h4>Photo : </h4>
            @if(empty($user['photo'] || !isset($user['photo'])))
                <p>No photo</p>
            @else
                <div class="w-96 max-h-96">
                    <img class="object-cover w-full h-50" src="{{!str_contains($user['image'], 'users/') ? $user['image']  : asset('storage/'.$user['image'])}}"
                        >
                </div>
            @endif
    </div>
    </div>

    <div class="mt-3">
        <a class="btn btn-warning" href="{{route('editUser', $user['id'])}}">Edit my infomations</a>
        <a class="btn btn-warning" href="">Change password</a>
    </div>

    @if(Auth::user()->role =='ADMIN')
    <h3 class="mt-3 text-xl font-bold uppercase text-center">User list</h3>
    <div class="mt-3 w-full">
        <table class="mt-3 w-full">
            <tr class="border-2">
                <th class="border-2">Name</th>
                <th class="border-2">Email</th>
                <th class="border-2">Role</th>
            </tr>
                @foreach ($users as $usr)
                <tr class="border-2 text-center">
                    <td class="border-2">{{$usr->firstname}} {{$usr->lastname}}</td>
                    <td class="border-2">{{$usr->email}}</td>
                    <td class="border-2">{{$usr->role}}</td>
                </tr>
                @endforeach
            </table>
    </div>
@endif
@endsection
