@inject('menuPresenter','App\Presenters\MenuPresenter')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    @yield('before.css')
    <link rel="stylesheet" type="text/css" href="/assets/plugins/pace/pace.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/app.min.css">
    @yield('after.css')
</head>
<body class="skin-black">
    <div class="wrapper">
        @include('backend.layout.header')
        @include('backend.layout.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                @include('backend.layout.breadcrumbs')
                @include('backend.layout.errors')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('backend.layout.footer')
    </div>
    @yield('before.js')
    <script type="text/javascript" src="/assets/js/app.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/pace/pace.min.js"></script>
    @yield('after.js')
</body>
</html>
