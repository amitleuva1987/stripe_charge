@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 ">
            <div class="card p-3 mb-3">
                <h2 class="text-md">{{ $product->name }}</h2>
                <h4>INR.{{ $product->price }}</h4>
                <p>{{ $product->description }}</p>
                <a href="{{ route('product.show',$product->id) }}" class="btn btn-primary">Buy Now</a>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection