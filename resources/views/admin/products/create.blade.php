@extends('master')
@section('content-admin')
    <div class="">
        <h3>Thêm mới sản phẩm </h3>
        <form enctype="multipart/form-data" method="post" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Thể loại</label>
                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Hình Ảnh</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" name="price" class="form-control" aria-describedby="emailHelp">
                @error('pice')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea type="text" name="status" class="form-control"></textarea>
                @error('status')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" onclick="alert('thêm mới sản phảm thành công')">Submit</button>
        </form>
    </div>
@endsection
