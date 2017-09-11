@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">{{ __('dashboard.featured') }}</h3>
        </div>
        <div class="col-sm-6">
            <div class="well well-bg">
                <div class="row">
                    <div class="col-sm-7 col-md-8">
                        <a href="#"><span class="label label-default">Default</span></a>
                        <a href="#"><span class="label label-primary">Primary</span></a>
                        <a href="#"><span class="label label-success">Success</span></a>
                        <a href="#"><span class="label label-info">Info</span></a>
                        <a href="#"><span class="label label-warning">Warning</span></a>
                        <a href="#"><span class="label label-danger">Danger</span></a>
                        <a href="#"><h4>Project name</h4></a>
                        <small>{{ __('dashboard.by') }} <a href="">John Doe</a></small>
                    </div>
                    <div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 col-md-4">
                            <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well well-bg">
                <div class="row">
                    <div class="col-sm-7 col-md-8">
                        <a href="#"><span class="label label-default">Default</span></a>
                        <a href="#"><span class="label label-primary">Primary</span></a>
                        <a href="#"><span class="label label-success">Success</span></a>
                        <a href="#"><span class="label label-info">Info</span></a>
                        <a href="#"><span class="label label-warning">Warning</span></a>
                        <a href="#"><span class="label label-danger">Danger</span></a>
                        <a href="#"><h4>Project name</h4></a>
                        <small>{{ __('dashboard.by') }} <a href="">John Doe</a></small>
                    </div>
                    <div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 col-md-4">
                            <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="{{ asset('images/avatars/default.jpg') }}" class="img-circle img-responsive">
                    </div>
                    <div class="col-xs-12">
                        <small>{{ __('dashboard.by') }} <a href="#">John Doe</a></small>
                    </div>
                    <div class="col-xs-12">
                        <blockquote>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="{{ asset('images/avatars/default.jpg') }}" class="img-circle img-responsive">
                    </div>
                    <div class="col-xs-12">
                        <small>{{ __('dashboard.by') }} <a href="#">John Doe</a></small>
                    </div>
                    <div class="col-xs-12">
                        <blockquote>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="{{ asset('images/avatars/default.jpg') }}" class="img-circle img-responsive">
                    </div>
                    <div class="col-xs-12">
                        <small>{{ __('dashboard.by') }} <a href="#">John Doe</a></small>
                    </div>
                    <div class="col-xs-12">
                        <blockquote>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="page-header">{{ __('dashboard.recent') }}</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                        <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                    </div>
                    <div class="col-sm-8">
                        <a href="#"><span class="label label-default">Default</span></a>
                        <a href="#"><span class="label label-primary">Primary</span></a>
                        <a href="#"><span class="label label-success">Success</span></a>
                        <a href="#"><span class="label label-info">Info</span></a>
                        <a href="#"><span class="label label-warning">Warning</span></a>
                        <a href="#"><span class="label label-danger">Danger</span></a>
                        <a href="#"><h4>Project name</h4></a>
                        <small>{{ __('dashboard.by') }} <a href="#">John Doe</a></small>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                        <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                    </div>
                    <div class="col-sm-8">
                        <a href="#"><span class="label label-default">Default</span></a>
                        <a href="#"><span class="label label-primary">Primary</span></a>
                        <a href="#"><span class="label label-success">Success</span></a>
                        <a href="#"><span class="label label-info">Info</span></a>
                        <a href="#"><span class="label label-warning">Warning</span></a>
                        <a href="#"><span class="label label-danger">Danger</span></a>
                        <a href="#"><h4>Project name</h4></a>
                        <small>{{ __('dashboard.by') }} <a href="#">John Doe</a></small>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
                        <a href="#" class="thumbnail"><img src="{{ asset('images/projects/default.jpg') }}"></a>
                    </div>
                    <div class="col-sm-8">
                        <a href="#"><span class="label label-default">Default</span></a>
                        <a href="#"><span class="label label-primary">Primary</span></a>
                        <a href="#"><span class="label label-success">Success</span></a>
                        <a href="#"><span class="label label-info">Info</span></a>
                        <a href="#"><span class="label label-warning">Warning</span></a>
                        <a href="#"><span class="label label-danger">Danger</span></a>
                        <a href="#"><h4>Project name</h4></a>
                        <small>{{ __('dashboard.by') }} <a href="#">John Doe</a></small>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="page-header">{{ __('dashboard.search') }}</h3>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>1 {{ trans_choice('dashboard.projects', 1) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>1 {{ trans_choice('dashboard.projects', 1) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-6">
                    <div class="well well-sm text-center">
                        <a href="#"><h5>Computer science</h5></a>
                        <small>157 {{ trans_choice('dashboard.projects', 157) }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
