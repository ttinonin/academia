<x-center-layout>
    <div class="flex items-center justify-center ">
        <div class="bg-white p-3 mt-6 rounded-lg min-w-80">
            <h1 class="font-semibold text-2xl">Login</h1>
            <p class="text-sm text-gray-400">Did you bring the preworkout?</p>

            <form action="/login" method="POST">
                @csrf
                <div class="mt-2">
                    <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" value="{{ old('email') }}" id="email" placeholder="daniel@example.com" class="border bg-gray-100 rounded-md p-2 w-full" name="email">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-2">  
                    <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" placeholder="Enter your password" id="password" class="border bg-gray-100 rounded-md p-2 w-full" name="password">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                
                <button class="bg-purple-700 text-white hover:bg-purple-800 w-full font-semibold mt-6 py-2 rounded-md">Sign In</button>
                <div class="flex items-center my-2 ">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="mx-4 text-gray-500">or</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>
                <button class="bg-white border hover:bg-gray-200 text-black w-full py-2 rounded-md">
                    <div class="flex justify-center items-center">
                        <img src="/images/google.png" alt="" class="w-[20px] h-[20px] mr-2">
                        Continue with google
                    </div>
                </button>
            </form>
        </div>
    </div>
</x-center-layout>