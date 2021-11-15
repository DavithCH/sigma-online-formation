@extends('layouts.layout')

@section('content')

@if(Auth::user())
    @if(Auth::user()->role == 'USER' || Auth::user()->role == 'ADMIN')
        <div>
            <h3 class="text-center text-2xl font-bold uppercase">Add new chapter</h3>
            @if($errors->any())
            @foreach ($errors->all() as $error)
            <p style="color:red">{{$error}}</p>
            @endforeach
            @endif

            <form action="{{route('storeChapter', $course)}}" method="post" class="text-lg">
                @csrf
                <div class="w-full">
                    <label>Title</label>
                    <input class="w-full border-2 outline-none" type="text" required name="title">
                </div>
                <div>
                    <label>Chapter's number</label>
                    <input class="w-full border-2 outline-none" type="text" required name="number">
                </div>
                <div>
                    <label>Content</label>
                    <textarea class="w-full border-2 outline-none" name="content" required rows="10"></textarea>
                </div>
                <div>
                    <label>Duration</label>
                    <input class="w-full border-2 outline-none" type="text" name="duration" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    @else
    <h3>You don't have permission to add any course here!</h3>
    @endif
@endif
@endsection
