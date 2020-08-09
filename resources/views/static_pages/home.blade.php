@extends('layouts.default')
@section ('content')
@if(Auth::check())
<div class="row">
    <form method="POST" action="{{ route('statuses.store') }}" class="  offset-md-2 col-md-5">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control " rows="4" placeholder="post a new blog here..."
                required></textarea>
            <button class=" btn btn-primary float-right mt-3"> Post</button>
        </div>
    </form>
    <div class="col-md-3 home-user-info">
        <a href="{{ route('users.show',Auth::user())}}" class=""><img src="{{Auth::user()->avatar}}"
                alt="{{Auth::user()->name}}" class=""></a>
        <h5 class="">{{Auth::user()->name}}</h5>
    </div>

</div>
<hr>
@endif

@foreach($statuses as $status)
<div class="statuses mt-5 offset-md-2 col-md-8">
    <ul class="list-unstyled">
        @include('statuses.status',['user'=>$status->user,'follower'=>$status->user])
    </ul>
</div>
@endforeach
{!! $statuses->links() !!}
@stop