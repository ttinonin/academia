<x-layout>
    <h1 class="font-semibold text-2xl">Edit your Profile</h1>

    <form action="/profile/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <label for="username" class="block text-sm font-semibold mb-1">Username:</label>
            <input type="text" id="username" value="{{ old('username', $user->username) }}" class="border bg-gray-100 rounded-md p-2 w-full" placeholder="Chest and Back" name="username">
            @error('username')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="email" class="block text-sm font-semibold mb-1">Email:</label>
            <input type="text" id="email" value="{{ old('email', $user->email) }}" class="border bg-gray-100 rounded-md p-2 w-full" placeholder="Chest and Back" name="email">
            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="height" class="block text-sm font-semibold mb-1">Height (cm):</label>
            <input type="text" id="height" value="{{ old('height', $user->userInfo->height) }}" class="border bg-gray-100 rounded-md p-2 w-full" placeholder="Chest and Back" name="height">
            @error('height')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="weight" class="block text-sm font-semibold mb-1">Weight (kg):</label>
            <input type="text" id="weight" value="{{ old('weight', $user->userInfo->weight) }}" class="border bg-gray-100 rounded-md p-2 w-full" placeholder="Chest and Back" name="weight">
            @error('weight')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-purple-700 w-full hover:bg-purple-800 font-semibold text-white py-2 rounded-md mt-4">Save</button>
    </form>
</x-layout>