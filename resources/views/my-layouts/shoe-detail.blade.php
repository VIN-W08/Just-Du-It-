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
        @if(auth()->user()->role == "member")
            <form action="{{Route('addToCart')}}">
                <input type="hidden" name="shoeId" value="{{$shoe->id}}">
                <button type="submit">Add To Cart</button>
            </form>
        @else
            <form action="{{Route('updateShoe')}}">
                <input type="hidden" name="shoeId" value="{{$shoe->id}}">
                <button type="submit">Update Shoe!</button>
            </form>
        @endif
    @endauth
@endsection