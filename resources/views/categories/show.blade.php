@extends('layouts.layout')

@section('content')
    @foreach ($courses as $course)
    <div class="mb-4 bg-gray-100 flex flex-col p-2 justify-center items-center">
        <div class="w-11/12 h-full">
            <div class="flex justify-between">
            <h4 class="font-bold text-xl mb-2 uppercase">{{$course->name}}</h4>
            <p>Rate : <span class="font-semibold {{$course->rate >= 3 ?'text-green-500':'text-red-700'}}">{{$course->rate}} </span> <i class="fas fa-star text-yellow-500 "></i></p>
            </div>

            <div class="mb-2">
                <img class="object-cover w-full h-96" src="{{!str_contains($course->image, 'images/') ? $course->image : asset('storage/'.$course->image)}}"
                >
            </div>
            <div class="mb-2">
                <p class="mb-2">{{$course->description}}</p>
                <div class="flex justify-between w-full font-semibold">
                    @if(isset($course->getUser))
                    <p>Teacher : {{$course->getUser->firstname}} {{$course->getUser->lastname}} </p>
                    @endif
                    <p>price : {{$course->price}} €</p>
                </div>
            </div>

            <div class="flex justify-between">
                <div>
                @foreach ($course->getCategories as $category)
                    <span class="border-2 bg-green-400 rounded-lg p-2 font-bold text-sm hover:bg-green-200">{{$category->name}}</span>
                @endforeach
                </div>
                <a class="btn btn-primary" href="{{route('courseDetails', $course->id)}}">view</a>
            </div>
        </div>
    </div>

    @endforeach
@endsection
