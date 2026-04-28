@extends('layout')

@section('content')

<!-- Stats -->
<div class="bg-[#EFE7DC] rounded-xl p-6 mb-8 flex justify-between text-center">

    <div>
        <p class="text-2xl font-semibold text-red-600">{{ $books->count() }}</p>
        <p class="text-sm text-[#7B6A58]">Total Books</p>
    </div>

    <div>
        <p class="text-2xl font-semibold text-orange-500">
            {{ $books->where('status','reading')->count() }}
        </p>
        <p class="text-sm text-[#7B6A58]">Reading Now</p>
    </div>

    <div>
        <p class="text-2xl font-semibold text-green-600">
            {{ $books->where('status','read')->count() }}
        </p>
        <p class="text-sm text-[#7B6A58]">Completed</p>
    </div>

    <div>
        <p class="text-2xl font-semibold">
            {{ $books->sum('pages') }}
        </p>
        <p class="text-sm text-[#7B6A58]">Total Pages</p>
    </div>

</div>

<!-- Header -->
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold font-[Playfair Display]">
        My Collection
    </h2>

    <a href="/books/create"
       class="bg-[#8B2E3C] text-white px-4 py-2 rounded-lg shadow hover:bg-[#732530]">
        + Add Book
    </a>
</div>

<!-- Grid -->
<div class="grid grid-cols-2 gap-6">

@foreach ($books as $book)
<div class="bg-[#EFE7DC] rounded-lg p-4 shadow-sm border-l-4
    @if($book->status == 'read') border-green-600
    @elseif($book->status == 'reading') border-orange-400
    @else border-gray-400
    @endif">

    <h3 class="font-semibold font-[Playfair Display]">
        {{ $book->title }}
    </h3>

    <p class="text-sm text-[#7B6A58] italic">
        {{ $book->author }}
    </p>

    <p class="text-sm mt-2">
        {{ $book->pages }} pages
    </p>

    <!-- Status -->
    <p class="text-sm mt-2
        @if($book->status == 'read') text-green-600
        @elseif($book->status == 'reading') text-orange-500
        @else text-gray-600
        @endif">

        {{ ucfirst($book->status) }}
    </p>

    <!-- Actions -->
    <div class="flex gap-2 mt-4">

        <a href="/books/{{ $book->id }}/edit"
           class="bg-[#4A3426] text-white px-3 py-1 rounded text-sm">
            Edit
        </a>

        <form action="/books/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-200 text-red-700 px-3 py-1 rounded text-sm">
                Delete
            </button>
        </form>

    </div>

</div>
@endforeach

</div>

@endsection