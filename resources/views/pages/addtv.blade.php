<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('adduser')}}" method="POST">
         {!! csrf_field() !!}
        <label for="">Fullname</label>
        <input type="text" name="fullname">
        <label for="">email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password">
        <button type="submit">Lưu</button>
    </form>
</body>
</html>