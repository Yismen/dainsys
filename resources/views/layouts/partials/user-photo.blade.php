{{-- Use variable $class_image_class to pass additional classes --}}

@if ($user->profile && file_exists($user->profile->photo))
	<img src="{{ asset($user->profile->photo) }}" class="img-circle {{ $class_image_class ?? '' }}" alt="User Image">
@else
	<img src="{{  asset('images/placeholders/150.png') }}" class="img-circle {{ $class_image_class ?? '' }}" alt="User Image">
@endif
