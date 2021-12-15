<div class="row">
    <div class="col-sm-12">
        <div class="card card-danger">
            <div class="card-header with-border">
                <h4 class="no-margin">Latest Members</h4>
            </div>

            <div class="card-body" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                @foreach ($profiles as $profile)
                <div class="col-sm-4">
                    <img src="{{ file_exists($profile->photo) ? asset($profile->photo) :  'http://placehold.it/300x300'}}" class="profile-user-img img-fluid rounded-circle" alt="Image">

                    <h5 class="profile-username text-center">
                        <a href="{{ route('admin.profiles.show', $profile->id) }}" title="Visit {{ optional($profile->user)->name }} Profile">
                            {{ mb_strimwidth(optional($profile->user)->name, 0, 15, '...') }}
                        </a>
                    </h5>

                    <p class="text-center form-text" style="font-size: 10px;">{{ strtoupper(optional($profile->created_at)->diffForHumans()) }}</p>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>