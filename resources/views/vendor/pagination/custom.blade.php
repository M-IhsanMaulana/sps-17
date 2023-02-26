@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-between container">
        <div class="d-flex justify-center justify-content-between mx-2">
            <ul class="pagination">
                {{-- Prefious Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                @else
                    <li class="page-item prev">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                                class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item next">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                                class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-between mr-2">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>

        {{-- Pagiantion Number and Index --}}
        <div class="justify-content-center">
            <ul class="pagination">
                {{-- Prefious Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                @else
                    <li class="page-item prev">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                                class="tf-icon bx bx-chevrons-left"></i></a>
                    </li>
                @endif

                {{-- Element Of Paginates --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="javascript:void(0);">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item next">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                                class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
