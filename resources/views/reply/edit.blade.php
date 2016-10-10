@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/topic/' . $reply->topic->id) }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>&nbsp;
                    Edit Reply
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/reply/' . $reply->id . '/update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-2 control-label">Content</label>

                            <div class="col-md-10">
                                <textarea name="content" id="content" class="form-control tinymce">{{ old('content') ? old('content') : $reply->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-5">
                                <input type="submit" class="btn btn-primary" value="Update Reply">
                                <button class="btn btn-danger delete" href="{{ url('/reply/' . $reply->id . '/delete') }}">Delete Reply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
