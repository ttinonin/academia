<x-layout>
    <h1 class="font-bold text-2xl">Create Exercise</h1>

    <form action="/exercise" method="POST">
        @csrf
        <div class="mt-2">
            <label for="name" class="block mb-1">Exercise name:</label>
            <input type="text" name="name" class="text-md bg-zinc-800 rounded-md p-2 w-full" id="name" placeholder="Enter the exercise name">
            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mt-2">
            <label for="muslce" class="block mb-1">Target muscles:</label>
            <div class="flex items-center">
                <select name="" id="muscle" class="w-full p-2 bg-zinc-800 rounded-md" id="">
                    @foreach ($muscles as $muscle)
                        <option value="{{ $muscle->id }}">{{ $muscle->name }}</option>
                    @endforeach
                </select>
                <button type="button" onclick="addMuscle()" class="px-4 py-2 ml-2 bg-blue-500 hover:bg-blue-600 rounded-md">Add</button>
            </div>

            @error('muscles')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
    
            <div class="" id="muscles_view">
    
            </div>

            <input type="hidden" name="muscles" id="muscles_input">
    
            <button type="submit" class="bg-green-500 hover:bg-green-600 p-2 px-6 rounded-md mt-4">Create</button>
        </div>
    </form>

    <script>
        const muscles = [];
        const muscle = document.getElementById("muscle");
        const musclesInput = document.getElementById("muscles_input");

        function createString() {
            let result = "<ul class='list-disc m-4'>";

            muscles.forEach(item => {
                result += `<li>${muscle.options[item - 1].text}</li>`;
            })

            result += "</ul>";

            return result;
        }

        function addMuscle() {
            const muscle_view = document.getElementById("muscles_view");

            if(!muscle || muscles.includes(muscle.value)) {
                return;
            }

            muscles.push(muscle.value)

            muscle_view.innerHTML = createString()
            
            musclesInput.value = muscles.join(',');
        }
    </script>
</x-layout>