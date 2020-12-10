@extends("my-layouts.master-in")

@section("title","Cart")

@section("page")
    this is cart page
    <div class="cart-container">
        @foreach($items as $item)
            <div class="shoe-container">
                <span>{{$item->Shoe->name}}</span>
                <button>Edit</button>
            </div>
        @endforeach
        @if(!empty($carts))
            <button>Check Out</button>
        @endif
    </div>
@endsection