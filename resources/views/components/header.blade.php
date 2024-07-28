<header class="bg-zinc-700 rounded-lg p-3 flex items-center justify-between">
    GymApp

    @if (auth()->check())
        <ul class="flex flex-row">
            <li class="block m-2 cursor-pointer">Workouts</li>
            <li class="block m-2 cursor-pointer text-red-500">Logout</li>
        </ul>
    @endif
</header>