<div class="topic-reply">
    <h3>Reply to this topic</h3>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/topic/' . $topic->id . '/reply/create') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-1 control-label">Content</label>

            <div class="col-md-11">
                <textarea name="content" id="content" class="form-control tinymce">{{ old('content') }}</textarea>

                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-offset-6">
                <input type="submit" class="btn btn-primary" value="Reply">
            </div>
        </div>
    </form>
</div>