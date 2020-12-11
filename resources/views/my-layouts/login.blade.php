@extends("my-layouts.master")

@section("title","login")

@section("content")
    <div class="login-container">
        <h4>Login</h4>
        <form action="{{Route('login')}}" method="post">
            @csrf
            <label>E-Mail Address</label>
            <input type="email" name="email">
            <label>Password</label>
            <input type="password" name="password">
            <input type="checkbox" name="remember_me">
            <label>Remember Me</label>
            <Button type="submit" name="login">Login</Button>
        </form>
    </div>
@endsection