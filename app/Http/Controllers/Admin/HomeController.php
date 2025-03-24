<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count['pending_orders'] = Order::where('payment_status','pending')->sum('total_price');
        $count['completed_orders'] = Order::where('payment_status','completed')->sum('total_price');
        $count['orders'] = Order::count();
        $count['products'] = Product::count();
        $count['users'] = User::where('role',array_flip(User::ROLES)['user'])->count();
        $count['inquiries'] = Inquiry::count();
        $count['total_billing'] = Order::sum('total_price');
        return view('admin.home', compact('count'));
    }
}
