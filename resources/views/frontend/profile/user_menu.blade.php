<ul class="list-group list-group-flush text-center">
    <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Update Profile</a>
    <a href="{{ route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
    <a href=" {{ route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
</ul>