@extends('master');
@section('content-admin');
<div>
    <h3>Sửa sản phẩm </h3>
    <form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên sản phảm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control  @error('name') is-invalid @enderror" >
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Thể Loại</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                @foreach($categories as $category)
                    <option
                        @if($product->category_id == $category->id)
                        selected
                        @endif
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <input type="file" name="image" class="form-control">
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Gía</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control  @error('name') is-invalid @enderror" >
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" name="status" value="{{ $product->status }}" class="form-control  @error('name') is-invalid @enderror" >
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection;
