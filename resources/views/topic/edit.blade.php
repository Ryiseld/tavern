@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url()->previous() }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>&nbsp;
                    Edit Topic
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/topic/' . $topic->id . '/update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-10">
                                <input id="title" type="title" class="form-control" name="title" value="{{ old('title') ? old('title') : $topic->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-2 control-label">Content</label>

                            <div class="col-md-10">
                                <textarea name="content" id="content" class="form-control tinymce">{{ old('content') ? old('content') : $topic->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="Update Topic">
                                <button class="btn btn-danger delete" href="{{ url('/topic/' . $topic->id . '/delete') }}">Delete Topic</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
