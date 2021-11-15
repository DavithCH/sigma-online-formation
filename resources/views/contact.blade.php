@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold text-center uppercase">Contact form</h1>
        <form action="{{route('sendMail')}}" method="post">
            @csrf
            <div>
                <label>First name & Last name</label>
                <input class="w-full text-lg outline-none border-2" type="text" required name="name">
            </div>
            <div>Email</label>
                <input class="w-full text-lg outline-none border-2" type="email" required name="email">
            </div>
            <div>
                <label>Subject</label>
                <input class="w-full text-lg outline-none border-2" type="text" required name="subject">
            </div>
            <div>
                <label>Message</label>
                <textarea class="w-full text-lg outline-none border-2" name="message" id="" cols="30" rows="10" required></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Send</button>
        </form>
    </div>
@endsection
