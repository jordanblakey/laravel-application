<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Page</title>
    </head>
    <body>
        <h1>My Webpage</h1>
        @if($var1 =='Hamburger')
            I love hamburgers<br>
        @endif

        {{ $var1 }}<br>
        {{ $var2 }}<br>
        {{ $var3 }}<br>
        <ul>
            @foreach($orders as $order)
                <li>{{ $order->name }}</li>
            @endforeach
        </ul>
    </body>
</html>
