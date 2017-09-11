@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($project->exists)
                <p><a class="btn btn-default" href="{{ route('projects.show', ['id' => $project->id]) }}"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Cancelar edición</a></p>
            @else
                <p><a class="btn btn-default" href="{{ route('projects.index') }}"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Volver</a></p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">
                @if($project->exists)
                    <form class="form-horizontal" action="{{ route('projects.update', ['project' => $project->id]) }}" method="post" enctype="multipart/form-data">
                        {{ method_field('put') }}
                @else
                    <form class="form-horizontal" action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                @endif
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Nombre *</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $project->name or old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">Descripción *</label>

                            <div class="col-md-7">
                                <textarea id="description" class="form-control ckeditor" name="description" required>{{ $project->description or old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-3 control-label">Sitio web</label>

                            <div class="col-md-7">
                                <input id="url" type="text" class="form-control" name="url" value="{{ $project->url or old('url') }}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('finished_at') ? ' has-error' : '' }}">
                            <label for="finished_at" class="col-md-3 control-label">Fecha de finalización</label>

                            <div class="col-md-7">
                                <input id="finished_at" type="date" class="form-control" name="finished_at" value="{{ $project->finished_at or old('finished_at') }}">

                                @if ($errors->has('finished_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('finished_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-3 control-label">Imagen</label>

                            <div class="col-md-7">
                                <input id="image" type="file" class="form-control" name="image">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Guardar proyecto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
