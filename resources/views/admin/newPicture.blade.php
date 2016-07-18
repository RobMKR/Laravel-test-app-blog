@extends('../layouts.admin')

@section('content')

<div class="container">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Post</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/posts/new') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('email') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="content"></textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image_url') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input type="file" name="image_url"/>

                                @if ($errors->has('image_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
