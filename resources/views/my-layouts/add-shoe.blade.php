@extends("my-layouts.master-in")

@section("title","Cart")

@section("page")
    this is add shoe page
    <div class="add-shoe-container">
        <h4>Add Shoe</h4>

        <form action="{{Route('uploadShoe')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(!empty($errors->get("name")))
                @foreach($errors->get("name") as $error)
                    {{$error}}
                @endforeach
            @endif
            <label>Shoe Name</label>
            <input type="text" name="name">
            @if(!empty($errors->get("price")))
                @foreach($errors->get("price") as $error)
                    {{$error}}
                @endforeach
            @endif
            <label>Price</label>
            <input type="number" name="price">
            @if(!empty($errors->get("description")))
                @foreach($errors->get("description") as $error)
                    {{$error}}
                @endforeach
            @endif
            <label>Description</label>
            <input type="text" name="description"> 
            @if(!empty($errors->get("image")))
                @foreach($errors->get("image") as $error)
                    {{$error}}
                @endforeach
            @endif
            <input type="file" name="image">
            <Button type="submit" name="addShoe">Add Shoe</Button>
        </form>
    </div>
@endsection