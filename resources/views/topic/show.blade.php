@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.partials._messages')
            
            <div class="panel panel-default">
                <div class="panel-heading">{{ $topic->title }}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 topic-sidebar">
                            <img src="{{ $topic->user->gravatar }}" alt="{{ $topic->user->name }}">

                            <div style="margin-top: 2rem">
                                <p>{{ $topic->user->name }}</p>
                                <p style="font-style: italic">{{ $topic->created_at->format('d/m/Y h:m') }}</p>
                                @if (!Auth::guest() && Auth::user()->id == $topic->user->id)
                                    <p>
                                        <a href="{{ url('/topic/' . $topic->id . '/edit') }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-10">
                            {!! $topic->content !!}
                        </div>
                    </div>

                    @foreach ($replies as $reply)
                        <div class="row">
                            <div class="reply">
                                <div class="col-md-2 topic-sidebar">
                                    <img src="{{ $reply->user->gravatar }}" alt="{{ $reply->user->name }}">

                                    <div style="margin-top: 2rem">
                                        <p>{{ $reply->user->name }}</p>
                                        <p style="font-style: italic">{{ $reply->created_at->format('d/m/Y h:m') }}</p>
                                        @if (!Auth::guest() && Auth::user()->id == $reply->user->id)
                                            <p>
                                                <a href="{{ url('/reply/' . $reply->id . '/edit') }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                </a>
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    {!! $reply->content !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection