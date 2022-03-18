@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Inactive Users', 'page_description'=>'Handle
inactive users list']) @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row col-12 mb-4">
                <a href="{{ route('admin.users.index') }}">Back to Users List</a>
            </div>
            <div class="row">
                
                @foreach ($users as $user)
                    <div class="col-sm-6">
                        <div class="box box-danger info-box bg-grey">
                            <span class="info-box-icon">
                                @if (file_exists(optional($user->profile)->photo))
                                    <a href="{{ asset($user->profile->photo) }}" target="_user_photo">
                                        <img src="{{ asset($user->profile->photo) }}"
                                            class="profile-user-img img-responsive img-circle img-thumbnail" alt="Image"
                                        >
                                    </a>
                                @else
                                    <img src="{{ asset('images/placeholders/300.png') }}"
                                        class="profile-user-img img-responsive img-circle img-thumbnail" alt="Image"
                                    >
                                @endif
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                        <i class="fa fa-user"></i>
                                        {{ $user->name }} 
                                    </a>
                                    <i 
                                        class="fa fa-circle {{ $user->isOnline() ? 'text-green' : 'text-gray'}}"
                                        title="{{ $user->isOnline() ? 'Online' : 'Away'}}"
                                    ></i>

                                    <form action="{{ route('admin.users.inactive-users.restore',  $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="pull-right btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i> Restore
                                        </button>
                                    </form>
                                </span>

                                {{-- <span class="info-box-number">41,410</span> --}}
                                    @if (count($user->roles) > 0)
                                    <strong>Roles:</strong>
                                    @foreach ($user->roles as $role)
                                        <span class="label label-danger">{{ ucwords($role->name) }}</span>
                                    @endforeach
                                    @endif
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        @endforeach

            </div>
        </div>
    </div>
</div>
@stop