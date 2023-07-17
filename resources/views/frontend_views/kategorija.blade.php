<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  @foreach ($news as $item)
    <div class="news-container">
        <h2>{{ $item->title }}</h2>
        <p>{{ $item->content }}</p>
        <!-- Other news details -->
    </div>
@endforeach
</body>
</html>