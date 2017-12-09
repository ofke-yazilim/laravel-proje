<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proje Anasayfa</title>
</head>
<body>
    <div class="container">
        <!-- chunk methodu belirtilen sayıya uygun olarak collectionu gruplar-->
        @foreach($collection->chunk(3) as $collect)
        <div class="row">
            @foreach($collect as $value)
               <div class="col-md-12">
                   {{$value}}
               </div>
            @endforeach
        </div>
        @endforeach
    </div>
</body>
</html>

