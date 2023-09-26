<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body style="background: #F2F2F2;padding:50px; font-family: Arial, Helvetica, sans-serif">

    <div style="width: 600px;margin:0 auto;background: #fff;padding: 30px">
        <p>مرحبا بك محفظ{{ $info['name'] }}:في موقعنا الالكتروني</p>
        <p>بيانات تسجيل الدخول للوحة تحكم الخاص بك </p>
        <p><b>رقم المحفظ:</b> {{ $info['number'] }}</p>
        <p><b>كلمة المرور:</b> {{ $info['password'] }}</p>
        <a style="display: block; width: 50%; border-radius: 50px;background: #8e0d97; color: #fff; text-align: center; padding: 10px; text-decoration: none; margin: 0 auto" href="{{ url('/teacher/login') }}">لوحة تحكم المعلم</a>
        <br>

    </div>

</body>
</html>
