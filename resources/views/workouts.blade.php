<x-layout>
    <div class="flex items-center justify-between">
        <h1 class="font-bold text-2xl">Your Workouts</h1>
        <a href="/create-workout">
            <button class="bg-green-500 hover:bg-green-600 w-full font-bold px-4 py-2 rounded-md">Create</button>
        </a>
    </div>

    @foreach ($workouts as $workout)
        <div class="bg-slate-800 p-2 shadow-md cursor-pointer rounded-lg my-3">
            <h2 class="font-bold text-lg">{{ $workout->title }}</h2>
    
            @foreach ($workout->exercise()->limit(4)->get() as $exercise)
                <p>{{ $exercise->name }}</p>
            @endforeach
            . . .
        </div>
    @endforeach
</x-layout>