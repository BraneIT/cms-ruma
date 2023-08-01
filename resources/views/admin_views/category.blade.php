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
        <a href="/dashboard/categories">kategorije vesti</a>
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
    
    <div class="add_news">
      <a href="/dashboard/categories/add">Dodaj kategoriju</a>
    </div>
    </div>

    
    
    <div class="news-container">
            @foreach($categories as $item)
                <div class="category_wrapper">

                   <p>{{$item->category}} </p> 
                    <div class="btns-container">
                        <a href="{{ route('show_edit_categories', $item->id) }}" class="edit_btn">Izmijeni kategoriju</a>
                        <form action="{{ route('delete_categories', $item->id) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Obrisi kategoriju</button>
                        </form>
                        </div>
                </div>
                        
                      
                    
                  
                    
                <!-- <p>{{ $item->title }}</p>
                <img src="{{ asset('storage/' . $item->image) }}" alt="Image" srcset="" class="news-image">
                <p>{{$item->content}}</p>
                <p>{{$item->created_by}}</p> -->
                
            @endforeach
            
    </div>
    </div>
</body>
</html>