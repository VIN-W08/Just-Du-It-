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
        <form class="search">
            <input type="text" name="search" value="{{Request::input('search')}}"> 
            <button type="submit">Search</button>
        </form>
        <ul>
            @auth
                <a href="">{{Auth::user()->username}}</a>
                <a href="{{Route('logout')}}">logout</a>
            @else
                <li><a href="{{Route('login')}}">Login</a></li>
                <li><a href="{{Route('register')}}">Register</a></li>
            @endauth
        </ul>
    </div>
    <div class="content">
        <ul>
            @auth
                <li><a href="{{Route('home')}}">View All Shoe</a></li>
                @if(auth()->user()->role == "member")
                    <li><a href="{{Route('viewCart')}}">View Cart</a></li>
                @else
                    <li><a href="{{Route('addShoe')}}">Add Shoe</a></li>
                @endif
                <li><a href="{{Route('viewTransaction')}}">View Transaction</a></li>
            @else
                <li><a href="{{Route('home')}}">View All Shoe</a></li>
            @endauth
            
        </ul>
        @yield("page")
    </div>
</body>
</html>