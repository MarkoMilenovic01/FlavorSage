@extends('layout')
@section('content')
<h1 class="text-center text-4xl">Promote/Demote User</h1>

<div class="flex flex-wrap justify-center mt-10">
    @foreach($users as $user)
    @if(!$user->isAdmin())
    
    <div class="w-full sm:w-1/5 md:w-1/5 lg:w-1/5 xl:w-1/5 p-4">
        <div class="bg-white rounded-lg shadow-md p-2 mb-2">
            <form action="/users/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
            <h1 class="text-lg font-semibold mb-2">{{ $user->name }}</h1>
            <label class="inline-block mr-2">Value: User</label>
            <input class="form-radio text-red-500" type="radio" name="role" {{ $user->role == 0 ? 'checked' : '' }} value="0">
            <br>
            <label class="inline-block mr-2">Value: Manager</label>
            <input class="form-radio text-red-500" type="radio" name="role" {{ $user->role == 1 ? 'checked' : '' }} value="1">
            <br>
            <button class="mt-2 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" type="submit">Change value</button>
        </form>
        </div>
    </div>
   
    @endif
    @endforeach
</div>
<div class="m-5">
    {{$users->links()}}
</div>

@endsection