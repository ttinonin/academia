<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Gym</title>
</head>
<body class="bg-gray-200">
    @if(session()->has('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 " role="alert">
        <div>
          {{ session('success') }}
        </div>
      </div>
    @endif

    @if(session()->has('error'))
    <div class="flex items-center p-4 m-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
        <div>
          {{ session('error') }}
        </div>
      </div>
    @endif

    {{ $slot }}
</body>
</html>