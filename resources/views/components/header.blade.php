<header class="bg-zinc-700 rounded-lg p-3 flex items-center justify-between">
    <a href="/">GymApp</a>

    @if (auth()->check())
        <ul class="flex flex-row">
            <a href="/workouts"><li class="block m-2 cursor-pointer">Workouts</li></a>
            <a href="/exercises"><li class="block m-2 cursor-pointer">Exercises</li></a>
            
            <form action="/logout" method="post">
                @csrf
                <button type="submit"><li class="block m-2 cursor-pointer text-red-500">Logout</li></button>
            </form>
        </ul>
    @else
    <ul class="flex flex-row items-center">
        <a href="/register">
            <button class="bg-green-500 hover:bg-green-600 px-4 py-1 mr-2 rounded-md">Sign Up</button>
        </a>
        <a href="/login">
            <button class="border border-white px-4 py-1 rounded-md">Sign In</button>
        </a>
    </ul>
    @endif
</header>