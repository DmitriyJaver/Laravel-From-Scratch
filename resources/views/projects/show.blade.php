@extends ('layout')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>

    <div class="content">
        {{$project->description}}
    </div>

    <p>
        <a href="/projects/{{ $project->id }}/edit"> Edit this project</a>
    </p>

    @if($project->tasks->count())
        TASK:
        <div class="box">
           @foreach($project->tasks as $task)

                <form method="POST" action="/tasks/{{$task->id}}">
                    @method('PATCH')
                    @csrf
                    <label class="checkbox {{$task->completed ? 'is-completed' : ''}}" for="completed">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                        {{ $task->description }}
                    </label>
                </form>

            @endforeach
        </div>
    @else
        <br>
        there is no task for this project
    @endif

    {{-- add a new task form--}}
    <form class="box" method="POST" action="/projects/{{$project->id}}/tasks">
        @method('')
        @csrf
        <div class="field">
            <label class="label" for="descriprtion">New task</label>
            <div class="control">
                <input type="text" class="input @error('description') is-ivalid @enderror" name="description" placeholder="New Task here">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add new task</button>
            </div>
        </div>
       @include('errors')
    </form>

    @endsection
