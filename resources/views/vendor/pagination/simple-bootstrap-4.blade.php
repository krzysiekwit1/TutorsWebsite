@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li style="margin-right:5px;" class="page-item disabled" aria-disabled="true">
            <span class="page-link">@lang('pagination.previous')</span>
        </li>
        @else
        <li style="margin-right:5px;" class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li style="margin-right:5px;" class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        </li>
        @else
        <li style="margin-right:5px;" class="page-item disabled" aria-disabled="true">
            <span class="page-link">@lang('pagination.next')</span>
        </li>
        @endif
    </ul>
</nav>
@endif