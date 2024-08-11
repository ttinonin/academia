<x-layout>
    <h1 class="font-semibold text-2xl">Create Workout</h1>
    <p class="text-sm text-gray-400">Time for massive gains!</p>
    <form action="/workout" method="POST" class="create-workout-form">
        @csrf
        <div class="mt-4">
            <label for="title" class="block text-sm font-semibold mb-1">Workout Title:</label>
            <input type="text" id="title" value="{{ old('title') }}" class="border bg-gray-100 rounded-md p-2 w-full" placeholder="Chest and Back" name="title">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label for="exercise" class="block text-sm font-semibold mb-1">Exercise:</label>
            <div class="flex items-center mb-2">
                <select name="" id="exercise" class="border bg-gray-100 rounded-md p-2 w-full" id="">
                    @foreach ($exercises as $exercise)
                        <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                    @endforeach
                </select>
                <button type="button" id="add-muscle-btn" class="px-4 py-2 ml-2 border rounded-md w-[30%]">Add +</button>
            </div>

            @error('exercises')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
    
            <div class="" id="exercises_view">
    
            </div>

            <input type="hidden" name="exercises" id="exercises_input">
    
            <button type="button" id="create-workout-button" class="bg-purple-700 text-white font-semibold hover:bg-purple-800 py-2 w-full rounded-md mt-2">Create</button>
        </div>
    </form>
</x-layout>