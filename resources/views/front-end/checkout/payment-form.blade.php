@extends('front-end.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br/>
                <div class="well text-center text-success">
                    Dear <strong>{{ Session::get('customerName') }} </strong>, You have to give us product payment Info to complete your valuable Order.
                </div>
            </div>
        </div>

        <div class="row">
            <br/>
            <div class="col-md-6 col-md-offset-3 well">
                <br/>
                <h3 class="text-center text-success">Payment Form</h3>
                <hr/>
                <form class="form-horizontal" action="{{ route('new-order') }}" method="POST">
                    {{ csrf_field() }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Cash On Delivery</th>
                            <td><input type="radio" name="payment_type" value="Cash"></td>
                        </tr>
                        <tr>
                            <th>Paypal</th>
                            <td><input type="radio" name="payment_type" value="Paypal"></td>
                        </tr>
                        <tr>
                            <th>Bkash</th>
                            <td><input type="radio" name="payment_type" value="Bkash"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" name="btn" value="Confirm Order" class="btn btn-success"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection