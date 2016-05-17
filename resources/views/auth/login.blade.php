<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>缤果仓储系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/app.min.css') }}">
    <style type="text/css">
        body#login {
            width: 100%;
            height: 100%;
            background-image: url({{array_random(config('cowcat.background-images'))}});
            background-repeat: no-repeat;
            background-size: cover !important;
            background-position: center center;
        }

        .login-logo {
            color: #FFF;
        }

        .login-box-body {
            border-radius: 10px;
            opacity: 0.9;
        }
    </style>
</head>
<body id="login" class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        缤果<b>仓储系统</b>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            商场如战场，品质打先锋
        </p>
        <form action="{{URL::to('/auth/login')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="账号" name="email" value="{{old('email')}}">
                        <span class="fa fa-user form-control-feedback"></span>
                        @include('backend.layout.message.tips',['field'=>'email'])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="密码" name="password" value="{{old('password')}}">
                        <span class="fa fa-lock form-control-feedback"></span>
                        @include('backend.layout.message.tips',['field'=>'password'])
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="验证码" name="captcha">
                        <span class="fa fa-image form-control-feedback"></span>
                        @include('backend.layout.message.tips',['field'=>'captcha'])
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <img src="{{$captcha}}" alt="图片验证码" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" value="1"> 保持登录
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登 录</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ elixir('assets/js/app.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
</body>

</html>
