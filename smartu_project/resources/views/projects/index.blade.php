@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Projects Index Header --}}
        <div class="col-sm-12">
            <h3 class="page-header">
                {{ __('projects.title') }}
                <br>
                <small>
                    {{ __('projects.allprojects') }}
                </small>
            </h3>
        </div>
    </div>
    @if (count($projects) > 0)
        <div class="row">
            {{-- Create Project Button --}}
            <div class="col-xs-12 text-right">
                <ul class="list-inline">
                    <li><a class="btn btn-success btn-sm" href="{{ route('projects.create') }}"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> {{ __('projects.create') }}</a></li>
                </ul>
            </div>
        </div>
        {{-- All Projects Section --}}
        <div class="row display-flex">
            @foreach ($projects as $project)
                <div class="col-xs-12 col-sm-6">
                    <div class="well well-sm">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                            <a class="thumbnail"><img src="{{ asset('images/projects/' . $project->image) }}"></a>
                        </div>
                        <div class="col-sm-8">
                            @if (count($project->areas) > 0)
                                @foreach ($project->areas as $area)
                                    <a href="#"><span class="label label-primary">{{ $area->name}}</span></a>
                                @endforeach
                            @else
                                <a><span class="label label-danger">{{ __('projects.no_areas') }}</span></a>
                            @endif
                            {{-- Project Title --}}
                            <a href="{{ route('projects.show', ['id' => $project->id]) }}"><h4>{{ $project->name }}</h4></a>
                            {{-- Project Author --}}
                            <small>{{ __('dashboard.by') }} <a href="#">{{ $project->user->first_name . ' ' . $project->user->last_name }}</a></small>
                            {{-- Project Description --}}
                            <p class="lead">{!! str_limit($project->description, 100) !!}</p>
                            {{-- Project Info and Good Ideas Count --}}
                            <ul class="list-inline">
                              <li><a href="{{ route('projects.show', ['id' => $project->id]) }}" class="btn btn-info" role="button"><i class="fa fa-info fa-fw" aria-hidden="true"></i> {{ __('projects.details') }}</a></li>
                              <li><a class="btn btn-link btn-sm disabled">{{ __('projects.goodideas', ['count' => count($project->likes)]) }}</a></li>
                            </ul>
                            <p></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{-- Project Pagination --}}
            <div class="col-sm-12 text-center">
                {{ $projects->render() }}
            </div>
        </div>
    @else
        <div class="row">
            {{-- No Projects Section --}}
            <div class="col-md-12 text-center">
                <h3>{{ __('projects.no_projects') }}</h3>
                <p><a class="btn btn-success" href="{{ route('projects.create') }}">{{ __('projects.create_one') }}</a></p>
            </div>
        </div>
    @endif
</div>
@endsection
