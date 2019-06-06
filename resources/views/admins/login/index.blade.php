<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>芸莘</b>后台管理系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录后台</p>

        <form action="{{url('/admin/login')}}" method="post" id="login">
            @csrf
            <div class="form-group  @if($errors->has('name'))  has-error @endif has-feedback">
                <input type="text" class="form-control" value="admin" placeholder="输入用户名" name="name" id="name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if($errors->has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group   @if($errors->has('password'))  has-error @endif has-feedback">
                <input type="password" class="form-control" value="1355081829@qq.com" id="password" name="password"
                       placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('password'))
                    <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
            </div>
            <a href="#" class="pull-right">忘记密码</a><br>
        </form>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/plugins/iCheck/icheck.min.js"></script>
<script src="/plugins/jquery-validation/dist/jquery.validate.js"></script>
<script src="/plugins/jquery-validation/src/localization/messages_zh.js"></script>

<script>
    $(function () {
        $("#login").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            errorElement: "span",
            messages: {
                name: {
                    required: "请输入用户名",
                    minlength: "用户名必需由两个字母组成"
                },
                password: {
                    required: "请输入密码",
                    minlength: "密码长度不能小于 6 个字母"
                }
            }
        });
    });
</script>

</body>
</html>
