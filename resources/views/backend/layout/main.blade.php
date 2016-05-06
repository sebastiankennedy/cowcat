@inject('mainPresenter','App\Presenters\MainPresenter')
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    @yield('before.css')
    <link rel="stylesheet" type="text/css" href="/assets/plugins/pace/pace.min.css">
    <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/app.min.css') }}">
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
                @include('backend.layout.success')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('backend.layout.footer')
    </div>
    @yield('before.js')
    <script type="text/javascript" src="{{ elixir('assets/js/app.min.js') }}"></script>
    <script type="text/javascript" src="/assets/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.select2').select2();
            $('#created_at').daterangepicker({timePickerIncrement: 30, format: 'YYYY/MM/DD HH:mm:ss'});
        });
    </script>
    @yield('after.js')
</body>
</html>
