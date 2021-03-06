@if(Auth::check())
@include('users.edit')
@else
@include('users.create')
@include('sessions.create')
@endif

<header class="mb-5">
    <div class="header-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel">
            <a class="navbar-brand strong" href="{{ route('home') }}">WEIBO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="https://laravel.com/">Laravel <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('help')}}">Help <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('about')}}">About <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                @if(Auth::check())
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown">
                        <img class="nav-avatar" src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('users.show',Auth::user())}}">User center</a>
                        <a class="dropdown-item" href="{{route('users.edit',Auth::user())}}" data-toggle="modal"
                            data-target="#editModal">Info edit</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('sessions.destroy',Auth::user()) }}">
                            @csrf
                            {!! method_field('DELETE')!!}
                            <button class="dropdown-item" href="">Logout</button>
                        </form>
                    </div>
                </div>
                @else
                <div class="nav-item active">
                    <a class="nav-link" data-toggle="modal" href="#" data-target="#loginModal">Login
                        <span class="sr-only">(current)</span></a>
                </div>
                <div class="nav-item active">
                    <a class="nav-link" data-toggle="modal" href="#" data-target="#registerModal">Register <span
                            class="sr-only">(current)</span></a>
                </div>
                @endif
            </div>
        </nav>
    </div>
</header>

@section('js')
@if (count($errors) > 0)
<script>
    $(document).ready(function () {
        var modalName = "{{old('modal')}}" || "{{$errors->first('modal')}}"
        $("#" + modalName).modal('show');
    });
</script>
@endif
@stop