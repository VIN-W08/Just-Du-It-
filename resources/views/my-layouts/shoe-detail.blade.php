@extends("my-layouts.master-in")

@section("title","home")

@section("page")
    this is shoe detail page
    <div class="detail-container">
        <img src="{{asset('images/'.$shoe->image)}}" alt="{{$shoe->name}}">
        <h3>{{$shoe->name}}</h3>
        <span>Price : Rp {{$shoe->price}}</span>
        <span>Description :</span>
        <span>{{$shoe->description}}</span>
    </div>
    @auth 
    <form action="{{Route('goToCart')}}">
        <input type="hidden" name="shoeId" value="{{$shoe->id}}">
        <button type="submit">Add To Cart</button>
    </form>
    @endauth
@endsection