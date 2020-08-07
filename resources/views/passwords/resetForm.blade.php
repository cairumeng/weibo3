@extends('layouts.default')
@section('content')

<div class="card password-reset">
    <h5 class="card-header">Password Reset</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('password.update')}}">
            @csrf
            <input type="hidden" name="email" value="{{request('email')}}">
            <input type="hidden" name="token" value="{{request('token')}}">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                @if($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password')}}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation </label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop