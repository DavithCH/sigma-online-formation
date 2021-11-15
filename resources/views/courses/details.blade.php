@extends("layouts.layout")

@section('content')

<div class="flex flex-col justify-center item-center mt-5 text-xl">
    @if (Auth::user())
        @if (Auth::user()->role == 'ADMIN' || (Auth::user()->id == $course->user_id && Auth::user()->role =='USER'))
        <div class="flex justify-end">

            <form action="{{route('deleteCourse', $course->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
            <a href="{{route('editCourse', $course->id)}}" class="btn btn-warning">EDIT</a>
        </div>
        @endif

    @endif

        <div class="mb-4 bg-gray-100 flex flex-col p-2 justify-center items-center">
            <div class="w-11/12">
                <div class="flex justify-between">
                <h4 class="font-bold text-xl mb-2 uppercase ">{{$course->name}}</h4>
                <p>Rate : <span class="font-bold {{$course->rate >= 3 ?'text-green-500':'text-red-700'}}">{{$course->rate}} </span> <i class="fas fa-star text-yellow-500 "></i></p>
                </div>
                <div class="mb-2 h-full">
                    <img class="object-cover w-full h-96" src="{{!str_contains($course->image, 'images/') ? $course->image : asset('storage/'.$course->image)}}"
                    >
                </div>
                <div >
                <p class="mb-2">{{$course->description}}</p>
                <div class="flex justify-between w-full font-semibold mb-3">
                    @if(isset($course->getUser))
                    <p>Teacher : {{$course->getUser->firstname}} {{$course->getUser->lastname}} </p>
                    @endif
                    <p>price : {{$course->price}} €</p>
                </div>
                <div>
                    @foreach ($course->getCategories as $category)
                        <span class="border-2 bg-green-400 rounded-lg p-2 font-bold text-sm hover:bg-green-200">{{$category->name}}</span>
                    @endforeach
                </div>
                <ul>

                @foreach ($course->getChapters as $chapter )
                <div>
                    <li class="bg-gray-200 my-4 p-4 text-sm hover:bg-green-200">
                        <details class="hidden-text cursor-pointer">
                            <summary class="flex justify-between">
                                <h5 class="font-semibold">Chapter {{$chapter->number}} : "{{$chapter->title}}"</h5>
                                <span> duration : {{$chapter->duration}}</span>
                            </summary>
                            {{$chapter->content}}
                        </details>
                    </li>
                    @if (Auth::user())
                        @if (Auth::user()->role == 'ADMIN' || (Auth::user()->id == $course->user_id && Auth::user()->role =='USER'))
                        <div class="text-sm flex">
                            <form action="{{route('deleteChapter', $chapter->id)}}" method="post" class="mx-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>

                            <a href={{route('editChapter', [$chapter->id, $course->id])}} class="btn btn-warning">edit</a>
                        </div>
                        @endif
                    @endif


                </div>

                @endforeach
                </ul>
            </div>
            @if(Auth::user())
                @if(Auth::user()->role == 'ADMIN' || (Auth::user()->id == $course->user_id && Auth::user()->role =='USER'))
                <div class="mt-3"><a class="btn btn-primary" href="{{route('addChapter', $course->id)}}">add chapter</a></div>
                @endif
            @endif


        </div>

</div>


@endsection

@section('script')
<script>
    let hiddenText = document.getElementsByClassName('hidden-text');

    for(var i = 0; i < hiddenText.length; i++) {
        hiddenText[i].addEventListener('toggle', function(){
        return
        })
    }
</script>

@endsection
