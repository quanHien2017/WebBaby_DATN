@if ($paginator->hasPages())
<div class="container">
   <nav class="woocommerce-pagination">
      <ul class="page-numbers nav-pagination links text-center">
        @if ($paginator->onFirstPage())
        {{-- <a class="prev page-numbers">«</a> --}}
        @else
        <li><a class="prev page-number" href="{{ $paginator->previousPageUrl() }}">
          <i class="icon-angle-left"></i></a></li>
        @endif

        @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
            <li><span aria-current='page' class='page-number current'>{{ $element }}</span></li>
          @endif

          {{-- Array Of Links --}}
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
              <li><span aria-current='page' class='page-number current'>{{ $page }}</span></li>
              @else
                <li><a class='page-number' href='{{ $url }}'>{{ $page }}</a></li>
              @endif
            @endforeach
          @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          <li><a class="next page-number" href="{{ $paginator->nextPageUrl() }}"><i class="icon-angle-right"></i></a></li>
        @else
          {{-- <a class="next page-numbers">»</a> --}}
        @endif
      </ul>
   </nav>
</div>
@endif              

