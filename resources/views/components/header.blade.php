<header class="bg-zinc-700 rounded-lg p-3 flex items-center justify-between">
    GymApp

    @if (auth()->check())
        <ul class="flex flex-row">
            <a href=""><li class="block m-2 cursor-pointer">Workouts</li></a>
            <a href="/exercises"><li class="block m-2 cursor-pointer">Exercises</li></a>
            
            <form action="/logout" method="post">
                @csrf
                <button type="submit"><li class="block m-2 cursor-pointer text-red-500">Logout</li></button>
            </form>
        </ul>
    @endif
</header>