@extends('layouts.main')

@section('content_main')
    <div class="row">
        <div class="col-xs-2">
            <ul class="list-inline">
                <li><p><a class="btn btn-default btn-sm" href="{{ route('projects.index') }}"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Volver</a></p></li>
            </ul>
        </div>
        @if (Auth::user())
            @if($project->user_id == Auth::user()->id)
            <div class="col-xs-10">
                <ul class="list-inline text-right">
                    <li><p><a class="btn btn-warning btn-sm" href="{{ route('projects.edit', ['project' => $project->id]) }}"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Editar</a></p></li>
                    <li>
                        <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> Borrar</button>
                        </form>
                    </li>
                </ul>
            </div>   
            @endif
        @endif
        
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Descripción del proyecto
                </div>
                <div class="panel-body">
                    {{ $project->description }}
                </div>
            </div>
            <h4 class="page-header">Avances</h4>
            <h4 class="page-header">Comentarios</h4>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="row">
                <div class="col sm-6">

                </div>
                <div class="col sm-6">
                
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    Áreas del proyecto
                </div>
                <div class="panel-body">
                    Aquí iran las áreas del proyecto.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Información
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li class="">
                            <b>Creado:</b>
                            <br>
                            {{ date("d-m-Y", strtotime($project->created_at)) }}
                        </li>
                        <li class="">
                            <b>Fecha de finalización:</b>
                            <br>
                            @if ($project->finished_at)
                                {{ date("d-m-Y", strtotime($project->finished_at)) }}
                            @else
                                No especificada
                            @endif
                        </li>
                        <li class="">
                            <b>Última actualización:</b>
                            <br>
                            {{ date("d-m-Y H:i", strtotime($project->updated_at)) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
