<x-layout>
    @foreach ($logs as $log)
    <div class="rounded-xl border bg-gray-100 p-2 cursor-pointer mt-2">
        <h2 class="font-semibold text-lg">{{ $log->workout_date }}</h2>
    </div>
    @endforeach
</x-layout>