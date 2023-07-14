<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container">
    <div class="menu">
        <div class="logo-container">
            
        <img src="{{asset('images/mit.png')}}" alt="" srcset="" class="logo">
        </div>

        <div class="menu-container">
        <a href="/dashboard/news">lista vijesti</a>
        <a href="/dashboard/public_procurements">lista javnih nabavki</a>
        <a href="/dashboard/admins">Lista admina</a>
        <a href="/">Podesavanja</a>
        </div>
    </div>
    <div class="add_news_wrapper">

    <div class="info">
        <p>trenutno prijavljen: {{$fullName}}</p>        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
    <div class="add_news_container">
        <form action="{{ route('update_news', $news->id) }}" enctype="multipart/form-data" method="POST" class="add_news_form">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ $news->title }}">
             <input type="text" name="category" value="{{ $news->category}}">
              <div class="choose_file">
               <p class="upload_image"> Izaberite sliku</p>
                <input type="file" name="image" id="" class="hide_file">
            </div>
            <textarea name="content" class="content">{{ $news->content }}</textarea>

            <button type="submit" class="logout-button">Izmijeni</button>
        </form>
        </div>
    </div>
    </div>
</body>
</html>