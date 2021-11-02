@extends('layouts.layout')

@section('content')
    @if(count($courses) > 0)
    <div class="flex flex-col justify-center item-center mt-5">
        @foreach($courses as $course)
            <div class="mb-4 bg-gray-100 flex flex-col p-2 justify-center items-center">
                <div class="flex w-3/4 justify-between">
                <h4 class="font-bold text-xl mb-2 ">{{$course->name}}</h4>
                <p><span class="font-semibold">rate :</span> {{$course->rate}} <i class="fas fa-star text-yellow-500 "></i></p>
                </div>
                <img class="mb-2"  src="{{$course->image}}" alt="{{$course->image}}">
                <div class="w-3/4">
                <p class="mb-2">{{$course->description}}</p>
                <div class="flex justify-between w-full">
                    <p>Teacher : {{$course->getUser->firstname}} {{$course->getUser->lastname}} </p>
                    <p>price : {{$course->price}} €</p>
                </div>
            </div>
            </div>

        @endforeach
    @else
    </div>
    @endif

@endsection
