<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    @include('backend.includes.styles')


</head>

<body class="">
    <div id="app" app-data="true">
        <div class="wrapper ">

            @include('backend.partials.sidebar')
            <div class="main-panel">

                @include('backend.partials.topnav')
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
@include('backend.includes.scripts')
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>

</html>
