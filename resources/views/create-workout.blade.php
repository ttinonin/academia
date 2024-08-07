<x-layout>
    <h1 class="font-semibold text-2xl">Create Workout</h1>
    <p class="text-sm text-gray-400">Time for massive gains!</p>
    <form action="/workout" method="POST">
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
                <button type="button" onclick="addExercise()" class="px-4 py-2 ml-2 border rounded-md w-[30%]">Add +</button>
            </div>

            @error('exercises')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
    
            <div class="" id="exercises_view">
    
            </div>

            <input type="hidden" name="exercises" id="exercises_input">
    
            <button type="submit" class="bg-purple-700 text-white font-semibold hover:bg-purple-800 py-2 w-full rounded-md mt-2">Create</button>
        </div>
    </form>
    <script>
        const exercises = [];
        const exercises_strings = [];
        const exercise = document.getElementById("exercise");
        const exercisesInput = document.getElementById("exercises_input");
        const exercise_view = document.getElementById("exercises_view");

        function createString() {
            let result = "<ul class='my-2 bg-gray-100 rounded-md'>";

            exercises_strings.forEach((item, index) => {
                result += `
                    <li class='border p-3'>
                        <div class='flex items-center justify-between'>
                            <p>${item}</p>
                            <button type='button' onclick='removeExercise(${index})'><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                        </div>
                    </li>
                `;
            })

            result += "</ul>";

            return result;
        }

        function removeExercise(index) {
            exercises.splice(index, 1);
            exercises_strings.splice(index, 1)

            exercise_view.innerHTML = createString()

            exercisesInput.value = exercises.join(',');
        }

        function addExercise() {
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