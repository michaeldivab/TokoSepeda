<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assembly;
use App\Models\Bike;
use App\Models\Item;
use App\Models\Part;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function showUnpayment(): View
    {
        $viewData['orders'] = Order::with('items.bike')->where('payment_status', 0)->get();
        $viewData['title'] = "Order Unpayment";

        return view('admin.orders.unpayment')->with('viewData', $viewData);
    }

    public function showPayment(): View
    {
        $viewData['orders'] = Order::with('items.bike')->where('payment_status', 1)->get();
        $viewData['title'] = "Order Payment";

        return view('admin.orders.payment')->with('viewData', $viewData);
    }

    public function showDelivery(): View
    {
        $viewData['orders'] = Order::with('items.bike')->where('payment_status', 2)->where('order_status', 1)->get();
        $viewData['title'] = "Order on Delivery";

        return view('admin.orders.onDelivery')->with('viewData', $viewData);
    }

    public function showSuccess(): View
    {
        $viewData['orders'] = Order::with('items.bike')->where('payment_status', 2)->where('order_status', 2)->get();
        $viewData['title'] = "Order Success";

        return view('admin.orders.success')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData['bike'] = Bike::with('reviews', 'assemblies')->find($id);
        $viewData['title'] = 'Bike';

        return view('admin.bike.show')->with('viewData', $viewData);
    }

    public function update(string $id): View
    {

    }

    public function saveUpdatePayment(Request $request, string $id): RedirectResponse
    {   
        if ($request->status == 1) {
            $status = 2;
            $orderStatus = 1;
            flash('Success! Payment Allready Accepted, and Move to Delivered Order.')->success();
        }
        else{
            $status = 0;
            $orderStatus = 0;
            flash('Updated! Payment Not Accepted, and Returned to Unpayment Order (Waiting User to Process Payment Again.')->error();
        }

        $order = Order::where('id', $id)->first();
        $order->payment_status  = $status;
        $order->order_status    = $orderStatus;
        $order->payment_notes   = $request->notes;
        $order->resi            = $request->resi;
        $order->save();

        return redirect()->back();
    }

    public function saveRemoveDelivery(Request $request, string $id): RedirectResponse
    {   
        $order = Order::where('id', $id)->first();
        $order->payment_status  = 1;
        $order->order_status    = 0;
        $order->resi            = '-';
        $order->save();

        flash('Returned! Delivery Order has Been Canceled due to Failure.')->warning();
        return redirect()->back();
    }

    public function saveCloseDelivery(Request $request, string $id): RedirectResponse
    {   
        $order = Order::where('id', $id)->first();
        $order->order_status    = 2;
        $order->save();

        flash('Success! Delivery Order has been Closed and move as Succesfully/Finished Order.')->success();
        return redirect()->back();
    }

    public function create(): View
    {

    }

    public function save(Request $request): RedirectResponse
    {

    }

    public function remove(string $id): RedirectResponse
    {   
        $order = Order::where('id', $id);
        if ($order->first()->order_status != 0) {
            flash('Fail! Cant delete order, because allready in process.')->error();
            return redirect()->back();
        }

        $bikeItems = Item::where('order_id', $id)->get();

        foreach ($bikeItems as $key => $value) {
            $bike = Bike::where('id', $value->bike_id)->first();

            $bike->ordercount = $bike->ordercount + $value->quantity;
            $bike->save();
        }
        
        $order->delete();

        return redirect()->back();
    }
}
