@extends('layouts.default')
@section('content')

<div class="card password-reset">
    <h5 class="card-header">Password Reset</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('password.email')}}">
            @csrf
            <div class="form-group ">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop