<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="py-12">
    <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <a href="{{ route('sales-representatives.index') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sales Representatives</h2>
        </a>

        {{ $slot }}
    </div>
</div>
</body>
</html>
