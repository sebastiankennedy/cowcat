<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>CowCat - Laravel CMS - 喵!</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CowCat is a Free, open-source CMS based on the Laravel PHP Framework">
    <meta name="keywords" content="CowCat,奶牛猫,Laravel,CMS,Laravel CMS,CowCat CMS">
    <meta name="author" content="天猫,Luis,Summer">
    <link rel="stylesheet" href="{{elixir('assets/frontend/css/app.min.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader -->
<div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>

<!-- Header -->
@include('frontend.index.header')

<!-- Welcome -->
@include('frontend.index.welcome')

<!-- Services -->
@include('frontend.index.services')

<!-- Portfolio -->
@include('frontend.index.portfolio')

<!-- Some Fune Facts -->
@include('frontend.index.facts')

<!-- Team -->
@include('frontend.index.team')

<!-- Testimonials -->
@include('frontend.index.testimonials')

<!-- Contact Us -->
@include('frontend.index.contact')

<!-- Footer -->
@include('frontend.index.footer')

<script src="{{elixir("assets/frontend/js/app.min.js")}}"></script>
<script type="text/javascript">

</script>
</body>

</html>