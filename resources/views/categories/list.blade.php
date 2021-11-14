@extends('layouts.layout')

@section('content')
<div class="container">
    <h3 class="font-bold text-center text-2xl">Categories</h3>

    <ul class="flex flex-col items-center justify-center text-lg">
        @foreach ($categories as $category )
        <li class="w-full block p-3">
            <div class="flex">
                <form action="{{route('updateCategory',$category->id)}}" method="post" class="flex justify-between">
                    @csrf
                    @method('PUT')
                    <input class="w-11/12 border-2 mx-2" type="text" name="name" required  value='{{$category->name}}'>
                    <button class="btn btn-warning" type="submit">update</button>
                </form>
                <div class="ml-3">
                    <form action="{{route('deleteCategory',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        </li>


        @endforeach
    </ul>

    <a href="{{route('addCategory')}}" class="btn btn-primary mx-5 mt-2">add new category</a>
</div>
@endsection
