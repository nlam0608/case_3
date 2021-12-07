@extends('master')
@section('content-admin')
<table class="table">
    <h3>Sachs hóa đơn</h3>
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Thếu VAT</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Tiền</th>
        <th scope="col">Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill)
    <tr>
        <th scope="row">{{ $bill->id }}</th>
        <td>{{number_format($bill->vat)}}đ</td>
        <td>{{$bill->totalQuantity}}</td>
        <td>{{number_format($bill->totalPriceBill)}}đ</td>
        <td>{{$bill->status}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
