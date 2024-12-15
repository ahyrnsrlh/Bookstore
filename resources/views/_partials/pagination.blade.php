@if ($paginator->hasPages())
	<ul class="paginate mb-4">
		@if (!$paginator->onFirstPage())
			<li><a href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
		@endif

		@foreach ($elements as $element)
			
			@if (is_string($element))
				<li><span class="active">{{ $element }}</span></li>

			@elseif (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page === $paginator->currentPage())
						<li><span class="active">{{ $page }}</span></li>
					@else
						<li><a href="{{ $url }}">{{ $page }}</a></li>
					@endif
				@endforeach

			@endif
		
		@endforeach

		@if ($paginator->hasMorePages())
			<li><a href="{{ $paginator->nextPageUrl() }}">Next</a></li>
		@endif

	</ul>
@endif