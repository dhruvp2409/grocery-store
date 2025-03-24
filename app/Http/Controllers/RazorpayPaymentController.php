<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class RazorpayPaymentController extends Controller
{
    public $api;


    public function __construct($foo = null)
    {
        $this->api = new Api("rzp_test_Lc1AqxPfJ51UeX", "AWy5C8aTGL6EgFrcIug3juuS");
    }

    public function createOrder(Request $request)
    {
        try {
            $order = $this->api->order->create([
                'receipt' => 'order_' . uniqid(),
                'amount' => $request->amount * 100, // Amount in paise (multiply by 100)
                'currency' => 'INR',
                'payment_capture' => 1
            ]);

            // Return the order ID and amount to the frontend
            return response()->json([
                'success' => true,
                'order_id' => $order['id'],
                'amount' => $request->amount
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        $payment_id = $request->get('payment_id');
        $order_id = $request->get('order_id');
        dd($payment_id,$order_id);

        if ($status->status == 'captured') {
            $email = Session::get('email');
            $name = Session::get('name');
            $mobile = Session::get('mobile');
            $password = Session::get('pass_key');
            $price = Session::get('key');
            $businessId = Session::get('business_id');


            $qty = ($status->amount / $price) / 100;
            $today_date = Carbon::today();
            $plan = Session::get('plan_key');

            $end_date = null;

            if (Str::contains($plan, 'Mon')) {
                // For monthly plan, add one month to the start date
                $end_date = $today_date->copy()->addMonth();
            } elseif (Str::contains($plan, 'Ann')) {
                // For annual plan, add one year to the start date
                $end_date = $today_date->copy()->addYear();
            }

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'password' => Hash::make($password),
            ]);

            $user->roles()->sync([array_flip(User::ROLES)['User']]);

            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => $status['notes']['order_number'],
                'digital_card_plan_id' => $businessId,
                'start_date' => $today_date,
                'end_date' => $end_date,
                'amount'  => $price,
                'qty'  => $qty,
                'remaining_qty'=>$qty,
                'total_amount' => ($status->amount)/100,
                'order_status' => Order::ORDER_STATUS['confirm'],
            ]);

            return redirect()->route('login');
        }

        return redirect()->route('front.home')->with('error', trans('label.payment_failed'));
    }
}
