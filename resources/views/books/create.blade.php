@extends('layout')

@section('content')

<a href="/books" class="text-sm text-[#7B6A58] mb-4 inline-block">
    ← Back to collection
</a>

<h2 class="text-2xl font-[Playfair Display] mb-2">
    Add a New Book
</h2>

<p class="text-sm text-[#7B6A58] mb-6">
    Add a new book to your collection
</p>

<div class="bg-[#EFE7DC] p-6 rounded-xl shadow max-w-xl">

<form action="/books" method="POST">
@csrf

<input type="text" name="title"
    placeholder="Enter book title"
    class="w-full mb-4 p-2 rounded border"
    value="{{ old('title') }}">

<input type="text" name="author"
    placeholder="Enter author name"
    class="w-full mb-4 p-2 rounded border"
    value="{{ old('author') }}">

<input type="number" name="pages"
    placeholder="Enter page count"
    class="w-full mb-4 p-2 rounded border"
    value="{{ old('pages') }}">

<select name="status" class="w-full mb-6 p-2 rounded border">
    <option value="unread">Unread</option>
    <option value="reading">Reading</option>
    <option value="read">Read</option>
</select>

<div class="flex gap-3">

<button class="bg-[#8B2E3C] text-white px-5 py-2 rounded shadow">
    + Add Book
</button>

<a href="/books" class="px-4 py-2 border rounded">
    Cancel
</a>

</div>

</form>
</div>

@endsection