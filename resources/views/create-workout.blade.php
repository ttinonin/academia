<x-layout>
    <h1 class="font-bold text-2xl">Create Workout</h1>
    <form action="/workout" method="POST">
        @csrf
        <div class="mt-4">
            <label for="title" class="block mb-1">Workout Title:</label>
            <input type="text" id="title" value="{{ old('title') }}" class="text-md bg-zinc-800 rounded-md p-2 w-full" placeholder="Enter the workout title" name="title">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label for="exercise" class="block mb-1">Exercise:</label>
            <div class="flex items-center">
                <select name="" id="exercise" class="w-full p-2 bg-zinc-800 rounded-md" id="">
                    @foreach ($exercises as $exercise)
                        <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                    @endforeach
                </select>
                <button type="button" onclick="addExercise()" class="px-4 py-2 ml-2 bg-blue-500 hover:bg-blue-600 rounded-md">Add</button>
            </div>

            @error('exercises')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
    
            <div class="" id="exercises_view">
    
            </div>

            <input type="hidden" name="exercises" id="exercises_input">
    
            <button type="submit" class="bg-green-500 hover:bg-green-600 p-2 px-6 rounded-md mt-4">Create</button>
        </div>
    </form>
    <script>
        const exercises = [];
        const exercises_strings = [];
        const exercise = document.getElementById("exercise");
        const exercisesInput = document.getElementById("exercises_input");

        function createString() {
            let result = "<ul class='list-disc m-4'>";

            exercises_strings.forEach(item => {
                result += `<li>${item}</li>`;
            })

            result += "</ul>";

            return result;
        }

        function addExercise() {
            const exercise_view = document.getElementById("exercises_view");

            if(!exercise || exercises.includes(exercise.value)) {
                return;
            }

            exercises.push(exercise.value)
            exercises_strings.push(exercise.options[exercise.selectedIndex].text)

            exercise_view.innerHTML = createString()
            
            exercisesInput.value = exercises.join(',');
        }
    </script>
</x-layout>