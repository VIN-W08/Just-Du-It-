@extends("my-layouts.master-in")

@section("title","Cart")

@section("page")
    this is edit shoe page
    <div class="edit-container">
        <div class="shoe-container">
            <img src="{{asset('images/'.$shoe->image)}}" alt="{{$shoe->name}}">
            <h2>{{$shoe->name}}</h2>
            <h2>{{$shoe->price}}</h2>
            <h3>{{$shoe->description}}</h3>
            <form action="{{Route('updateCart')}}">
                <label>Shoe Name</label>
                <input type="text">{{$shoe->name}}</input>
                <label>Price</label>
                <input type="number">{{$shoe->price}}</input>
                <label>Description :</label>
                <input type="text">{{$shoe->description}}</input>
                <input type="file" name="image">
                <input type="hidden" name="itemId" value="{{$item->id}}">
                <button>Update Shoe!</button>
            </form>
        </div>
    </div>
@endsection