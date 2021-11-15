@extends('layouts.layout')

@section('content')

@if($errors->any())
@foreach ($errors->all() as $error)
<p style="color:red">{{$error}}</p>
@endforeach
@endif
<div>
    <form action="{{route('addUser')}}" method="post">
        @csrf
        <div>
            <label for="">First name</label>
            <input type="text" name="firstname" required class="w-full text-lg outline-none border-2">
        </div>
        <div>
            <label for="">Last name</label>
            <input type="text" name="lastname" required class="w-full text-lg outline-none border-2">
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" required class="w-full text-lg outline-none border-2">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" required class="w-full text-lg outline-none border-2">
        </div>

        <div>
            <label for="">Confirm password</label>
            <input type="password" name="password_confirmation" required class="w-full text-lg outline-none border-2">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Sign up</button>
    </form>
</div>
@endsection


{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
