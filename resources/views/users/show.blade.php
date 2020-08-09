@extends('layouts.default')
@section('content')
@include('shared._user_info',$user)

@foreach ($statuses as $status)
<div class="statuses mt-5 offset-md-2 col-md-8">
    <ul class="list-unstyled">
        @include('statuses.status', ['follower' => $status->user])
    </ul>
</div>
@endforeach
{!! $statuses->links() !!}

@stop