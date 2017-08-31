@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="page-header">Bienvenid@ a SmartU<br><small>¿Qué idea tienes en mente?</small></h1>
        <div class="well text-center">
          <br>
          <p class="lead"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i> <b>Sube proyectos</b> y recibe opiniones de otros usuarios.</p>
          <br>
          <p class="lead"><i class="fa fa-share-alt fa-lg" aria-hidden="true"></i> <b>Conecta con la gente</b> a través de tus ideas.</p>
          <br>
          <p class="lead"><i class="fa fa-heart fa-lg" aria-hidden="true"></i> <b>Encuentra proyectos</b> acordes a tus intereses.</p>
        </div>
        <ul class="list-inline text-center">
          <li><p><a class="btn btn-success" href="{{ route('login') }}" role="button">Iniciar sesión</a></p></li>
          <li><p><a class="btn btn-info" href="{{ route('dashboard') }}" role="button">Acceder como invitado</a></p></li>
        </ul>
      </div>
      <div class="col-md-5">
        <h1 class="page-header">Regístrate ahora<br><small>¡Es gratis!</small></h1>
        @include('auth.registerform')
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="page-header">¿Qué es SmartU?</h1>
      </div>
      <div class="col-md-4">
        <h4 class="text-primary"><i class="fa fa-lightbulb-o fa-4x" aria-hidden="true"></i></h4>
        <h2>Dale forma a tus ideas</h2>
        <p class="lead">SmartU es una red de discusión y colaboración en equipo. ¿Tienes una idea para un proyecto y necesitas gente de otras disciplinas? Súbela y encuentra a las personas que necesitas. Todos pueden colaborar, ya sea apuntándose al equipo, aportando ideas y comentarios, e incluso dando un "¡Buena idea!" al proyecto.</p>
      </div>
      <div class="col-md-4">
        <h4 class="text-primary"><i class="fa fa-users fa-4x" aria-hidden="true"></i></h4>
        <h2>Abierto a todo el mundo</h2>
        <p class="lead">La filosofía de SmartU reside en acercar más a las personas para dar vida a grandes y mejores cosas. En esta comunidad hay sitio para todos, ya seas estudiante, un ciudadano de a pie o un empresario interesado en potenciar una idea creativa. ¡Echa un vistazo a las ideas que se están forjando aquí y sé parte de ellas!</p>
      </div>
      <div class="col-md-4">
        <h4 class="text-primary"><i class="fa fa-smile-o fa-4x" aria-hidden="true"></i></h4>
        <h2>Pensado para el usuario</h2>
        <p class="lead">Mediante el uso de elementos y principios de diseño centrado en el usuario, ofrecemos una interfaz más intuitiva y clara que le aporta más información durante su uso. Con un sistema totalmente adaptable a cualquier tipo de pantalla, logramos una experiencia unificada para todos los dispositivos.</p>
      </div>
    </div>
  </div>
@endsection
