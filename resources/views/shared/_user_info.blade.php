<div class="user-info">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="">
    <h5 class="">{{$user->name}}</h5>
    <div class="row mt-5">
        <div class="col-md-4 count">
            <h5>Statuses </h5>
            {{$user->statuses()->count()}}
        </div>
        <div class="col-md-4 count">
            <h5>Followers </h5>
            {{$user->followers()->count()}}
        </div>
        <div class="col-md-4">
            <h5>Followings </h5>
            {{$user->followings()->count()}}
        </div>

        </span>
    </div>