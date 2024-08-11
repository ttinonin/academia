<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gym</title>
</head>
<body class="flex flex-col min-h-screen">
  <x-header/>
  <hr>
  <div class="p-3 pt-2">
        @if(session()->has('success'))
        <div class="flex items-center p-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 " role="alert">
            <div>
              {{ session('success') }}
            </div>
          </div>
        @endif
      
        @if(session()->has('error'))
        <div class="flex items-center p-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 " role="alert">
            <div>
              {{ session('error') }}
            </div>
          </div>
        @endif
        {{ $slot }}
      </div>

      @auth
      <div class="h-16"></div>
      <div class="fixed bottom-16 left-0 right-0 h-[1px] bg-[#ddd]"></div>
    
      <footer class="p-3 h-16 bg-white fixed bottom-0 w-full rounded-xl flex justify-around items-center">
        
        <a href="/workouts" class="flex flex-col items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="@if(Request::is('workouts')) #7e22ce @else #000000 @endif"><path d="m826-585-46.67-46.67 40-40.33L672-819.33l-40.33 40L584-827l30-31q23-23 57-22.5t57 23.5l129 129q23 23 23 56.5T857-615l-31 30ZM346-104q-23 23-56.5 23T233-104L94.67-242.33q-19-19.26-19-47.3 0-28.04 19-47.04L134-376l47.67 47-40.34 40L289-141.33l40-40.34L376-134l-30 30Zm397-317.33L818.67-497 497-818.67 421.33-743 743-421.33Zm-280 280L539.33-218 218-539.33 141.33-463 463-141.33Zm4-243.34 109.33-109-82.66-82.66-109 109.33L467-384.67Zm43 290q-18.96 19-46.98 19-28.02 0-47.02-19L94.67-416q-19-18.96-19-46.98 0-28.02 19-47.02l75.66-76.33q19.26-19 47.3-19 28.04 0 47.04 19L337-514l110-110-72.33-72q-19-18.96-19-46.98 0-28.02 19-47.02l75.66-76.33q19.26-19 47.3-19 28.04 0 47.04 19l321.66 321.66q19 19.26 19 47.3 0 28.04-19 47.04L790-374.67q-18.96 19-46.98 19-28.02 0-47.02-19L624-447 514-337l72.33 72.33q19 19.26 19 47.3 0 28.04-19 47.04L510-94.67Z"/></svg>
            <span class="text-sm @if(Request::is('workouts')) text-purple-700 @else text-black @endif">Workouts</span>
        </a>
        <a href="#" class="flex flex-col items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="@if(Request::is('community')) #7e22ce @else #000000 @endif"><path d="M38.67-160v-100q0-34.67 17.83-63.17T105.33-366q69.34-31.67 129.67-46.17 60.33-14.5 123.67-14.5 63.33 0 123.33 14.5T611.33-366q31 14.33 49.17 42.83T678.67-260v100h-640Zm706.66 0v-102.67q0-56.66-29.5-97.16t-79.16-66.84q63 7.34 118.66 22.5 55.67 15.17 94 35.5 34 19.34 53 46.17 19 26.83 19 59.83V-160h-176ZM358.67-480.67q-66 0-109.67-43.66Q205.33-568 205.33-634T249-743.67q43.67-43.66 109.67-43.66t109.66 43.66Q512-700 512-634t-43.67 109.67q-43.66 43.66-109.66 43.66ZM732-634q0 66-43.67 109.67-43.66 43.66-109.66 43.66-11 0-25.67-1.83-14.67-1.83-25.67-5.5 25-27.33 38.17-64.67Q578.67-590 578.67-634t-13.17-80q-13.17-36-38.17-66 12-3.67 25.67-5.5 13.67-1.83 25.67-1.83 66 0 109.66 43.66Q732-700 732-634ZM105.33-226.67H612V-260q0-14.33-8.17-27.33-8.16-13-20.5-18.67-66-30.33-117-42.17-51-11.83-107.66-11.83-56.67 0-108 11.83-51.34 11.84-117.34 42.17-12.33 5.67-20.16 18.67-7.84 13-7.84 27.33v33.33Zm253.34-320.66q37 0 61.83-24.84Q445.33-597 445.33-634t-24.83-61.83q-24.83-24.84-61.83-24.84t-61.84 24.84Q272-671 272-634t24.83 61.83q24.84 24.84 61.84 24.84Zm0 320.66Zm0-407.33Z"/></svg>
            <span class="text-sm @if(Request::is('community')) text-purple-700 @else text-black @endif">Community</span>
        </a>
        <a href="#" class="flex flex-col items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="@if(Request::is('charts')) #7e22ce @else #000000 @endif"><path d="M146.67-186.67h178v-346.66h-178v346.66Zm244.66 0h177.34v-586.66H391.33v586.66Zm244 0h178v-266.66h-178v266.66ZM80-120v-480h244.67v-240h310.66v320H880v400H80Z"/></svg>
            <span class="text-sm @if(Request::is('charts')) text-purple-700 @else text-black @endif">Charts</span>
        </a>
        <a href="#" class="flex flex-col items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="@if(Request::is('profile')) #7e22ce @else #000000 @endif"><path d="M226-262q59-42.33 121.33-65.5 62.34-23.17 132.67-23.17 70.33 0 133 23.17T734.67-262q41-49.67 59.83-103.67T813.33-480q0-141-96.16-237.17Q621-813.33 480-813.33t-237.17 96.16Q146.67-621 146.67-480q0 60.33 19.16 114.33Q185-311.67 226-262Zm253.88-184.67q-58.21 0-98.05-39.95Q342-526.58 342-584.79t39.96-98.04q39.95-39.84 98.16-39.84 58.21 0 98.05 39.96Q618-642.75 618-584.54t-39.96 98.04q-39.95 39.83-98.16 39.83ZM480.31-80q-82.64 0-155.64-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.51T80-480.18q0-82.82 31.5-155.49 31.5-72.66 85.83-127Q251.67-817 324.51-848.5T480.18-880q82.82 0 155.49 31.5 72.66 31.5 127 85.83Q817-708.33 848.5-635.65 880-562.96 880-480.31q0 82.64-31.5 155.64-31.5 73-85.83 127.34Q708.33-143 635.65-111.5 562.96-80 480.31-80Zm-.31-66.67q54.33 0 105-15.83t97.67-52.17q-47-33.66-98-51.5Q533.67-284 480-284t-104.67 17.83q-51 17.84-98 51.5 47 36.34 97.67 52.17 50.67 15.83 105 15.83Zm0-366.66q31.33 0 51.33-20t20-51.34q0-31.33-20-51.33T480-656q-31.33 0-51.33 20t-20 51.33q0 31.34 20 51.34 20 20 51.33 20Zm0-71.34Zm0 369.34Z"/></svg>
            <span class="text-sm @if(Request::is('profile')) text-purple-700 @else text-black @endif">Profile</span>
        </a>
      </footer>
      @endauth
</body>
</html>