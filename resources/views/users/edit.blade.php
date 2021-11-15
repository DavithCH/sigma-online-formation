@extends('layouts.layout')
@section('content')
@if(Auth::user())
    @if((Auth::user()->role == 'USER' &&  Auth::user()->id == $user['id']|| Auth::user()->role == 'ADMIN' ))

        <h2 class="text-center text-2xl font-bold uppercase">Update</h2>
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color:red">{{$error}}</p>
        @endforeach
        @endif
    <form class="text-lg" action="{{route('updateUser', $user['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div>
            <label > First name </label>
            <input type="text" required name="firstname" class="w-full border-2 outline-none" value={{$user['firstname']}}>

        </div>
        <div>
            <label > Last name </label>
            <input type="text" required name="lastname" class="w-full border-2 outline-none" value={{$user['lastname']}}>
        </div>
        <div>
            <label> Email </label>
            <input type="email" required name="email" class="w-full border-2 outline-none" value={{$user['email']}}>
        </div>
        <div>
            <label>Image</label>
            <input type="file" required name="image" accept="image/*"
            class="w-full border-2 outline-none"
            >
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
    @endif
@endif
@endsection
