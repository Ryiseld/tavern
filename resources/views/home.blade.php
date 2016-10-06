@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('layouts.partials._messages')

            <div class="panel panel-default">
                <div class="panel-heading">Tavern Forum</div>

                <div class="panel-body">
                    <ul>
                    @foreach ($topics as $topic)
                        <li><a href="{{ url('/topic/' . $topic->id) }}">{{ $topic->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
