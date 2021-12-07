@extends('master')
@section('content-admin')
    @if($products->isNotEmpty())
        <div class="container" style="margin-top:50px;">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card-sl">
                            <div class="card-image">
                                @if($product->image)
                                    <img src="{{asset('storage/' . $product->image)}}" style="width:225px; height: 140px">
                                @endif
                            </div>

                            <a class="card-action" href="#"><i class="fa fa-heart"></i></a>
                            <div class="card-heading">
                                <p style="  overflow: hidden;width: 200px; height: 50px">{{ $product->name }}</p>
                            </div>
                            <div class="card-text">
                                <p >{{ number_format($product->price) }}đ</p>
                            </div>
                            <a href="{{  route('cart.addToCart', $product->id)  }}" class="card-button">Đặt món</a>
                        </div>
                    </div>
                @endforeach
            </div>
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
@endsection
