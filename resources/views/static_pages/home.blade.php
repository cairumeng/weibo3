@extends('layouts.default')
@section ('content')
<div class="row">
    <form method="POST" action="{{ route('statuses.store') }}" class="col-md-6">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control " rows="5" placeholder="post a new blog here..."></textarea>
            <button class=" btn btn-lg btn-success float-right mt-3"> Post</button>
        </div>
    </form>
    <div class="col-md-6">
        @include('shared._user_info',['user'=>Auth::user()])
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