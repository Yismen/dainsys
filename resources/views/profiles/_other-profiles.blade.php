
<div class="row">
    <div class="col-sm-12">
        <h3>Other Users Profiles </h3>
    </div>
    @foreach ($profiles as $other)
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="card card-warning" style="height: 180px; overflow-y: auto;">
                <div class="card-body card-profile">
                    <img
                        src="{{ file_exists($other->photo) ? asset($other->photo) :  'http://placehold.it/300x300'}}"
                        class="profile-user-img img-fluid rounded-circle" alt="Image"
                    >

                    <h3 class="profile-username text-center">
                        <a href="{{ route('admin.profiles.show', $other->id) }}" title="Visit {{ $other->user->name }} Profile">
                            {{ $other->user->name }}
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-sm-12">
        {{ $profiles }}
    </div>
</div>
