@props(['paginator'])

@if ($paginator->hasPages())
<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="prev-btn disabled"><i class="fa fa-caret-left"></i></span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="prev-btn"><i class="fa fa-caret-left"></i></a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="dots">...</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                <a href="{{ $url }}" class="page-link {{ $page == $paginator->currentPage() ? 'active' : '' }}">{{ $page }}</a>
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="next-btn"><i class="fas fa-caret-right"></i></a>
    @else
        <span class="next-btn disabled"><i class="fas fa-caret-right"></i></span>
    @endif
</div>
@endif
