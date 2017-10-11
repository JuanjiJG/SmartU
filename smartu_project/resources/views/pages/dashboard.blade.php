@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row display-flex">
        <div class="col-sm-12">
            <h3 class="page-header">{{ __('dashboard.featured') }}</h3>
        </div>
        @foreach ($featured_projects as $featured_project)
            <div class="col-sm-6">
                <div class="well well-bg">
                    <div class="row">
                        <div class="col-sm-7 col-md-8">
                            @if (count($featured_project->areas) > 0)
                                @foreach ($featured_project->areas as $area)
                                    <a href="{{ route('areas.index', ['area' => $area->id]) }}"><span class="label label-primary">{{ __($area->name) }}</span></a>
                                @endforeach
                            @else
                                <a><span class="label label-danger">{{ __('projects.no_areas') }}</span></a>
                            @endif
                            <a href="{{ route('projects.show', ['id' => $featured_project->id]) }}"><h4>{{ $featured_project->name }}</h4></a>
                            <small>{{ __('dashboard.by') }} <a href="">{{ $featured_project->user->first_name . ' ' . $featured_project->user->last_name }}</a></small>
                        </div>
                        <div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 col-md-4">
                                <a class="thumbnail"><img src="{{ asset('images/projects/' . $featured_project->image) }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($featured_comments as $featured_comment)
            <div class="col-sm-4">
                <div class="well">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="{{ asset('images/avatars/' . $featured_comment->user->avatar) }}" class="img-circle img-responsive">
                        </div>
                        <div class="col-xs-12">
                            <small>{{ __('dashboard.by') }} <a href="">{{ $featured_comment->user->first_name . ' ' . $featured_comment->user->last_name }}</a></small>
                        </div>
                        <div class="col-xs-12">
                            <blockquote>
                                "{{ str_limit($featured_comment->content, 80) }}"
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-7">
            <h3 class="page-header">{{ __('dashboard.recent') }}</h3>
            <div class="row">
                @foreach ($recent_projects as $recent_project)
                    <div class="col-sm-12">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                            <a href="#" class="thumbnail"><img src="{{ asset('images/projects/' . $recent_project->image) }}"></a>
                        </div>
                        <div class="col-sm-8">
                            @if (count($recent_project->areas) > 0)
                                @foreach ($recent_project->areas as $area)
                                    <a href="{{ route('areas.index', ['area' => $area->id]) }}"><span class="label label-primary">{{ __($area->name) }}</span></a>
                                @endforeach
                            @else
                                <a><span class="label label-danger">{{ __('projects.no_areas') }}</span></a>
                            @endif
                            <a href="#"><h4>{{ $recent_project->name }}</h4></a>
                            <small>{{ __('dashboard.by') }} <a href="#">{{ $recent_project->user->first_name . ' ' . $recent_project->user->last_name }}</a></small>
                            <p class="lead">{!! str_limit($recent_project->description, 100) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-5">
            <h3 class="page-header">{{ __('dashboard.search') }}</h3>
            <div class="row display-flex">
                @foreach ($areas as $area)
                    <div class="col-xs-6 col-sm-4 col-md-6">
                        <div class="well well-sm text-center">
                            <a href="{{ route('areas.index', ['area' => $area->id]) }}"><h5>{{ __($area->name) }}</h5></a>
                            <small>{{ count($area->projects) }} {{ trans_choice('dashboard.projects', count($area->projects)) }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
