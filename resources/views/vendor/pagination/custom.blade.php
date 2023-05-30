@if ($paginator->hasPages())

    <div class="dataTables_paginate paging_simple_numbers" id="key-datatable_paginate">
        <ul class="pagination pagination-rounded">

            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#"
                    aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0"
                    class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                </li>
            @else
                <li class="paginate_button page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i
                        class="mdi mdi-chevron-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active" aria-current="page"><a href="{{ $url }}"
                                aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0"
                                class="page-link">{{ $page }}</a></li>
                        @else
                            <li style="margin: 8px"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i
                        class="mdi mdi-chevron-right"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a
                    href="#" aria-controls="datatable-buttons" data-dt-idx="7"
                    tabindex="0" class="page-link"><i
                        class="mdi mdi-chevron-right"></i></a>
                </li>
            @endif
        </ul>
    </div>

@endif





