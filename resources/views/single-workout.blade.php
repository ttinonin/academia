<x-layout>
    <div class="flex items-center justify-between">
        <h1 class="font-semibold text-2xl">{{ $workout->title }}</h1>
        <a href="/log-workout/{{ $workout->id }}">
            <button class="bg-purple-700 font-semibold text-white hover:bg-purple-800 px-3 py-1 rounded-md">Start Workout</button>
        </a>
    </div>


    <div class="mt-3">
        <p class="mb-4 font-bold text-lg">Exercises</p>
        @foreach ($workout->exercise()->get() as $exercise)
            <p>{{ $exercise->name }}</p>
        @endforeach
    </div>
</x-layout>