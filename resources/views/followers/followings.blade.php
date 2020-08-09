@extends('layouts.default')
@section('content')

<h1 class="text-center">{{Auth::user()->name}}'s followings</h1>
@foreach ($followings as $following)
<div class="statuses mt-5 offset-md-2 col-md-8">
    <ul class="list-unstyled">
        <li class="followers">
            <img src="{{$following->avatar}}" alt="{{$following->name}}" class="">
            <h5 class="d-inline">{{$following->name}}</h5>
            @can('follow',$following)
            @if(Auth::user()->isFollowing($following))
            <form method="POST" action="{{route('followers.destroy',$following)}}" class="d-inline float-right">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-secondary">Unfollow</button>
            </form>
            @else
            <form method="POST" action="{{route('followers.store',$following)}}" class="d-inline float-right">
                @csrf
                <button class="btn btn-success">Follow</button>
            </form>
            @endif
            @endcan
        </li>
    </ul>
</div>
@endforeach
{!! $followings->links() !!}

@stop