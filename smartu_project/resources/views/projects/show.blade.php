@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">
                {{ $project->name }} <small>{{ __('projects.by') }} <a href="">John Doe</a></small>
                <br>
                <small>{{ __('projects.updated') }} {{ $project->updated_at->diffforhumans() }}</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('projects.description') }}</div>
                <div class="panel-body">
                    {!! $project->description !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">{{ __('projects.info') }}</div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li><b>{{ __('projects.start') }}:</b> {{ date("d-m-Y", strtotime($project->created_at)) }}</li>
                                <li><b>{{ __('projects.end') }}:</b>
                                    @if ($project->finished_at)
                                        {{ date("d-m-Y", strtotime($project->finished_at)) }}
                                    @else
                                        {{ __('projects.not_specified') }}
                                    @endif
                                </li>
                                <li><b>{{ __('projects.website') }}:</b>
                                    @if ($project->url)
                                        <a href="{{ $project->url }}">{{ $project->url }}</a>
                                    @else
                                        {{ __('projects.none') }}
                                    @endif
                                </li>
                                <li>
                                    <b>{{ __('projects.areas') }}:</b><br>
                                    <a href="#"><span class="label label-default">Default</span></a>
                                    <a href="#"><span class="label label-primary">Primary</span></a>
                                    <a href="#"><span class="label label-success">Success</span></a>
                                    <a href="#"><span class="label label-info">Info</span></a>
                                    <a href="#"><span class="label label-warning">Warning</span></a>
                                    <a href="#"><span class="label label-danger">Danger</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">{{ __('projects.members') }}</div>
                        <div class="panel-body">
                            Aquí aparecerán los integrantes del proyecto.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">{{ __('projects.vacancies') }}</div>
                        <div class="panel-body">
                            Aquí aparecerán las vacantes disponibles del proyecto.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header">{{ __('projects.progress') }}</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                      <div class="row">
                          <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                              <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                          </div>
                          <div class="col-sm-8">
                              <h4>¡Nuevo avance!</h4>
                              <small>Hace 2 días - Publicado por <a href="#">John Doe</a></small>
                              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae.</p>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="well">
                      <div class="row">
                          <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                              <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                          </div>
                          <div class="col-sm-8">
                              <h4>¡Nuevo avance!</h4>
                              <small>Hace 2 días - {{ __('projects.published_by') }} <a href="#">John Doe</a></small>
                              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae.</p>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="page-header">{{ __('projects.comments') }}</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-9 col-sm-10">
                        <div class="panel panel-primary text-right">
                            <div class="panel-heading">
                                <b>John Doe</b> - Hace 3 minutos
                            </div>
                            <div class="panel-body text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mattis vehicula interdum. Nam in ex facilisis, varius ante sed, cursus mi.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a href="#"><img class="img-responsive img-circle" src="{{ asset('images/avatars/default.jpg') }}"></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-xs-9 col-sm-10">
                        <div class="panel panel-primary text-right">
                            <div class="panel-heading">
                                <b>John Doe</b> - Hace 3 minutos
                            </div>
                            <div class="panel-body text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mattis vehicula interdum. Nam in ex facilisis, varius ante sed, cursus mi.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a href="#"><img class="img-responsive img-circle" src="{{ asset('images/avatars/default.jpg') }}"></a>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-9 col-sm-10">
                        <div class="panel panel-info text-right">
                            <div class="panel-heading"><b>Jane Doe</b>, {{ __('projects.publish') }}</div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="index.html" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <textarea style="resize:vertical" id="comment" rows="3" class="form-control" name="comment" required></textarea>

                                            @if ($errors->has('comment'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info">{{ __('projects.comment') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2">
                        <a href="#"><img class="img-responsive img-circle" src="{{ asset('images/avatars/default.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



































    {{-- <div class="row">
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
    </div> --}}

    {{-- <div class="row">
        <div class="col-sm-2">
            <ul class="nav nav-pills text-center" role="tablist">
                <li role="presentation" class="active">
                    <a href="#info" aria-controls="info" role="tab" data-toggle="pill">Información</a>
                </li>
                <li role="presentation">
                    <a href="#progress" aria-controls="progress" role="tab" data-toggle="pill">Avances</a>
                </li>
                <li role="presentation">
                    <a href="#comments" aria-controls="comments" role="tab" data-toggle="pill">Comentarios</a>
                </li>
                <li role="presentation">
                    <a href="#gallery" aria-controls="gallery" role="tab" data-toggle="pill">Galería</a>
                </li>
                <li role="presentation">
                    <a href="#vacancies" aria-controls="vacancies" role="tab" data-toggle="pill">Vacantes</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="info">
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
                </div>
                <div role="tabpanel" class="tab-pane fade" id="progress">

                </div>
                <div role="tabpanel" class="tab-pane fade" id="comments">

                </div>
                <div role="tabpanel" class="tab-pane fade" id="gallery">

                </div>
                <div role="tabpanel" class="tab-pane fade" id="vacancies">

                </div>
            </div>
        </div>
    </div> --}}
