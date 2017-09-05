@extends('layouts.main')

@section('content_main')
        @if (count($projects) > 0)
            <div class="row">
                <div class="col-md-12 text-right">
                    <ul class="list-inline text-right">
                        <li><p><a class="btn btn-success btn-sm" href="{{ route('projects.create') }}"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Crear proyecto</a></p></li>
                    </ul>
                </div>
            </div>
            <div class="row display-flex">
                @foreach ($projects as $project)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="thumbnail">
                            {{--  <img src="..." alt="...">  --}}
                            <div class="caption">
                                <h3>{{ $project->name }}</h3>
                                <p>Creado {{ $project->created_at->diffForHumans() }}</p>
                                <p>{{ str_limit($project->description, 140) }}</p>
                                <p><a href="{{ route('projects.show', ['id' => $project->id]) }}" class="btn btn-info" role="button"><i class="fa fa-info fa-fw" aria-hidden="true"></i> Info</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    {{ $projects->render() }}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>No hay proyectos disponibles.</h3>
                    <p><a class="btn btn-success" href="{{ route('projects.create') }}">¡Crea uno ahora mismo!</a></p>
                </div>
            </div>
        @endif
@endsection
