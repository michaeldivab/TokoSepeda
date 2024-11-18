<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Models\Bike;
use App\Models\Part;
use App\Models\Order;
use App\Models\User;
use App\Models\Bank;

class AdminController extends Controller
{
    public function index(): View
    {	
    	$data = [
    		"bikes" 	=> Bike::all(),
    		"parts" 	=> Part::all(),
    		"orders" 	=> Order::all(),
    		"users" 	=> User::all(),
            "banks"     => Bank::all(),
            "payments"     => Order::where('payment_status', 2)->get(),
    	];

        return view('admin.index', compact('data'));
    }
}
