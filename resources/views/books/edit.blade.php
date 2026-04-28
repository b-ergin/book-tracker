@extends('layout')

@section('content')

<a href="/books" class="text-sm text-[#7B6A58] mb-4 inline-block">
    ← Back to collection
</a>

<h2 class="text-2xl font-[Playfair Display] mb-2">
    Edit Book
</h2>

<p class="text-sm text-[#7B6A58] mb-6">
    Update the details of your book
</p>

<div class="bg-[#EFE7DC] p-6 rounded-xl shadow max-w-xl">

<form action="/books/{{ $book->id }}" method="POST">
@csrf
@method('PUT')

<!-- Title -->
<input type="text" name="title"
    placeholder="Enter book title"
    class="w-full mb-4 p-2 rounded border"
    value="{{ old('title', $book->title) }}">

<!-- Author -->
<input type="text" name="author"
    placeholder="Enter author name"
    class="w-full mb-4 p-2 rounded border"
    value="{{ old('author', $book->author) }}">

<!-- Pages -->
<input type="number" name="pages"
    placeholder="Enter page count"
    class="w-full mb-4 p-2 rounded border"
    value="{{ old('pages', $book->pages) }}">

<!-- Status -->
<select name="status" class="w-full mb-6 p-2 rounded border">
    <option value="unread" {{ old('status', $book->status) == 'unread' ? 'selected' : '' }}>
        Unread
    </option>
    <option value="reading" {{ old('status', $book->status) == 'reading' ? 'selected' : '' }}>
        Reading
    </option>
    <option value="read" {{ old('status', $book->status) == 'read' ? 'selected' : '' }}>
        Read
    </option>
</select>

<!-- Buttons -->
<div class="flex gap-3">

<button class="bg-[#8B2E3C] text-white px-5 py-2 rounded shadow hover:bg-[#732530]">
    Update Book
</button>

<a href="/books" class="px-4 py-2 border rounded">
    Cancel
</a>

</div>

</form>
</div>

@endsection