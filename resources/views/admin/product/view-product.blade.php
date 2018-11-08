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
                        <tr>
                            <th>Product Id</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $product->product_name }}</td>
                        </tr>
                        <tr>
                            <th>Category ID</th>
                            <td>demo</td>
                        </tr>
                        <tr>
                            <th>Brand Id</th>
                            <td>demo</td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td>demo</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection