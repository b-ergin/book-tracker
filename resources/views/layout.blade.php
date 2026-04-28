<!DOCTYPE html>
<html>
<head>
    <title>The Bookshelf</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- serif-like font feel -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>

<body class="bg-[#F5F1EB] text-[#3E2F23] font-[Inter]">

<!-- Top bar -->
<div class="border-b border-[#CFC6BB] bg-[#F5F1EB]">
    <div class="max-w-5xl mx-auto px-6 py-4 flex items-center gap-3">

        <div class="text-xl">📖</div>

        <div>
            <h1 class="text-xl font-semibold font-[Playfair Display]">
                The Bookshelf
            </h1>
            <p class="text-xs text-[#7B6A58]">
                Your literary companion
            </p>
        </div>

    </div>
</div>

<div class="max-w-5xl mx-auto px-6 py-8">
    @yield('content')
</div>

</body>
</html>