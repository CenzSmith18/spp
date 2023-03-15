@if ($paginator->hasPages())
<br>
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
    <ul class="pagination">
      
                @if ($paginator->onFirstPage())
                <li class="page-item"><a class="page-link" href="#">{!! __('pagination.previous') !!}</a></li>
                    
                @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">{!! __('pagination.previous') !!}</a></li>
                    
                @endif

                @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">{!! __('pagination.next') !!}</a></li>
                   
                @else
                <li class="page-item"><a class="page-link" href="#">{!! __('pagination.next') !!}</a></li>
                @endif
         

           
        </ul>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        {!! __('Showing') !!}
                        @if ($paginator->firstItem())
                            <span class="font-medium">{{ $paginator->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        {!! __('of') !!}
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        {!! __('results') !!}
                    </p>
                </div>

                
            </div>
    </nav>
@endif
