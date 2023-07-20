@props(['ingredientsCsv'])


@php
    $ingredients = explode(',', $ingredientsCsv);
@endphp

    <ul class="list-disc ml-4">
    @foreach($ingredients as $ingredient)
        <li class="mb-2"> {{$ingredient}}</li>
    @endforeach
    </ul>