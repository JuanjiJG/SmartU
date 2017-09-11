@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p><a class="btn btn-default" href="{{ URL::previous() }}"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Volver</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                {{ $title }}
                <br>
                <small>{{ '@'.$user->username }}</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-1 text-center">
            <img src="{{ asset('images/avatars/' . $user->avatar) }}" class="img-circle img-responsive">
            <small>Imagen de perfil actual</small>
            <br><br>
        </div>
        <div class="col-xs-12 col-sm-7 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cambiar imagen de perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Imagen de perfil *</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" required>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Establecer imagen de perfil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
