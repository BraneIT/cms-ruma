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
    <div class="news-wrapper">

    <div class="info-container">

    <div class="info">
    <p>trenutno prijavljen: {{$fullName}}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
    </div>
    <div class="search">
        <form action="/search" method="GET" class="search_form">
            <input type="text" name="query" placeholder="Pretrazi vijest...">
            <button type="submit" class="logout-button">Search</button>
        </form>
    </div>
    <div class="add_news">
      <a href="/dashboard/add_news">Dodaj vijest</a>
    </div>
    </div>

    
    
    <div class="news-container">
        @if($noResults)
            <p class="failed_search">Trazeni naslov nije pronadjen</p>
        @else
            @foreach($news as $item)
                <div class="news-item">
                    <div class="news-top">
                        <img src="{{ asset('storage/'. $item->image) }}" alt="Image" srcset="" class="news-image">
                        <div class="info-containerr">
                            <p class="info-title">{{ $item->title }}</p>
                        </div>
                        <div class="btns-container">
                        <a href="{{ route('edit_news', $item->id) }}" class="edit_btn">Izmijeni vijest</a>
                        <form action="{{ route('delete_news', $item->id) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Obrisi vijest</button>
                        </form>
                        </div>
                    </div>
                    <div class="news-bottom">
                        <div class="news-bottom-wrapper">
                            <p>Kreator: {{$item->created_by}}</p> 
                            <p>Datum kreiranja: {{$item->created_at}}</p>
                        </div>
                    </div>
                <!-- <p>{{ $item->title }}</p>
                <img src="{{ asset('storage/' . $item->image) }}" alt="Image" srcset="" class="news-image">
                <p>{{$item->content}}</p>
                <p>{{$item->created_by}}</p> -->
                </div>
            @endforeach
        @endif
    </div>
    </div>
</body>
</html>