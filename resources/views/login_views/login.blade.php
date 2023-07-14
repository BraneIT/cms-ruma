<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
        <img src="{{asset('images/mit.png')}}" alt="" srcset="" class="logo">
        </div>
    <form action="/auth" method="post" class="form">
        @csrf
        <input type="text" name="username" placeholder="UserName" class="form-input">
        @error('username')
            <span>{{ $message }}</span>
        @enderror
        <input type="password" name="password" placeholder="Password">
        @error('password')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit" class="button">Login</button>
    </form>
    </div>
</body>
</html>