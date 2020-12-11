@extends("my-layouts.master-in")

@section("title","home")

@section("page")
    <h2>View Shoe</h2>
    @foreach($shoes as $shoe)
        <div class="card-container">
            <image src="{{asset('images/'.$shoe->image)}}" alt="{{$shoe->name}}">
            <form action="{{Route('detail')}}">
                <input type="hidden" name="shoeId" value="{{$shoe->id}}">
                <button type="submit">{{$shoe->name}}</button>
            </form>
            <span>Rp. {{$shoe->price}}</span>
        </div>
    @endforeach
    {{$shoes->withQueryString()->links()}}
@endsection
