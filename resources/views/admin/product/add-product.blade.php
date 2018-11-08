@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Product Form</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{ Session::get('message') }}</h3>
                    {{ Form::open(['route'=>'new-product', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="category_id">
                                    <option>---Select Category Name---</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="brand_id">
                                    <option>---Select Brand Name---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" name="product_name" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Product Price</label>
                            <div class="col-md-8">
                                <input type="text" name="product_price" class="form-control"/>
                                <span>{{ $errors->has('product_price') ? $errors->first('product_price') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Product Quantity</label>
                            <div class="col-md-8">
                                <input type="number" name="product_quantity" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Short Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">long Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="editor" name="long_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Product Image</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image" accept="image/*"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Publication status</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" checked name="publication_status" value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Product Info"/>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection