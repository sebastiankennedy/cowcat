<html>
<head>
    <title></title>
</head>
<body>
<p>
    你好,{{$name}},这是一封测试邮件。
    下面将会显示一张原始数据图片
</p>
<p>
    <img src="{{$message->embed($icon)}}" alt="原始数据图片">
</p>
</body>
</html>