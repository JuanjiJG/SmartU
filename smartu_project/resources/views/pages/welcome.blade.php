@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-7 col-md-offset-0">
                <h2 class="page-header">Bienvenid@ a SmartU<br><small>¿Qué idea tienes en mente?</small></h2>
                <div class="well text-center">
                    <br>
                    <p class="lead"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i> <b>Sube proyectos</b> y recibe opiniones de los usuarios.</p>
                    <br>
                    <p class="lead"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i> <b>Conecta con la gente</b> a través de tus ideas.</p>
                    <br>
                    <p class="lead"><i class="fa fa-heart fa-lg" aria-hidden="true"></i> <b>Encuentra proyectos</b> acordes a tus intereses.</p>
                </div>
                <ul class="list-inline text-center">
                    <li><p><a class="btn btn-success" href="{{ route('login') }}" role="button">Inicia sesión</a></p></li>
                    <li><p><a class="btn btn-info" href="{{ route('dashboard') }}" role="button">Accede como invitado</a></p></li>
                </ul>
            </div>
            <div class="col-sm-8 col-sm-offset-2 col-md-5 col-md-offset-0">
                <h2 class="page-header">Regístrate ahora<br><small>¡Es gratis!</small></h2>
                @include('auth._registerform')
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0">
                <h2 class="page-header">{{ __("What is SmartU?") }}</h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-8 col-md-4 vcenter">
                <h4 class="text-primary"><i class="fa fa-lightbulb-o fa-4x" aria-hidden="true"></i></h4>
                <h3>{{ __("Shape your big ideas") }}</h3>
                <p class="lead text-justify">{{ __("a") }}</p>
            </div>
            <div class="col-sm-8 col-md-6 vcenter">
                <img src="{{ asset('images/promo_1.png') }}" class=" img-thumbnail">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-8 col-md-push-6 col-md-4 vcenter">
                <h4 class="text-primary"><i class="fa fa-users fa-4x" aria-hidden="true"></i></h4>
                <h3>{{ __("Open to everyone") }}</h3>
                <p class="lead text-justify">{{ __("b") }}</p>
            </div>
            <div class="col-sm-8 col-md-pull-4 col-md-6 vcenter">
                <img src="{{ asset('images/promo_1.png') }}" class=" img-thumbnail">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-8 col-md-4 vcenter">
                <h4 class="text-primary"><i class="fa fa-smile-o fa-4x" aria-hidden="true"></i></h4>
                <h3>{{ __("Designed for the user") }}</h3>
                <p class="lead text-justify">{{ __("c") }}</p>
            </div>
            <div class="col-sm-8 col-md-6 vcenter">
                <img src="{{ asset('images/promo_3.png') }}" class=" img-thumbnail">
            </div>
        </div>
    </div>
@endsection
