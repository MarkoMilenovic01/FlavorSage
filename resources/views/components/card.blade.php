@props(['recipe'])


<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$recipe->photo ? asset('storage/'. $recipe->photo) : asset('/images/dish1.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/recipes/{{$recipe->id}}">{{$recipe->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$recipe->cook}}</div>
           
                {{-- Tags --}}
            <x-tags :tagsCsv="$recipe->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot text-green-500"></i> {{$recipe->location}}
            </div>
        </div>
    </div>
</div>