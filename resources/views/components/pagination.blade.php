<div class="d-flex justify-content-between align-items-center">
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

        @if ($paginator->hasPages())
        @php
        $pageName = $paginator->getPageName();
        $current = $paginator->currentPage();
        $lengthAware = method_exists($paginator, 'lastPage');

        if ($lengthAware) {
        $last = $paginator->lastPage();
        $start = max(1, $current - 2);
        $end = min($last, $current + 2);
        }
        @endphp

        <nav aria-label="Page navigation example">
                <ul class="pagination pagination-custom">

                        {{-- Previous --}}
                        @if ($paginator->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                        <li class="page-item">
                                <button class="page-link" wire:click="previousPage('{{ $pageName }}')"
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}">
                                        &laquo;
                                </button>
                        </li>
                        @endif

                        {{-- Numbered pages --}}
                        @if ($lengthAware)
                        @for ($page = $start; $page <= $end; $page++) @if ($page==$current) <li
                                class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item">
                                        <button class="page-link" wire:click="gotoPage({{ $page }}, '{{ $pageName }}')"
                                                x-on:click="{{ $scrollIntoViewJsSnippet }}">
                                                {{ $page }}
                                        </button>
                                </li>
                                @endif
                                @endfor
                                @endif

                                {{-- Next --}}
                                @if ($paginator->hasMorePages())
                                <li class="page-item">
                                        <button class="page-link" wire:click="nextPage('{{ $pageName }}')"
                                                x-on:click="{{ $scrollIntoViewJsSnippet }}">
                                                &raquo;
                                        </button>
                                </li>
                                @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif

                </ul>
        </nav>
        @endif
</div>