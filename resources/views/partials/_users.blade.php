
@foreach ($users as $user)
<div class="col-sm-6">
    <div class="card card-primary card-outline info-box bg-grey">
        <span class="info-box-icon">
            @if (file_exists(optional($user->profile)->photo))
                <a href="{{ asset($user->profile->photo) }}" target="_user_photo">
                    <img src="{{ asset($user->profile->photo) }}"
                        class="profile-user-img img-fluid rounded-circle img-thumbnail" alt="Image"
                    >
                </a>
            @else
                <img src="http://placehold.it/300x300"
                    class="profile-user-img img-fluid rounded-circle img-thumbnail" alt="Image"
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
                <a href="{{ route('admin.users.edit', $user->id) }}" class="float-right">
                    <i class="fa fa-pencil"></i>
                </a>
            </span>

            {{-- <span class="info-box-number">41,410</span> --}}
                @if (count($user->roles) > 0)
                <strong>Roles:</strong>
                @foreach ($user->roles as $role)
                    <span class="label label-primary">{{ ucwords($role->name) }}</span>
                @endforeach
                @endif
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    @endforeach