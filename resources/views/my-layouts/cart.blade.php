@extends("my-layouts.master-in")

@section("title","Cart")

@section("page")
    <h2>View Cart</h2>
    <div class="cart-container">
        @foreach($items as $item)
            <div class="shoe-container">
                <img src="{{asset('images/'.$item->Shoe->image)}}" alt="{{$item->Shoe->name}}">
                <span>{{$item->Shoe->name}}</span>
                <span>{{$item->quantity}}</span>
                <span>{{$item->Shoe->price}}</span>
                <form action="{{Route('editCart')}}">
                    <input type="hidden" name="itemId" value="{{$item->id}}"/>
                    <button type="submit">Edit</button>
                </form>
            </div>
        @endforeach
        @if(!empty($carts))
            <button>Check Out</button>
        @endif
    </div>
@endsection