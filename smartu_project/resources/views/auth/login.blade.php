@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Iniciar sesión en SmartU</div>
        <div class="panel-body">
          @include('auth.loginform')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
