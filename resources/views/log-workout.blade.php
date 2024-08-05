<x-layout>
    <h1 class="text-xl font-bold">Log exercise: {{ $workout->title }}</h1>
    <form action="/log-workout/{{ $workout->id }}" method="POST">
        @csrf
        @foreach ($workout->exercise()->get() as $exercise)
            <div class="mt-4">
                <label for="volume">{{ $exercise->name }}</label>
                <div id="volume" class="">
                    <input type="number" id="reps_{{ str_replace(' ', '_', strtolower($exercise->name)) }}" class="rounded-lg bg-zinc-800 p-2 w-full mb-2" placeholder="Reps">
                    <input type="number" id="load_{{ str_replace(' ', '_', strtolower($exercise->name)) }}" class="rounded-lg bg-zinc-800 p-2 w-full mb-2" placeholder="Load">
                    <button type="button" onclick="addSet('{{ str_replace(' ', '_', strtolower($exercise->name)) }}')" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 w-full mb-2 rounded-md">Log Set</button>
                </div>

                <div id="sets_{{ str_replace(' ', '_', strtolower($exercise->name)) }}">

                </div>

                <input type="hidden" name="{{$exercise->id}}" id="data_{{ str_replace(' ', '_', strtolower($exercise->name)) }}">
            </div>
        @endforeach

        <div class="mt-2">
            <button type="submit" class="bg-green-500 hover:bg-green-600 p-2 px-6 rounded-md mt-4">Create</button>
        </div>
    </form>

    <script>
        function addSet(exerciseName) {
            const set_view = document.getElementById("sets_" + exerciseName);
            const reps = document.getElementById("reps_" + exerciseName);
            const load = document.getElementById("load_" + exerciseName);
            const data = document.getElementById("data_" + exerciseName);

            if(!reps.value || !load.value) {
                return;
            }

            const set_counter = set_view.querySelectorAll("div").length;

            set_view.innerHTML += `
                <div class='grid grid-cols-3'>
                    <span>${set_counter + 1}º</span>
                    <span>${reps.value}</span>
                    <span>${load.value} kg</span>
                </div>
            `

            data.value += `(${reps.value},${load.value})`

            reps.value = ""
            load.value = ""
        }
    </script>
</x-layout>