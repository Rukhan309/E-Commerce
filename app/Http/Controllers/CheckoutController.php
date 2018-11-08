<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Payment;
use Cart;
use App\OrderDetail;
use App\Shipping;
use Session;
use Illuminate\Http\Request;
use Mail;

class CheckoutController extends Controller
{
    public function index() {
        return view('front-end.checkout.checkout');
    }

    public function saveCustomerInfo(Request $request) {

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = bcrypt($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);
        $data = $customer->toArray();
        Mail::send('front-end.mails.confirmation-mail', $data, function ($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('Congratulation Mail!!!');
        });

        return redirect('/checkout/show-shipping');
    }
    public function showShippingInfo() {
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping-form', ['customer'=>$customer]);
    }
    public function saveShippingInfo(Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/checkout/show-payment');
    }
    public function showPaymentInfo() {
        return view('front-end.checkout.payment-form');
    }
    public function saveOrderInfo(Request $request) {
        $paymentType = $request->payment_type;
        if($paymentType == 'Cash') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('grandTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity	= $cartProduct->qty;
                $orderDetail->save();
            }

            Cart::destroy();

            return redirect('/checkout/complete-order');

        } else if ($paymentType == 'Paypal') {
            return 'In Paypal Method';
        } else if ($paymentType == 'Bkash') {
            return 'In Bkash Method';
        }

    }

    public function completeOrderInfo() {
        return view('front-end.checkout.complete-order');
    }

    public function customerLogout() {
        Session::forget('customerId');
        Session::forget('shippingId');

        return redirect('/');
    }

    public function customerLogin(Request $request) {
        $customer = Customer::where('email_address', $request->email_address)->first();
        if($customer) {
            if (password_verify($request->password, $customer->password)) {
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);

                return redirect('/checkout/show-shipping');
//                return redirect()->route('show-shipping');

            } else {
                return redirect('/checkout')->with('message', 'Password is invalid');
            }
        } else {
            return redirect('/checkout')->with('message', 'Email address is invalid');
        }


    }


}
