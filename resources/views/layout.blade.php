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
        .is-completed {
            text-decoration: line-through;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">

</head>
<body>
<p>
    @yield ('head')
</p>
<br>
<p>
    <a href="/">Back to the main</a>
</p>
    <div class="container">

        @yield ('content')

    </div>

</body>
</html>
