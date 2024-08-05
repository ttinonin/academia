<x-layout>
    {{ $workout->title }}

    <a href="/log-workout/{{ $workout->id }}">
        <button class="bg-green-500 px-5 py-2 rounded-md">Start Workout</button>
    </a>

    <div class="mt-3">
        <p class="mb-4 font-bold text-lg">Exercises</p>
        @foreach ($workout->exercise()->get() as $exercise)
            <p>{{ $exercise->name }}</p>
        @endforeach
    </div>
</x-layout>