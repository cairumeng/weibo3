<li class="">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" class="status-avatar">
    <span class="ml-3">
        {{$user->name}}
        <small class="">{{$status->created_at->diffForHumans()}}</small>
    </span>
    <form method="POST" action="{{ route('statuses.destroy',$status) }}" class="d-inline float-right">
        @csrf
        {!! method_field('DELETE')!!}
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>
    <div class="">
        {{$status->content}}
    </div>
</li>