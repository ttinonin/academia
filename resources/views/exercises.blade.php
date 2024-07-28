<x-layout>
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl mb-4">Exercises</h1>

        <a href="/create-exercise">
            <button class="bg-green-500 hover:bg-green-600 w-full font-bold px-4 py-2 rounded-md">Create Exercise</button>
        </a>
    </div>

    @foreach ($exercises as $exercise)
        <a href="/exercise/{{ $exercise->id }}">
            <div class="font-bold text-lg p-3 bg-zinc-500 my-3 rounded-lg cursor-pointer">
                {{ $exercise->name }}
            </div>
        </a>
    @endforeach
</x-layout>