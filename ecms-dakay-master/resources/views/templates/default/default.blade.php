<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta name='site-url' content="{{ URL::to('/') }}">
    <meta name='site-csrf-token' content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta-description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('default-title')</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/png"  />
    <link rel="shortcut" href="{{ asset('img/favicon.ico') }}" type="image/png"  />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />
    @stack('default-styles')

</head>
<body class="@yield('default-body-class')">
<!--[if lte IE 9]>
<div class="browserupgrade"><i class="fa fa-warning"></i> You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
<![endif]-->

<div id="app-vue">
    @yield('default-main')
</div>

<script type="text/javascript" src="{{ asset('js/default.js') }}"></script>
<script type="text/javascript">
    CodeJquery(function(){

        // create notification based on status
        @if ($message = Session::get('success'))
            CreateNoty({type:'success', text:'{{ $message  }}'});
        @endif

        @if ($message = Session::get('info'))
            CreateNoty({type:'information', text:'{{ $message  }}'})
        @endif

        @if ($message = Session::get('warning'))
            CreateNoty({type:'warning', text:'{{ $message  }}'})
        @endif

        @if ($message = Session::get('error'))
            CreateNoty({type:'error', text:'{{ $message  }}'})
        @endif
        
        // realtime clock activated
        //liveClock('span#date-time');
    });
</script>

@stack('default-scripts')

@include('modals.append_view_modal')
@include('modals.confirm_view_modal')

</body>
</html>