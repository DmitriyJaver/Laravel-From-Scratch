<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'laracasts')</title>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        article, aside, details, figcaption, figure, footer,header,
        hgroup, menu, nav, section { display: block; }
    </style>

</head>
<body>
<p>
    @yield ('head')
</p>
<br>
<p>
    <a href="/">Back to the main</a>
</p>
<p>
    @yield ('content')
    <ul>
        @foreach($projects as $project)
            <li>
                <a href="/projects/{{$project->id}}">
                    {{$project->title}}
                     -
                    <a href="/projects/{{ $project->id }}/edit">
                    edit

                </a>
            </li>
            @endforeach
    </ul>

</p>
<p>
    <a href="/projects/create">CREATE NEW PROJECT</a>
</p>
</body>
</html>
