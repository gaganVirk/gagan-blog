<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{

    public function sendEmail() {

        $data = [
            'name' => 'Gagan',
            'verification' => 'sdfsdf'
        ];

        $to_email = "gagan@ocular.nz";

        Mail::to($to_email)->send(new OrderShipped($data)); 
       

        if(Mail::failures() != 0) {
            return "<p> Success! Your E-mail has been sent.</p>";
        }

        else {
            return "<p> Failed! Your E-mail has not sent.</p>";
        } 
        return view('pages.contact');

    }

    /**
     * Ship the given order.
     * 
     * @param Request $request
     * @param int $orderId
     * @return Response
     */
    public function ship(Request $request, $orderId) {
        $order = Order::findOrFail($orderId);

        // Ship order...

        Mail::to($request->user())->send(new OrderShipped($order));
    }
}
