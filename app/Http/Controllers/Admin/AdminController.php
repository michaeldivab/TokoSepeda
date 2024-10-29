<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Models\Bike;
use App\Models\Part;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function index(): View
    {	
    	$data = [
    		"bikes" 	=> Bike::get(),
    		"parts" 	=> Part::get(),
    		"orders" 	=> Order::get(),
    		"users" 	=> User::get(),
    	];

        return view('admin.index', compact('data'));
    }
}
