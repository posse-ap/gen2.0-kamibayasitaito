<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @isset ($msg )
    <p>こんにちは{{$msg}}さん</p>
    @else
    <p>なんか書け</p>
    @endif
    <form method="post" action="/hello" >
        @csrf 
        <input type="text" name="msg">
        <input type="submit">



    </form>

</body>
</html>