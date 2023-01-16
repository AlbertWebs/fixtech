@if ($paginator->hasPages())
    <ul class="pagination-box">
        {{-- Previous Page Link --}} 
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a>Prev</a></li>
        @else
            <li class="page-item"><a class="Previous" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-chevron-left"></i> Previous</a></li>
            <!-- <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a> -->
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><a  href="#"><span>{{ $element }}</span></a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active next"><a  href="#"><span>{{ $page }}</span></a></li>
                    @else
                        <li><a  href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="Next"> Next <i class="fa fa-chevron-right"></i></a></li>
        @else
            <li class="page-item disabled"><a href="#">Next</a></li>
        @endif
    </ul>
@endif
