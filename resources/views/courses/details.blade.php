@extends("layouts.layout")

@section('content')

<div class="flex flex-col justify-center item-center mt-5 text-xl">
        <div class="mb-4 bg-gray-100 flex flex-col p-2 justify-center items-center">
            <div class="w-11/12">
                <div class="flex justify-between">
                <h4 class="font-bold text-xl mb-2 uppercase ">{{$course->name}}</h4>
                <p>Rate : <span class="font-bold {{$course->rate >= 3 ?'text-green-500':'text-red-700'}}">{{$course->rate}} </span> <i class="fas fa-star text-yellow-500 "></i></p>
                </div>
                <div class="mb-2">
                <img class="w-full"  src="{{$course->image}}" alt="{{$course->image}}">
                </div>
                <div >
                <p class="mb-2">{{$course->description}}</p>
                <div class="flex justify-between w-full font-semibold">
                    <p>Teacher : {{$course->getUser->firstname}} {{$course->getUser->lastname}} </p>
                    <p>price : {{$course->price}} €</p>
                </div>
                @foreach ($course->getChapters as $chapter )
                <div class="bg-green-100 my-4 p-4 text-sm">

                    <details class="hidden-text cursor-pointer">
                        <summary class="flex justify-between">
                            <h5 class="font-semibold">{{$chapter->title}}</h5>
                            <span> duration : {{$chapter->duration}}</span>
                        </summary>
                        {{$chapter->content}}
                    </details>

                </div>
                @endforeach
            </div>
        </div>

</div>
<script>
    let hiddenText = document.getElementsByClassName('hidden-text');

    for(var i = 0; i < hiddenText.length; i++) {
        hiddenText[i].addEventListener('toggle', function(){
        return
        })
    }

</script>

@endsection

@section('script')

@endsection
