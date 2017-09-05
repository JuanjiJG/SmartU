<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xl-6 col-xl-offset-3">
        @if(session()->has('message_success'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!! session()->get('message_success') !!}
            </div>
        @endif
        @if(session()->has('message_warning'))
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!! session()->get('message_warning') !!}
            </div>
        @endif
        @if(session()->has('message_info'))
            <div class="alert alert-dismissible alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!! session()->get('message_info') !!}
            </div>
        @endif
        </div>
    </div>
</div>
