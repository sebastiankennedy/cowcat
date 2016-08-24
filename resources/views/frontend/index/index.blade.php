<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>CowCat - Laravel CMS - 喵!</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<div class="preloader">
    <i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
</div>

@include('frontend.index.header')
@include('frontend.index.welcome')
@include('frontend.index.services')
@include('frontend.index.portfolio')
@include('frontend.index.facts')
@include('frontend.index.team')
@include('frontend.index.testimonials')
@include('frontend.index.contact')
@include('frontend.index.footer')

<script src="{{elixir("assets/frontend/js/app.min.js")}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#contact-us').click(function () {
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        $.ajax({
            url: "{{route('frontend.index.contact-us')}}",
            type: "POST",
            data: {name: name, email: email, message: message},
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == 1) {
                    $("#contact-us").attr('disabled', 'disabled');
                    $("#contact-us").html('留言成功');
                    swal({
                        title: response.message,
                        text: "我们会尽快回复你的说~",
                        type: 'success',
                        confirmButtonColor: '#8CD4F5',
                        closeOnConfirm: false
                    });
                } else {
                    swal(response.message)
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
</script>
</body>

</html>