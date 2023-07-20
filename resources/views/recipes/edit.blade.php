@extends('layout')

@section('content')
<main>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Recipe
                </h2>
                <p class="mb-4">Edit: {{$recipe->title}}</p>
            </header>

            <form method="POST" enctype="multipart/form-data" action="/recipes/{{$recipe->id}}">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="cook"
                        class="inline-block text-lg mb-2"
                        >Name of the Cook</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="cook"
                        value="{{$recipe->cook}}"
                    />
                    @error('cook')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Recipe Title</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title"
                        placeholder="Example: Traditional Musaka"
                        value="{{$recipe->title}}"
                    />
                    @error('title')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="location"
                        class="inline-block text-lg mb-2"
                        >Recipe originated from</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="location"
                        placeholder="Example: Turkey, Serbia, Greece"
                        value="{{$recipe->location}}"
                    />
                    @error('location')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Contact Email</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{$recipe->email}}"
                    />
                    @error('email')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="difficulty"
                        class="inline-block text-lg mb-2"
                    >
                     How difficult is it to prepare ?
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="difficulty"
                        value="{{$recipe->difficulty}}"
                        min="1"
                        max="10"
                    />
                    @error('difficulty')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Cooking techniques (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="tags"
                        placeholder="Example: Baking, Boiling, Frying"
                        value="{{$recipe->tags}}"
                    />
                    @error('tags')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="ingredients" class="inline-block text-lg mb-2">
                        Ingredients used (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="ingredients"
                        placeholder="Example: Soy sauce, Salmon, Asparagus"
                        value="{{$recipe->ingredients}}"
                    />
                    @error('ingredients')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="photo" class="inline-block text-lg mb-2">
                       Dish Photo
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="photo"
                    />
                </div>

                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                        Recipe Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="Include ingredients, requirements, process, etc"

                    >
                    {{$recipe->description}}
                    </textarea>
                    @error('description')
                    <p class="mt-4 text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black text-lg"
                    >
                        Edit Recipe
                    </button>

                    <a href="dashboard.html" class="text-black ml-4">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>





@endsection