@if ($paginator->hasPages())
<div class="pagination-wrapper centred">
    <ul class="pagination clearfix">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a href="#"><i class="far fa-angle-left"></i>Prev</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="far fa-angle-left"></i>Prev</a></li>
        @endif
        {{-- Pagination Elements --}}
        <li>
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <!-- <li class="disabled"><span>{{ $element }}</span></li>
                <button class="btn ps-btn"><span>...</span></button> -->
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="current">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>                                
                    @endif
                @endforeach
            @endif
        @endforeach
        </li>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}">Next<i class="far fa-angle-right"></i></a></li>
        @else
            <li><a href="#">Next<i class="far fa-angle-right"></i></a></li>
        @endif
    </ul>
</div>
@endif