@extends('layouts.layout')

@section('content')
<div class="container">
    <h3 class="font-bold uppercase text-xl  text-center">Add a cateogry</h3>
    <form action="{{route('storeCategory')}}" method="post" class="border-2 p-3">
        @csrf
        <div class="text-lg">
            <label >Name :</label>
            <input class="border-2 outline-none" type="text" required  name="name">
        </div>
        <button type="submit" class="btn btn-primary mt-1">Submit</button>
    </form>
</div>
@endsection
