@extends('master')
@section('content-admin')
    <form action="{{route('bill.createBill')}}" method="post">
        @csrf
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Tên đồ uống</th>
                                <th scope="col">Giá tiền</th>
                                <th scope="col" class="text-center">Số Lượng</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($oldCart)
                                @foreach($oldCart['items'] as $key => $item)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 100px"/>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><input class="form-control" type="text" value="1"/></td>
                                        <td class="text-right"><a href="{{ route('cart.remove', $key) }}">
                                                <i class="fa fa-trash"></i>
                                            </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <p>Không có sản phẩm</p>
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Số lượng :</td>
                                <td class="text-right">{{$oldCart['totalQuantity']}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Tổng Tiền</strong></td>
                                <td class="text-right"><strong>{{ number_format($oldCart['totalMoney']) }}đ</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 text-right">
                            <button class="btn btn-lg btn-block btn-success text-uppercase">Tạo háo đơn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


