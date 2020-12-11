<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
</head>
<body>
    <div class="navbar">
        <img src="{{asset('images/Just Du It ! Logo.jpg')}}" alt="Just Du It Logo">
        <ul>
            <li><a href="{{Route('login')}}">Login</a></li>
            <li><a href="{{Route('register')}}">Register</a></li>
        </ul>
    </div>
    <div class="content">
        @yield("content")
    </div>
    
</body>
</html>