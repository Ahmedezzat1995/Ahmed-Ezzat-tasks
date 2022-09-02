@extends('layouts.parent')

@section('title', 'edit Product')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@section('content')
    <div class="col-12">
        <form action="{{route('products.update',$products->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="col-6">
                   <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" value="{{$products->name_en}}" class="form-control" placeholder=""
                        aria-describedby="helpId">
                        @error('name_en')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="name_ar">Name (AR)</label>
                    <input type="text" name="name_ar" id="name_ar" value="{{$products->name_ar}}" class="form-control" placeholder=""
                        aria-describedby="helpId" >
                    @error('name_ar')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="code">Code</label>
                    <input type="number" name="code" id="code" value="{{$products->code}}" class="form-control" placeholder=""
                        aria-describedby="helpId" >
                    @error('code')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" value="{{$products->price}}" class="form-control" placeholder=""
                        aria-describedby="helpId" >
                    @error('price')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{$products->quantity}}" class="form-control" placeholder=""
                        aria-describedby="helpId" >
                    @error('quantity')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option @selected($products->status == 1) value="1"> Active </option>
                        <option @selected($products->status == 0) value="0"> Not Active </option>
                    </select>
                    @error('status')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="brand_id">Brands</label>
                    
                    <select name="brand_id" id="brand_id" class="form-control">
                    @foreach($brands as $brand)
                    <option @selected($products->brand_id == $brand->id) value="{{$brand->id}}">{{$brand->name_en}}--{{$brand->name_ar}}</option>
                    @endforeach
                    </select>
                    @error('brand_id')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="sub_catogrie_id">Sub Category</label>
                    <select name="sub_catogrie_id" id="sub_catogrie_id" class="form-control">
                    @foreach($subcatogries as $sub)
                    <option @selected($products->sub_catogrie_id == $sub->id) value="{{$sub->id}}">{{$sub->name_en}}--{{$sub->name_ar}}</option>
                    @endforeach   
                    </select>
                    @error('subcategory_id')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="details_en">Details (EN)</label>
                    <textarea name="details_en" id="details_en"  class="form-control" cols="30" rows="10">{{$products->details_ar}}</textarea>
                    @error('details_en')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="details_ar">Details (AR)</label>
                    <textarea name="details_ar" id="details_ar"  class="form-control" cols="30" rows="10">{{$products->details_ar}}</textarea>
                    @error('details_ar')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                <label for="image">Image</label>
                    <img src="{{asset('images/product/'.$products->image)}}" class="w-100" alt="">
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary my-4"> edit </button>
        </form>
    </div>
@endsection