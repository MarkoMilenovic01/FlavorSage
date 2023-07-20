@extends('layout')

@section('content')
   @include('partials._hero')
   <main>
    @include('partials._search')
    <h1 class="text-center text-red-500 text-2xl font-bold uppercase">Get recipes by difficulty</h1>
    <div class="flex justify-center space-x-4 m-5">
        <ul class="flex list-none  rounded p-2">
            @for ($i = 1; $i <= 10; $i++)
                <li class="mr-2">
                    <a href="/?difficulty={{$i}}" class=" ease-in duration-300 bg-green-500 text-white m-1 hover:bg-red-500 p-2 rounded-full font-bold">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </div>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach($recipes as $recipe)
        <x-card :recipe="$recipe" />
    @endforeach
    </div>
    <div class="m-4">
        {{$recipes->links()}}
    </div>
    
   </main>
@endsection