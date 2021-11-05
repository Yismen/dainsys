@extends('layouts.app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<h1>User Profile</h1>
		</div>
		<div class="col-sm-3">
			<div class="box box-primary">
				<div class="box-body box-profile">
					@if (file_exists(optional($profile)->photo))
					<a href="{{ asset(optional($profile)->photo) }}" target="_user_photo">
						<img src="{{ asset(optional($profile)->photo) }}" class="profile-user-img img-responsive img-circle animated rotateIn" alt="Image">
					</a>
					@else
					<img src="http://placehold.it/300x300" class="profile-user-img img-responsive img-circle animated rotateIn" alt="Image">
					@endif

					<h3 class="profile-username text-center">{{ optional(optional($profile)->user)->name }}</h3>
					<p class="text-muted text-center">
						<a href="mailto:{{ optional(optional($profile)->user)->email }}"></a>{{ optional(optional($profile)->user)->email }}
					</p>

					<div class="form-group text-center">

						@if (auth()->user()->id == optional($profile)->user_id)
						<a class="btn btn-warning" href="{{ route('admin.profiles.edit', optional($profile)->id) }}">
							<i class="fa fa-pencil"></i>
							Edit
						</a>
						@else
						<a href="{{ route('admin.profiles.show', optional(auth()->user()->profile)->id ?? 0) }}">
							<i class="fa fa-check"></i>
							Back to Your...
						</a>
						@endif
					</div>
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">About Me</h3>
				</div>
				<div class="box-body">
					<strong> <i class="fa fa-book margin-r-5"></i> Education </strong>
					<p class="text-muted">{!! optional($profile)->education !!}</p>
					<hr>

					<strong>
						<i class="fa fa-book margin-r-5"></i> Skills
					</strong>
					<p class="">
						@if (optional($profile)->skillsObject)
							@foreach ($profile->skillsObject as $skill)
								<span class="label label-success">{{ trim($skill) }}</span>
							@endforeach
						@endif
					</p>
					<hr>

					<strong>
						<i class="fa fa-building margin-r-5"></i> Work Info
					</strong>
					<p class="text-muted">{!! optional($profile)->work !!}</p>
					<hr>

					<strong>
						<i class="fa fa-map-marker margin-r-5"></i> Location
					</strong>
					<p class="text-muted">{!! optional($profile)->location !!}</p>
				</div>
			</div>

		</div>

		<div class="col-sm-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">More About Me</h3>
				</div>
				<div class="box-body">
					<p>{!! optional($profile)->bio !!}</p>
				</div>
			</div>

			@if ($profiles->count() > 0)
			@include('profiles._other-profiles')
			@endif
		</div>
	</div>
</div>

@stop