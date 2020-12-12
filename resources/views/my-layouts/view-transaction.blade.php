@extends("my-layouts.master-in")

@section("title","Transaction")

@section("page")
    <h2>View All Cart</h2>
    <div class="transactions-container">
        @isset($items)
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
            <form action="{{Route('checkOut')}}" method="post">
                @csrf
                <input type="hidden" name="cartId" value="{{$cartId}}"/>
                <button type="submit">Check Out</button>
            </form>
        @endisset
    </div>
@endsection