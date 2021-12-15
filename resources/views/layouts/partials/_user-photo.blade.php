<img 
	@if (file_exists(optional($user->profile)->photo))
		src="{{ asset(optional($user->profile)->photo) }}" 
	@else
		src="https://via.placeholder.com/125" 
	@endif
	class="rounded-circle elevation-2" 
	alt="User Image">
</div>