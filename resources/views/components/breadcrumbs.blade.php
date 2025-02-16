<nav class="text-gray-500 text-sm my-4">
    {{-- @if (request()->is('dashboard*') || request()->is('dashboard/*'))
        <a href="{{ url('/dashboard') }}" class="text-teal-600 hover:underline">Dashboard</a>
    @else --}}
        <a href="{{ url('/') }}" class="text-teal-600 hover:underline">Home</a>
    {{-- @endif --}}


    @foreach ($breadcrumbs as $index => $breadcrumb)
        /
        @if ($index == count($breadcrumbs) - 1)
            <span class="text-gray-700">{{ $breadcrumb['label'] }}</span>
        @else
            <a href="{{ $breadcrumb['url'] }}" class="text-teal-600 hover:underline">
                {{ $breadcrumb['label'] }}
            </a>
        @endif
    @endforeach
</nav>
