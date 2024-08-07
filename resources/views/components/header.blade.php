<header class="bg-white p-3 flex justify-between items-center ">
    <a href="/"><h1 class="font-bold">GymApp</h1></a>
    

    @if (auth()->check())
        <form action="/logout" method="POST">
            @csrf
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></button>
        </form>
    @else
    <ul class="flex flex-row items-center">
        <a href="/register">
            <button class="bg-purple-700 text-white hover:bg-purple-800 px-4 py-1 mr-2 rounded-md">Sign Up</button>
        </a>
        <a href="/login">
            <button class="border border-white px-4 py-1 rounded-md">Sign In</button>
        </a>
    </ul>
    @endif
</header>