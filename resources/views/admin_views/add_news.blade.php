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
        <form action="{{ route('store_news') }}" method="post" enctype="multipart/form-data" class="add_news_form">
            @csrf
            <input type="text" name="title" placeholder="Naslov">
            <select name="category_id" class="dropdown">
                <option value="">Izaberite kategoriju</option>
           
                @foreach($categories as $item)
                <option value="{{ $item->id }}">{{$item->category}}</option>
                @endforeach
            </select>
            <div class="choose_file">
                 <p class="upload_image"> Izaberite sliku</p>
                <input type="file" name="image" id="" class="hide_file">
            </div>
            <textarea type="text" name="content" placeholder="Sadrzaj" class="content"></textarea>
            <button type="submit" class="logout-button">Dodaj vijest</button>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul><div class="error">
            @foreach ($errors->all() as $error)
                
                    <p>{{ $error }}</p>
                
            @endforeach
            </div>
        </ul>
    </div>
@endif
        </form>
    </div>
    </div>
    </div>
</body>
</html>
