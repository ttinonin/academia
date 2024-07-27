<x-layout>
    home

    @if (auth()->check())
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        
    @endif
</x-layout>