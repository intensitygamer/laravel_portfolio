<!DOCTYPE html>
<html lang="en">
<head>
    <title>Boardwalk</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <link rel="stylesheet" href="/css/custom.css" />
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<!--Header-part-->
<div id="header">
    <h1 class="visible-desktop"><a href="/">Boardwalk</a></h1>
</div>
<!--close-Header-part-->
    <body>
        @component('header')
        @endcomponent
        @component('sidebar')
        @endcomponent
        @show
        <div id="content">
            @yield('content')
        </div>
        @component('footer')
        @endcomponent
    </body>
</html>
