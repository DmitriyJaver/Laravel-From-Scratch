
@extends('layout')
@section ('tittle', 'About')


@section('head')
    <p>ABOUT US {{$foo}}</p>
    <br>
@endsection

@section('content')
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <ul>
    @foreach ($tasks as $task)
    <li>{{$task}}</li>
    @endforeach
    </ul>

    @endsection
{{--<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        article, aside, details, figcaption, figure, footer,header,
        hgroup, menu, nav, section { display: block; }
    </style>
</head>
<body>
<p>ABOUT US</p>
<br>
<p>
    <a href="/">Back to the main</a>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
</p>
</body>
</html>--}}
