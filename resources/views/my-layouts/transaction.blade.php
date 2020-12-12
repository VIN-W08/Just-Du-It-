@extends("my-layouts.master-in")

@section("title","Transaction")

@section("page")
    <h2>View All Transaction</h2>
    <div class="transactions-container">
        @isset($transactions)
            @foreach($transactions as $transaction)
                <div class="transaction-container">
                    <p>{{$transaction->created_at}}Total Rp. {{$transaction->totalPrice}}</p>
                    @foreach($transactionItems as $transactionItem)
                        @if($transactionItem->Transaction == $transaction)
                            <img src="{{asset('images/'.$transactionItem->Shoe->image)}}" alt="{{$transactionItem->Shoe->name}}">
                        @endif
                    @endforeach
                </div>
            @endforeach
        @endisset
    </div>
@endsection