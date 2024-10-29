<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\Item;
use App\Models\Whishlist;
use App\Models\User;
use App\Models\Bank;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class WhishlistController extends Controller
{
    public function save(Request $request, $id): RedirectResponse
    {   
        $whislist = new Whishlist();
        $whislist->userid = Auth::id();
        $whislist->bikeid = $id;
        $whislist->save();

        flash('Success! Product added to your Whishlist.')->success();
        return redirect()->back();
    }

    public function showAll(Request $request): View
    {   
        $viewData['whislist'] = Whishlist::with('bike')->where('userid', Auth::id())->paginate(12);

        $cartBikeData = $request->session()->get('cart_bike_data');
        $viewData['cartCount'] = 0;

        if ($cartBikeData) {
            $cartBike = Bike::whereIn('id', array_keys($cartBikeData))->get();
            $total = 0;
            foreach ($cartBike as $key => $value) {
                $total = $total + ($cartBikeData[$value->getId()] * $value->getPrice());
                $viewData['cartCount'] = $viewData['cartCount'] + $cartBikeData[$value->getId()];
            }
            $viewData['cartBike'] = $cartBike;
            $viewData['total'] = $total;
        }
        $viewData['cartBikeData'] = $cartBikeData;

        return view('user.whislist.showAll')->with('viewData', $viewData);
    }

    public function remove(Request $request, $id): RedirectResponse
    {   
        $whislist = Whishlist::where('id', $id)->first();
        $whislist->delete();

        flash('Success! Product deleted from your Whishlist.')->success();
        return redirect()->back();
    }
}
