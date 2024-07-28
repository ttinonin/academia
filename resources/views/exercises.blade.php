<x-layout>
    <h1 class="font-bold text-2xl mb-4">Exercises</h1>

    @foreach ($exercises as $exercise)
        <div class="font-bold text-lg p-3 bg-zinc-500 my-2 rounded-lg cursor-pointer">
            {{ $exercise->name }}
        </div>
    @endforeach
</x-layout>