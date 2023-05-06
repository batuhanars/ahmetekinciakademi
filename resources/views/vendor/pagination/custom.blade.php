@if ($paginator->hasPages())
    <div class="pagination -buttons">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> --}}
            <button class="disabled pagination__button -prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <i class="icon icon-chevron-left"></i>
            </button>
        @else
            {{-- <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li> --}}
            <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')" class="pagination__button -prev">
                <i class="icon icon-chevron-left"></i>
            </a>
        @endif
        <div class="pagination__count">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a href="#">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="-count-is-active"
                                aria-current="page"><span>{{ $page }}</span></a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li> --}}
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                class="pagination__button -next">
                <i class="icon icon-chevron-right"></i>
            </a>
        @else
            {{-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li> --}}
            <button class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <i aria-hidden="true" class="icon icon-chevron-right"></i>
            </button>
        @endif
    </div>
@endif
{{-- <button class="pagination__button -prev">
    <i class="icon icon-chevron-left"></i>
</button>

<div class="pagination__count">
    <a href="#">1</a>
    <a class="-count-is-active" href="#">2</a>
    <a href="#">3</a>
    <span>...</span>
    <a href="#">67</a>
</div>

<button class="pagination__button -next">
    <i class="icon icon-chevron-right"></i>
</button> --}}
