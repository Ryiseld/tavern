@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('layouts.partials._messages')

            <div class="panel panel-default">
                <div class="panel-heading">Tavern Forum</div>

                <div class="panel-body">
                    <ul id="topics-list">
                    @foreach ($topics as $topic)
                        <li>
                            <a href="{{ url('/topic/' . $topic->id) }}"><h4>{{ $topic->title }}</h4></a>
                            <p class="help-block">By {{ $topic->user->name }} at {{ $topic->created_at->format('d/m/Y h:m') }}</p>
                        </li>
                    @endforeach
                    </ul>

                    <div class="paginate">
                        {{ $topics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
