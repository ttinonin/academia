<x-layout>
    <div class="flex items-center justify-center ">
        <div class="bg-zinc-600 p-3 mt-6 rounded-lg min-w-80">
            <h1 class="font-bold text-2xl text-center">Login</h1>

            <form action="/login" method="POST">
                @csrf
                <div class="mt-2">
                    <label for="email" class="block mb-1">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" class="bg-zinc-700 rounded-md p-2 w-full" name="email">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="password" class="block mb-1">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" class="text-md bg-zinc-700 rounded-md p-2 w-full" name="password">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <button class="bg-green-500 hover:bg-green-600 w-full font-bold mt-6 py-2 rounded-md">Submit</button>
                <button class="bg-white hover:bg-gray-200 text-black w-full py-2 mt-2 font-bold rounded-md">Login with google</button>
            </form>
        </div>
    </div>
</x-layout>