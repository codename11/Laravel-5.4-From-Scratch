@extends("layouts.app")
@section("content")

    <h1>Show tasks</h1>
    <?php //print_r($tasks); ?>
    <div class="alert alert-info">{{$task->body}}</div>   

@endsection