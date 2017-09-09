@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h3 class="page-header">{{ __("About SmartU") }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <img src="{{ asset('images/promo/logo.png') }}" class="img-responsive">
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <p class="lead text-justify">{{ __("SmartU is born of the multidisciplinary project made in the") }} <strong><a target="_blank" href="http://www.ugr.es/">{{ __("University of Granada") }}</a></strong>, {{ __("as part of the") }} <strong><a target="_blank" href="https://ec.europa.eu/programmes/horizon2020/">H2020</a></strong> {{ __("program to connect the universities to the smart cities") }}.</p>
            <p class="lead text-justify">{{ __("This web application was developed by") }} <strong><a target="_blank" href="https://github.com/xXJuAnJi05Xx">Juanjo Jiménez</a></strong>, {{ __("and the source code has been released under the") }} <strong><a target="_blank" href="https://opensource.org/licenses/MIT">MIT</a></strong>{{ __(" license.") }}</p>
            <h4 class="page-header">{{ __("Links of interest") }}</h3>
            <ul class="list-group">
                <li class="list-group-item"><a class="btn btn-link" target="_blank" href="">{{ __("Project website") }}</a></li>
                <li class="list-group-item"><a class="btn btn-link" target="_blank" href="https://twitter.com/SmartUgr">{{ __("Project Twitter profile") }}</a></li>
                <li class="list-group-item"><a class="btn btn-link" target="_blank" href="https://github.com/xXJuAnJi05Xx/SmartU/blob/master/smartu_documentation/Jimenez_Garcia_Juan_Jose.pdf">{{ __("Project documentation") }}</a></li>
                <li class="list-group-item"><a class="btn btn-link" target="_blank" href="https://github.com/xXJuAnJi05Xx/SmartU">{{ __("Project repository on GitHub") }}</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
