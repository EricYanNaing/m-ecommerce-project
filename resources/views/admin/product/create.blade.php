@extends('admin.layout.master')
@section('css')
@endsection
@section('content')
    <div>
        <a href="{{route('product.index')}}" class="btn btn-dark">All Product</a>
    </div>
    <hr>
    <form action="{{route('product.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-7">
                <div class="card p-4">
                    <small class="text-muted">Product Info</small>
                    <div class="form-group">
                        <label for="">Enter Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Choose Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Product Description</label>
                        <textarea  name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card p-4">
                    <small class="text-muted">Product Pricing</small>
                    <div class="form-group">
                        <label for="">Total Quantity</label>
                        <input type="number" name="total_quantity" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Buy Price</label>
                        <input type="number" name="buy_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Sale Price</label>
                        <input type="number" name="sale_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Discount Price</label>
                        <input type="number" name="discount_price" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card p-4">
                    <small class="text-muted">Product Info</small>
                    <div class="form-group">
                        <label for="">Choose Supplier</label>
                        <select class="form-select" name="supplier_slug" id="supplier">
                            @foreach($supplier as $s)
                                <option value="{{$s->slug}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Category</label>
                        <select class="form-select" name="category_slug" id="category">
                            @foreach($category as $c)
                                <option value="{{$c->slug}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Category</label>
                        <select class="form-select" name="brand_slug" id="brand">
                            @foreach($brand as $b)
                                <option value="{{$b->slug}}">{{$b->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Color</label>
                        <select class="form-select" name="color_slug" id="color" multiple>
                            @foreach($color as $b)
                                <option value="{{$b->slug}}">{{$b->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
@endsection
@section('script')
    <script>
        $(function (){
            $('#supplier').select2();
            $('#category').select2();
            $('#brand').select2();
            $('#color').select2();
        })
    </script>
@endsection
