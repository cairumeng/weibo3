<div class="user-info">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
    <h5 class="">{{$user->name}}</h5>
    <div class="row mt-5">
        <a class="col-md-4 count" href="{{ route('users.show',Auth::user())}}">
            <h5>Statuses </h5>
            {{$user->statuses()->count()}}
        </a>
        <a class="col-md-4 count" href="{{ route('users.followers',Auth::user())}}">
            <h5>Followers </h5>
            {{$user->followers()->count()}}
        </a>
        <a class=" col-md-4" href="{{ route('users.followings',Auth::user())}}">
            <h5>Followings </h5>
            {{$user->followings()->count()}}
        </a>

        </span>
    </div>