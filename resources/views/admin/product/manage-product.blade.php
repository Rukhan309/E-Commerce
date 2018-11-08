@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Product</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{ Session::get('message') }}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->brand_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td><img src="{{ asset($product->product_image) }}" alt="" height="80" width="80"></td>
                            <td>{{ $product->publication_status }}</td>
                            <td>
                                <a href="{{ route('view-product', ['id'=>$product->id]) }}" class="btn btn-info btn-xs" title="View Product Details">
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                <a href="" class="btn btn-primary btn-xs" title="Published Product">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                <a href="{{ route('edit-product', ['id'=>$product->id]) }}" class="btn btn-success btn-xs" title="Edit Product">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="" class="btn btn-danger btn-xs" title="Delete Product">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection