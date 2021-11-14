<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Sigma Online Plateform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="container mx-auto font-sans">
    <header>
        <nav>
            <ul class="flex justify-between text-lg items-center h-20 border-2 uppercase">
                <li class="ml-2 cursor-pointer font-bold border-2 text-3xl"><a href="{{route('courseList')}}">Sigma</a></li>
                <li class="cursor-pointer">
                    <div  id="category-drop">Category</div>
                    <div class="flex flex-col absolute bg-gray-200 p-4 hidden" id='category-element'>
                        @foreach ($categories as $category)
                        <a href="{{route('showCategory', $category->id)}}" class="my-2 cursor-pointer hover:bg-gray-400">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="cursor-pointer">Contact</li>
                <li class="mr-2 cursor-pointer">Account</li>
            </ul>
        </nav>
    </header>
    <script>
        let categoryDrop = document.querySelector('#category-drop');
        categoryDrop.addEventListener('click', function(){
            let categoryElement = document.querySelector('#category-element');
            categoryElement.classList.toggle("hidden");
        })
    </script>
    @yield('content')
    @yield('script')

</body>
</html>

