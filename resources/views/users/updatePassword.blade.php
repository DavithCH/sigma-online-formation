@extends('layouts.layout')

@section('content')
@if($errors->any())
@foreach ($errors->all() as $error)
<p style="color:red">{{$error}}</p>
@endforeach
@endif
<div class="container">
    <form action="{{ route('updatePassword', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label>Current password</label>
            <input type="password" required class="w-full outline-none text-lg border-2" name="current_password">
        </div>
        <div>
            <label>New password</label>
            <input type="password" required class="w-full outline-none text-lg border-2" name="new_password">
        </div>
        <div>
            <label>Confirm new password</label>
            <input type="password" required class="w-full outline-none text-lg border-2" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection
