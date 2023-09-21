@if ($paginator->hasPages())

    <nav aria-label="Page navigation ">
        <ul class="pagination justify-content-center">

            @if ($paginator->onFirstPage())
                {{-- <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="#" aria-label="Previous">
                        <i aria-hidden="true" class="bx bx-chevron-right"></i>
                    </a>
                </li> --}}
            @else
                {{-- <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')" aria-label="Previous">
                        <i aria-hidden="true" class="bx bx-chevron-left"></i>
                    </a>
                </li> --}}
            @endif

        </ul>
    </nav>

    @if ($paginator->hasPages())
        {{-- <div class="pagg"> --}}
        <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i aria-hidden="true" class="bx bx-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')" aria-label="Previous">
                            <i aria-hidden="true" class="bx bx-chevron-right"></i>
                        </a>
                    </li>
                @endif



                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                        {{-- <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li> --}}
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><span
                                        class="page-link">{{ $page }}</span></li>
                                {{-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> --}}
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                                {{-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> --}}
                            @endif
                        @endforeach
                    @endif
                @endforeach




                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                            <i aria-hidden="true" class="bx bx-chevron-left"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="#" aria-label="Next">
                            <i aria-hidden="true" class="bx bx-chevron-left"></i>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        {{-- </div> --}}

    @endif
@endif
