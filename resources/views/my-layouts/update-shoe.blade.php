@extends("my-layouts.master-in")

@section("title","Cart")

@section("page")
    this is update shoe page
    <div class="update-container">
        <div class="shoe-container">
            <img src="{{asset('images/'.$shoe->image)}}" alt="{{$shoe->name}}">
            <h2>{{$shoe->name}}</h2>
            <h2>{{$shoe->price}}</h2>
            <h3>{{$shoe->description}}</h3>
            <form action="{{Route('makeUpdateShoe')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="shoeId" value="{{$shoe->id}}">
                <label">Shoe Name</label>
                <input type="text" name="name" value="{{$shoe->name}}">
                <label>Price</label>
                <input type="number" name="price" value="{{$shoe->price}}">
                <label>Description :</label>
                <input type="text" name="description" value="{{$shoe->description}}">
                <input type="file" name="image">
                <button type="submit" name="updateShoe">Update Shoe!</button>
            </form>
        </div>
    </div>
@endsection