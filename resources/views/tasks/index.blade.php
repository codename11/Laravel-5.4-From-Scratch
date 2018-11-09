@extends("layouts.app")
@section("content")
<a href="/" class="btn btn-info">Back</a>
    <h1>Hello World</h1>
    <?php //print_r($tasks); ?>
    <ul class="list-group">
        @if(count($tasks)>0)
            @foreach($tasks as $task)
                <li class="list-group-item">
                    <a href="/tasks/{{$task->id}}">
                        {{$task->body}}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>

@endsection