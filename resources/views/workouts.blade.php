<x-layout>
    <div class="flex items-center justify-between">
        <h1 class="text-lg">Your Workouts</h1>
        <a href="/create-workout">
            <button class="bg-purple-700 hover:bg-purple-800 w-full font-semibold text-white px-3 py-1 rounded-md">+ Create</button>
        </a>
    </div>

    @foreach ($workouts as $workout)
        <a href="/workout/{{ $workout->id }}">
            <div class="rounded-xl border bg-gray-100 p-2 cursor-pointer mt-2">
                <h2 class="font-semibold text-lg">{{ $workout->title }}</h2>
        
                @foreach ($workout->exercise()->limit(4)->get() as $exercise)
                    <p class="text-sm">{{ $exercise->name }}</p>
                @endforeach
                <p class="text-sm">. . .</p>
            </div>
        </a>
    @endforeach
</x-layout>