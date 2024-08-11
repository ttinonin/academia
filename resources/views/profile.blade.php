<x-layout>
    <img src="/images/default-pfp.jpg" alt="" class="display-table mx-auto shadow-md rounded-full w-[30%]">
    <div class="rounded-xl border bg-gray-100 p-3 cursor-pointer mt-2">
        <div class="flex justify-center items-center flex-col">
            <h2 class="font-semibold text-xl mb-2">{{ $user->username }}</h2>
            
            <p class="text-md text-gray-400">Last workout: 10/07/2024</p>
            <p class="text-md text-gray-400">Followers: 12</p>
            <p class="text-md text-gray-400 mb-2">Following: 23</p>
            
            @if (auth()->id() != $user->id)
                <button class="bg-purple-700 w-full hover:bg-purple-800 font-semibold text-white py-2 rounded-md">+ Follow</button>
            @endif
        </div>
    </div>

    @if (auth()->id() === $user->id)
    <div class="rounded-xl border bg-gray-100 p-3 cursor-pointer mt-2">
        <div class="">
            <h2 class="font-semibold">Personal Information</h2>
            <p class="text-sm text-gray-400 mb-2">Only you can see these informations</p>
            
            <p class="text-md text-gray-400">Height: {{ intval($user->userInfo->height) }} cm</p>
            <p class="text-md text-gray-400 mb-2">Weight: {{ $user->userInfo->weight }} kg</p>
            
            <button class="bg-purple-700 w-full hover:bg-purple-800 font-semibold text-white py-2 rounded-md">Edit</button>
        </div>
    </div>
    @endif
</x-layout>