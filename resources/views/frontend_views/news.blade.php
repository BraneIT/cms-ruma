<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($news as $item)
    <a href="{{ route('news.show', ['id' => $item->id]) }}">
        <div class="newscontainer">
            <p>{{$item->title}}</p>
            <p>{{$item->content}}</p>
            <p>{{$item->category}}</p>
            <p>{{$item->created_by}}</p>
            <p>{{$item->created_at}}</p>
        </div></a>
    @endforeach
</body>
</html>
