@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if (Session::has( $msg))
<div class="alert alert-{{ $msg }}">{{ Session::get( $msg) }}</div>
@endif
@endforeach