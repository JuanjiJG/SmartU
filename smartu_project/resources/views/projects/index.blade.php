@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">Lista de proyectos</h1>
        @if (count($projects) > 0)
          @foreach ($projects as $project)
            <div class="well well-lg">
              <h2>{{ $project->name }}</h2>
              <p>{{ $project->description }}</p>
              <a class="btn btn-primary btn-large" href="{{ route('projects.show', $project->id) }}">Detalles del proyecto</a>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection
