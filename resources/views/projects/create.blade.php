@extends('layout')

@section('head')
    CREATE NEW PROJECT
    @endsection

@section('content')

    <form method="post" action="/projects">
        {{csrf_field()}}
        <div class="field">
            <div class="field">
                <div class="control">
                    <input type="text" class="text" name="title" placeholder="type new project title">
                </div>
            </div>
            <div class="field">
                <div class="control">

                <textarea class="textarea" name="description" placeholder="project description">Описание проекта</textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button" type="submit">Create</button>
                </div>
            </div>
        </div>
        @include('errors')
    </form>
@endsection
