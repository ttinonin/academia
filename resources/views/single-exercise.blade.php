<x-layout>
    <h1 class="font-bold mb-2 text-2xl">{{ $exercise->name }}</h1>

    <p class="mb-2">Target Muscles:</p>
    <ul class="list-disc px-4">
        @foreach ($exercise->muscle()->get() as $muscle)
            <li>{{ Str::upper($muscle->name) }}</li>
        @endforeach
    </ul>

    <div class="flex flex-row mt-4">
        <form action="/exercise/{{ $exercise->id }}" class="w-full" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 py-2 w-full rounded-md hover:bg-red-600">Delete</button>
        </form>
    </div>
</x-layout>