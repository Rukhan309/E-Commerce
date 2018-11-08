@extends('front-end.master')
@section('body')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <br/>
           <table class="table table-bordered">
               <tr class="bg-success">
                   <th>SL No</th>
                   <th>Product Id</th>
                   <th>Product Name</th>
                   <th>Product Price (TK.)</th>
                   <th>Product Quantity</th>
                   <th>Total Price (TK.)</th>
                   <th>Action</th>
               </tr>
               @php($i=1)
               @php($sum = 0)
               @foreach($cartProducts as $cartProduct)
               <tr>
                   <td>{{ $i++ }}</td>
                   <td>{{ $cartProduct->id }}</td>
                   <td>{{ $cartProduct->name }}</td>
                   <td>{{ $cartProduct->price }}</td>
                   <td>
                       {{ Form::open(['route'=>'update-cart', 'method'=>'POST']) }}
                            <input type="number" name="qty" value="{{ $cartProduct->qty }}"/>
                            <input type="hidden" name="row_id" value="{{ $cartProduct->rowId }}"/>
                            <input type="submit" name="btn" value="Update"/>
                       {{ Form::close() }}
                   </td>
                   <td>{{ $total = $cartProduct->qty*$cartProduct->price }}</td>
                   <td>
                       <a href="{{ route('delete-cart-product',['rowId'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs">
                           <span class="glyphicon glyphicon-trash"></span>
                       </a>
                   </td>
               </tr>
                   <?php $sum = $sum+$total; ?>
               @endforeach
           </table>
            <table class="table table-bordered">
                <tr>
                    <th>Sub Total</th>
                    <td>TK. {{ $sum }}</td>
                </tr>
                <tr>
                    <th>Vat Total</th>
                    <td>TK. {{ $vat = 0  }}</td>
                </tr>
                <tr>
                    <th>Grand Total</th>
                    <td>
                        TK. {{ $grandTotal = $sum+$vat }}
                        @php(Session::put('grandTotal', $grandTotal))
                    </td>
                </tr>
            </table>
            <hr/>
            @if(Session::get('customerId') && Session::get('shippingId'))
                <a href="{{ route('show-payment') }}" class="btn btn-success pull-right">Checkout</a>
            @elseif(Session::get('customerId'))
                <a href="{{ route('show-shipping') }}" class="btn btn-success pull-right">Checkout</a>
            @else
                <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout</a>
            @endif
            <a href="{{ route('/') }}" class="btn btn-success">Continue Shopping</a>
            <hr/>
        </div>
    </div>
  </div>
@endsection