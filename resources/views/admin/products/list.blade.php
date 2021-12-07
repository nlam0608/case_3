@extends('master')
@section('content-admin')
    <div class="card">
        <div class="card-body">
            <h3>Thực đơn</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>

                        <td>
                            @if($product->image)
                                <img src="{{asset('storage/' . $product->image)}}" alt="" width="100 rem" height="100 rem">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }} đ</td>
                        <td><a href="{{ route('products.edit', $product->id) }}">
                                <button type="button" class="btn btn-warning"> Sửa</button>
                            </a></td>
                        <td><a href="{{ route('products.delete',$product->id) }}">
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </a></td>
                    </tr>
                @endforeach
                {{$products->links()}}
                </tbody>
            </table>
        </div>
    </div>

@endsection
