@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">{{ $project->name }}<br><small>Creado por {{ $project->user->first_name }} {{ $project->user->last_name }}</small></h1>
      </div>
      <div class="col-lg-9">
        <div class="panel panel-default">
          <div class="panel-heading">
            Descripción del proyecto
          </div>
          <div class="panel-body">
            {{ $project->description }}
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            Comentarios
          </div>
          <div class="panel-body">
            @foreach ($project->comments as $comment)
              <blockquote>
                <p>{{ $comment->content }}</p>
                <small><cite>{{ '@'.$comment->user->username }}</cite> el {{ $comment->created_at->toDateString().' a las '.$project->created_at->toTimeString() }}</small>
              </blockquote>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-lg-3">
        <ul class="list-group">
          <li class="list-group-item">
            <b>Fecha de creación</b>
            <br>
            {{ $project->created_at->toDateString() }}
          </li>
          <li class="list-group-item">
            <b>Fecha de finalización</b>
            <br>
            @if ($project->ended_at)
              {{ $project->ended_at }}
            @else
              No especificada
            @endif
          </li>
          <li class="list-group-item">
            <b>Última actualización</b>
            <br>
            {{ $project->updated_at->toDateString().' a las '.$project->updated_at->toTimeString() }}
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9">

      </div>
    </div>
  </div>
@endsection
