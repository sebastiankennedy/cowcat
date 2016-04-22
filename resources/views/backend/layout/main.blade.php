<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    @yield('before.css')
    <link rel="stylesheet" type="text/css" href="/assets/css/app.min.css">
    @yield('after.css')
</head>

<body class="skin-black">
    <div class="wrapper">
        @include('backend.layout.header')
        @include('backend.layout.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    {{ $page_title or "Page Title" }}
                    <small>{{ $page_description or null }}</small>
                    </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('backend.layout.footer')
    </div>
    @yield('before.js')
    <script src="/assets/js/app.min.js"></script>
    @yield('after.js')
</body>

</html>
