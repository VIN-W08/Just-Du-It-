@extends("my-layouts.master")

@section("title","register")

@section("content")
    <div class="register-container">
        <h4>Register</h4>

        <form action="{{Route('register')}}" method="post">
            @csrf
            @if(!empty($errors->get("username")))
                @foreach($errors->get("username") as $error)
                    {{$error}}
                @endforeach
            @endif
            <label>Username</label>
            <input type="text" name="username">
            @if(!empty($errors->get("email")))
                @foreach($errors->get("email") as $error)
                    {{$error}}
                @endforeach
            @endif
            <label>E-Mail Address</label>
            <input type="email" name="email">
            @if(!empty($errors->get("password")))
                @foreach($errors->get("password") as $error)
                    {{$error}}
                @endforeach
            @endif
            <label>Password</label>
            <input type="password" name="password"> 
            <label>Confirm Password</label>
            <input type="password" name="confirm-password"> 
            <Button type="submit" name="register">Register</Button>
        </form>
    </div>
@endsection
