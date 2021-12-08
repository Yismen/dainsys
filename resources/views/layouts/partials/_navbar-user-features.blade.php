
  {{-- @include('layouts.partials._messages') --}}
  {{-- @include('layouts.partials._tasks') --}}
  {{-- @include('layouts.partials._notifications') --}}
  @include('layouts.partials._dashboards')
  <app-notifications :notifications="{{ $user->unreadNotifications }}" :user_id="{{ $user->id }}"></app-notifications>


