@extends('layouts.default')
@section('content')

<h1 class="text-center">{{Auth::user()->name}}'s Followers</h1>
@foreach ($followers as $follower)
<div class="statuses mt-5 offset-md-2 col-md-6">
    <ul class="list-unstyled">
        <li class="followers">
            <img src="{{$follower->avatar}}" alt="{{$follower->name}}" class="">
            <h5 class="d-inline">{{$follower->name}}</h5>
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
        </li>
    </ul>
</div>
@endforeach
{!! $followers->links() !!}

@stop