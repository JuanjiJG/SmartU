@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p><a class="btn btn-default" href="{{ URL::previous() }}"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Volver</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse en SmartU</div>
                <div class="panel-body">
                    @include('auth._registerform')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
