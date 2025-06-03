@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- Mobile View --}}
        <div class="flex justify-between flex-1 sm:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-white bg-pink-500 border border-pink-500 cursor-default rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled"
                    class="inline-flex items-center px-3 py-1 text-xs font-medium text-pink-700 bg-pink-100 border border-pink-300 rounded-md hover:bg-pink-200 focus:outline-none focus:ring focus:ring-pink-500">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled"
                    class="inline-flex items-center px-3 py-1 ml-2 text-xs font-medium text-pink-700 bg-pink-100 border border-pink-300 rounded-md hover:bg-pink-200 focus:outline-none focus:ring focus:ring-pink-500">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <span class="inline-flex items-center px-3 py-1 ml-2 text-xs font-medium text-white bg-pink-500 border border-pink-500 cursor-default rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <div>
                <span class="inline-flex rounded-md shadow-sm">
                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <span class="inline-flex items-center px-2 py-1 text-xs text-white bg-pink-500 border border-pink-500 rounded-l-md cursor-default">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage"
                            class="inline-flex items-center px-2 py-1 text-xs text-pink-700 bg-pink-100 border border-pink-300 rounded-l-md hover:bg-pink-200 focus:outline-none focus:ring focus:ring-pink-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="inline-flex items-center px-2 py-1 text-xs text-pink-700 bg-pink-100 border border-pink-300">
                                {{ $element }}
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-pink-500 border border-pink-500">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="inline-flex items-center px-3 py-1 text-xs text-pink-700 bg-pink-100 border border-pink-300 hover:bg-pink-200 focus:outline-none focus:ring focus:ring-pink-500">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage"
                            class="inline-flex items-center px-2 py-1 text-xs text-pink-700 bg-pink-100 border border-pink-300 rounded-r-md hover:bg-pink-200 focus:outline-none focus:ring focus:ring-pink-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @else
                        <span class="inline-flex items-center px-2 py-1 text-xs text-white bg-pink-500 border border-pink-500 rounded-r-md cursor-default">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
