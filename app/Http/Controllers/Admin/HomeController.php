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

    public function user_activities_report()
    {
        $user_activities = User::all();

        return view('admin.reports.user_activities_report', compact('user_activities'));
    }

    public function billing_report()
    {
        $billing_report = Order::all();

        return view('admin.reports.billing_report', compact('billing_report'));
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function order_summary_report()
    {
        $orders = Order::all();

        return view('admin.reports.order_summary_report', compact('orders'));
    }

    public function product_sales_report()
    {
        $products = Product::all();

        return view('admin.reports.product_sales_report', compact('products'));
    }

    public function top_selling_products()
    {
        $products = Product::orderBy('total_sold', 'desc')->get();

        return view('admin.reports.top_selling_products', compact('products'));
    }
}
