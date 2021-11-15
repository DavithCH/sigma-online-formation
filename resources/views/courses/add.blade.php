@extends('layouts.layout')

@section('content')


    @if(Auth::user())
        @if(Auth::user()->role == 'USER' || Auth::user()->role == 'ADMIN')
            <h2 class="text-center text-2xl font-bold uppercase">Add new course</h2>
                @if($errors->any())
                @foreach ($errors->all() as $error)
                <p style="color:red">{{$error}}</p>
                @endforeach
                @endif
            <section class="w-full h-screen">
                <form action="/courses" method="post" enctype="multipart/form-data" class="bg-white shadow-lg rounded border-2 px-8 pt-6 pb-8 my-4 flex flex-col justify-evenly">
                    @csrf
                    <div class="mb-4">
                        <label class=" text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label class=" text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" row="5" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        >

                        </textarea>
                    </div>
                    <div>
                        <label class=" text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input type="file" required name="image" accept="image/*"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        >
                    </div>
                    <div>
                        <label class=" text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="number" step="0.01" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div>
                        <label > Categories : </label>
                        @foreach ($categories as $category)
                            <div>
                                <input
                                    type="checkbox"
                                    value="{{$category->id}}"
                                    id="check-{{$category->id}}"
                                    name="checkboxCategories[{{$category->id}}]"
                                >
                                <label for="check-{{$category->id}}">{{$category->name}}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </form>
            </section>

            @else
                <h3>You don't have permission to add any course here!</h3>
        @endif
    @endif

@endsection
