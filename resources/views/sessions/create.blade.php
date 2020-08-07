<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('sessions.store') }}">
                @csrf
                <input type="hidden" value="loginModal" name="modal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                        @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <a href=" {{route('password.request')}}">(Passowrd Forget?)</a>
                        <input type="password" class="form-control" name="password" id="password">
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password')}}</div>
                        @endif
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>