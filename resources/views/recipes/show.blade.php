@extends('layout')

@section('content')
    <main>
        @include('partials._search')
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div
                    class="flex flex-col items-center justify-center text-center"
                >
                    <img
                        class="w-48 mr-6 mb-6"
                        src="{{$recipe->photo ? asset('storage/'. $recipe->photo) : asset('/images/dish1.jpg')}}"
                        alt=""
                    />

                    <h3 class="text-2xl mb-2">{{$recipe->title}}</h3>
                    <div class="text-xl font-bold mb-4">{{$recipe->cook}}</div>
                    {{-- Tags --}}
                    <x-tags :tagsCsv="$recipe->tags" />
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{$recipe->location}}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Recipe Description
                        </h3>
                        <x-ingredients :ingredientsCsv="$recipe->ingredients" />
                        <div class="text-lg space-y-6">
                           
                            <p>
                               {{$recipe->description}}
                            </p>

                            <a
                                href="mailto:{{$recipe->email}}"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Chef</a
                            >
                        </div>
                    </div>
                </div>
        </div>
    </main>



@endsection