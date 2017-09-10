@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Project Title Header --}}
        <div class="col-sm-12">
            <h3 class="page-header">
                {{ $project->name }} <small>{{ __('projects.by') }} <a href="">{{ $project->user->first_name . ' ' . $project->user->last_name }}</a></small>
                <br>
                <small>{{ __('projects.updated') }} {{ $project->updated_at->diffforhumans() }}</small>
            </h3>
        </div>
    </div> {{-- Row --}}
    <div class="row">
        {{-- Description Panel --}}
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
                    {{-- Project Basic Info Panel --}}
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
                                    @if (count($project->areas) > 0)
                                        @foreach ($project->areas as $area)
                                            <a href="#"><span class="label label-primary">{{ $area->name}}</span></a>
                                        @endforeach
                                    @else
                                        <a><span class="label label-danger">{{ __('projects.no_areas') }}</span></a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        @if (Auth::check() && (Auth::user()->id == $project->user_id))
                            <div class="panel-footer">
                                {{-- Button Trigger Modal --}}
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add-area-modal">
                                    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> {{ __('projects.add_area') }}
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- Project Members Panel --}}
                <div class="col-sm-6 col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">{{ __('projects.members') }}</div>
                        <div class="panel-body">
                            Aquí aparecerán los integrantes del proyecto.
                        </div>
                    </div>
                </div>
                {{-- Project Available Vacancies Panel --}}
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
        @if (Auth::check() && (Auth::user()->id == $project->user_id))
            <!-- Modals -->
            <div class="modal fade" id="add-area-modal" tabindex="-1" role="dialog" aria-labelledby="add-area-modal-label">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="add-area-modal-label">{{ __('projects.add_area') }}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form class="form-horizontal" action="{{ route('areas.update', ['project' => $project->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}

                                        <div class="form-group">
                                            <label for="areas[]" class="col-md-4 control-label">Áreas</label>

                                            <div class="col-md-6">
                                                @foreach ($all_areas as $one_area)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="areas[]" value="{{ $one_area->id }}"
                                                            @if (count($project->areas) && $project->areas->contains($one_area->id))
                                                                checked
                                                            @endif>
                                                            {{ $one_area->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-info">{{ __('projects.save') }}</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('projects.discard') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div> {{-- Row --}}
    <div class="row">
        {{-- Project Progress Section --}}
        <div class="col-md-6">
            <h3 class="page-header">{{ __('projects.progresses') }}</h3>
            <div class="row">
                {{-- Single Project Progress Section --}}
                @if (count($project->progresses) > 0)
                    @foreach ($project->progresses as $progress)
                        <div class="col-sm-12">
                            <div class="well">
                              <div class="row">
                                  <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                                      <a class="thumbnail"><img src="{{ asset('images/progresses/' . $progress->image) }}"></a>
                                  </div>
                                  <div class="col-sm-8">
                                      <h4>{{ $progress->name }}</h4>
                                      <small>{{ ucfirst($progress->created_at->diffforhumans()) }} - {{ __('projects.published_by') }} <a href="#">{{ $progress->user->first_name . ' ' . $progress->user->last_name }}</a></small>
                                      <p class="lead">{{ $progress->description }}</p>
                                  </div>
                              </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- No Progress Yet Panel --}}
                    <div class="col-sm-12 text-center">
                        <div class="well well-sm">
                            <h6>{{ __('projects.no_progress')}}</h6>
                            @if (Auth::check() && (Auth::user()->id == $project->user->id))
                                <h6>{{ __('projects.be_first_progress') }}</h6>
                            @endif
                        </div>
                    </div>
                @endif
                @if (Auth::check() && (Auth::user()->id == $project->user->id))
                    {{-- Upload Progress Form --}}
                    <div class="col-xs-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <b>{{ Auth::user()->first_name }}</b>, {{ __('projects.progress_publish') }}
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="{{ route('progress.store', ['project' => $project->id]) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Nombre *</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                            @if ($errors->has('name'))
                                                <span class="help-block">name
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-4 control-label">Descripción *</label>

                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label for="image" class="col-md-4 control-label">Imagen</label>

                                        <div class="col-md-6">
                                            <input id="image" type="file" class="form-control" name="image">

                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> {{ __('projects.save') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- Project Comments Section --}}
        <div class="col-md-6">
            <h3 class="page-header">{{ __('projects.comments') }}</h3>
            <div class="row">
                @if (count($project->comments) > 0)
                    @foreach ($project->comments as $comment)
                        {{-- Single Project Comment Panel --}}
                        <div class="col-md-12">
                            <div class="col-xs-9 col-sm-10">
                                <div class="panel panel-primary text-right">
                                    <div class="panel-heading">
                                        <b>{{ $comment->user->first_name . ' ' . $comment->user->last_name }}</b> - {{ ucfirst($comment->created_at->diffforhumans()) }}
                                    </div>
                                    <div class="panel-body text-justify">
                                        {{ $comment->content }}
                                    </div>
                                    @if (Auth::check() && (Auth::user()->id == $comment->user->id))
                                        <div class="panel-footer">
                                            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw" aria-hidden="true"></i> {{ __('projects.delete') }}</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- User Avatar --}}
                            <div class="col-xs-3 col-sm-2">
                                <a href="#"><img class="img-responsive img-circle" src="{{ asset('images/avatars/' . $comment->user->avatar) }}"></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">
                        <div class="well well-sm">
                            <h6>{{ __('projects.no_comments')}}</h6>
                            @if (Auth::check())
                                <h6>{{ __('projects.be_first') }}</h6>
                            @endif
                        </div>
                    </div>
                @endif
                {{-- Publish New Comment Panel --}}
                @if (Auth::check())
                    <div class="col-xs-12">
                        <div class="col-xs-9 col-sm-10">
                            <div class="panel panel-info text-right">
                                <div class="panel-heading">
                                    <b>{{ Auth::user()->first_name }}</b>, {{ __('projects.publish') }}
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="{{ route('comments.store', ['project' => $project->id]) }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <textarea style="resize:vertical" id="content" rows="3" class="form-control" name="content" required></textarea>

                                                @if ($errors->has('content'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('content') }}</strong>
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
                        {{-- Current User Avatar --}}
                        <div class="col-xs-3 col-sm-2">
                            <a href="#"><img class="img-responsive img-circle" src="{{ asset('images/avatars/' . Auth::user()->avatar) }}"></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div> {{-- Row --}}
</div> {{-- Container --}}
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
