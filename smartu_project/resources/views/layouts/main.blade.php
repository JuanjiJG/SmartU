@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                @if (!empty($title))
                    {{ $title }}
                @endif
                @if (Auth::guest())
                    <br>
                    <small>
                        Sesión de invitado
                        <a class="btn btn-success btn-xs" href="{{ route('login') }}" role="button">Inicia sesión</a>
                    </small>
                @endif
            </h3>
        </div>
    </div>
    @yield('content_main')
</div>
@endsection
