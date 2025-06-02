@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navegação de página" class="flex justify-center">
        <ul class="inline-flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-1 rounded text-gray-400 bg-gray-100 cursor-not-allowed flex items-center justify-center">
                        <x-heroicon-o-chevron-left class="w-5 h-5 text-inherit" />
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-1 rounded text-[#4439C5] bg-white hover:bg-[#4439C5] hover:text-white transition flex items-center justify-center">
                        <x-heroicon-o-chevron-left class="w-5 h-5 text-inherit" />
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="px-3 py-1 text-gray-500">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="px-3 py-1 rounded bg-[#4439C5] text-white font-bold">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-3 py-1 rounded text-[#4439C5] bg-white hover:bg-[#362fa3] hover:text-white transition">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1 rounded text-[#4439C5] bg-white hover:bg-[#4439C5] hover:text-white transition flex items-center justify-center">
                        <x-heroicon-o-chevron-right class="w-5 h-5 text-inherit" />
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-1 rounded text-gray-400 bg-gray-100 cursor-not-allowed flex items-center justify-center">
                        <x-heroicon-o-chevron-right class="w-5 h-5 text-inherit" />
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
