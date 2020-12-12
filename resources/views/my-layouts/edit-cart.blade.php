@extends("my-layouts.master-in")

@section("title","Cart")

@section("page")
    this is edit cart page
    <div class="edit-container">
        <div class="shoe-container">
            <img src="{{asset('images/'.$item->Shoe->image)}}" alt="{{$item->Shoe->name}}">
            <span>{{$item->Shoe->name}}</span>
            <span>Price : Rp. {{$item->Shoe->price}}</span>
            <span>Description :</span>
            <span>{{$item->Shoe->description}}</span>
            <form action="{{Route('updateCart')}}">
                <label>Quantity</label>
                <input type="hidden" name="itemId" value="{{$item->id}}">
                <input type="number" name="quantity" value="{{$item->quantity}}">
                <button>Update Cart</button>
            </form>
            <form action="{{Route('deleteItem')}}">
                <input type="hidden" name="itemId" value="{{$item->id}}">
                <button>Delete</button>
            </form>
        </div>
    </div>
@endsection