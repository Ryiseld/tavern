@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('layouts.partials._messages')
            
            <div class="panel panel-default">
                <div class="panel-heading">{{ $topic->title }}</div>

                <div class="panel-body">
                    {{ $topic->content }}

                    <p style="font-style: italic; margin-top: 1em">By {{ $topic->user->name }} at {{ $topic->created_at->format('d/m/Y h:m') }}</p>

                    @if (!Auth::guest() && Auth::user()->id == $topic->user->id)
                        <a href="{{ url('/topic/' . $topic->id . '/edit') }}">Edit Topic</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
