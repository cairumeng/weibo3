<li class="">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="status-avatar">
    <span class="ml-3">
        {{$user->name}}
        <small class="">{{$status->created_at->diffForHumans()}}</small>
    </span>
    @can('destroy',$status)
    <form method="POST" action="{{ route('statuses.destroy',$status) }}" class="d-inline float-right">
        @csrf
        {!! method_field('DELETE')!!}
        <button class="btn btn-danger">Delete</button>
    </form>
    @endcan
    @can('follow',$follower)
    @if(Auth::user()->isFollowing($follower))
    <form method="POST" action="{{route('followers.destroy',$follower)}}" class="d-inline float-right">
        @csrf
        {{method_field('DELETE')}}
        <button class="btn btn-secondary">Unfollow</button>
    </form>
    @else
    <form method="POST" action="{{route('followers.store',$follower)}}" class="d-inline float-right">
        @csrf
        <button class="btn btn-success">Follow</button>
    </form>
    @endif
    @endcan

    <div class="">
        {{$status->content}}
    </div>
</li>