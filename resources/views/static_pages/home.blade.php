@extends('layouts.default')
@section ('content')
<div class="row">
    <form method="POST" action="{{ route('statuses.store') }}" class="  offset-md-2 col-md-5">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control " rows="4" placeholder="post a new blog here..."></textarea>
            <button class=" btn btn-info float-right mt-3"> Post</button>
        </div>
    </form>
    <div class="col-md-3 home-user-info">
        <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="">
        <h5 class="">{{Auth::user()->name}}</h5>
    </div>
</div>
<hr>

@foreach($statuses as $status)
<div class="statuses mt-5 offset-md-2 col-md-8">
    <ul class="list-unstyled">
        @include('statuses.status',['user'=>$status->user])
    </ul>
</div>
@endforeach
{!! $statuses->links() !!}
@stop