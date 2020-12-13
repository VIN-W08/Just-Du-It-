@extends("my-layouts.master-in")

@section("title","Add to Cart")

@section("page")
    <h2>Add To Cart</h2>
    <div class="add-to-cart-container">
        <img src="{{asset('images/'.$shoe->image)}}" alt="{{$shoe->name}}">
        <h3>{{$shoe->name}}</h3>
        <span>Price : Rp {{$shoe->price}}</span>
        <span>Description :</span>
        <span>{{$shoe->description}}</span>
        <form action="{{Route('createCartAndItem')}}" method="post">
            @csrf
            <input type="hidden" name="shoeId" value="{{$shoe->id}}">
            <label>Quantity</label>
            <input type="number" name="quantity">
            <button type="submit">Add To Cart</button>
        </form>
    </div>
@endsection