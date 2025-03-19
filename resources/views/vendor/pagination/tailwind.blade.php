@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center space-x-2">
        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-2 py-1 text-[10px] lg:text-sm text-gray-400 bg-gray-200 rounded cursor-not-allowed">
                &laquo; Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-2 py-1 text-[10px] lg:text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
                &laquo; Prev
            </a>
        @endif

        {{-- Menampilkan maksimal 5 halaman pertama --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-2 py-1 text-[10px] lg:text-sm text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @php
                    $maxPagesToShow = 5; // Maksimal halaman yang ditampilkan
                    $currentPage = $paginator->currentPage();
                    $totalPages = $paginator->lastPage();
                @endphp

                @foreach ($element as $page => $url)
                    @if ($page <= $maxPagesToShow)
                        @if ($page == $currentPage)
                            <span class="px-2 py-1 text-[10px] lg:text-sm bg-blue-500 text-white rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-2 py-1 text-[10px] lg:text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                {{ $page }}
                            </a>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-2 py-1 text-[10px] lg:text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
                Next &raquo;
            </a>
        @else
            <span class="px-2 py-1 text-[10px] lg:text-sm text-gray-400 bg-gray-200 rounded cursor-not-allowed">
                Next &raquo;
            </span>
        @endif
    </nav>
@endif
{{-- 

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center space-x-2">
        Previous Page Link 
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">
                &laquo; Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                &laquo; Prev
            </a>
        @endif

        {{-- Pagination Links 
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link 
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Next &raquo;
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">
                Next &raquo;
            </span>
        @endif
    </nav>
@endif
 --}}
