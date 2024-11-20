<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use App\Models\Bank;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function save(Request $request): RedirectResponse
    {   
        if (!isset($request->ongkir)) {
            flash('Sorry! Please Select Courier Type First.')->error();
            return redirect()->back();
        }

        $user = User::find(Auth::id());
        //$balance = $user->getBalance();

        $cartBikeData = $request->session()->get('cart_bike_data');
        $cartBike = Bike::whereIn('id', array_keys($cartBikeData))->get();
        $total = 0;
        foreach ($cartBike as $key => $value) {
            $total = $total + ($cartBikeData[$value->getId()] * $value->getPrice());
        }

        // if ($balance - $total < 0) {
        //     return back()->with('status', 'balance_problem');
        // }

        $ongkir = explode('-', $request->ongkir);

        $order = new Order();
        $order->setTotal($total);
        $order->setAddress($request->address);
        $order->setUserId(Auth::id());
        $order->setOngkir($ongkir[1]);
        $order->jasa_kirim = $request->courier.' - '.$ongkir[0];
        $order->save();

        foreach ($cartBike as $key => $bike) {
            $item = new Item();
            $item->setOrderId($order->getId());
            $item->setBikeId($bike->getId());
            $item->setQuantity($cartBikeData[$bike->getId()]);
            $item->save();
        }

        //$user->setBalance($balance - $total);
        $user->save();

        foreach ($cartBike as $key => $bike) {
            if ($bike->getUser()->getRole() == 'admin') {
                $bike->setStock($bike->getStock() - 1);
                $bike->save();
            } else {
                $min = 2000000;
                $assemblies = $bike->getAssemblies();
                foreach ($assemblies as $key => $assembly) {
                    $part = $assembly->getPart();
                    $part->setStock($part->getStock() - 1);
                    $part->save();
                    if ($part->getStock() < $min) {
                        $min = $part->getStock();
                    }
                }
                $bike->setStock($min);
                $bike->save();
            }
        }

        $request->session()->forget('cart_bike_data');

        flash('Success! Your Order has been Successfully, Please to Make your Payment Transfers and Upload here.')->success();
        return redirect()->route('user.order.showAll');
    }

    public function showAll(Request $request): View
    {   
        $viewData['banks'] = Bank::all();
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

        $viewData['title'] = __('messages.title_orders');
        $viewData['orders'] = Order::with('items.bike')->where('user_id', '=', Auth::id())->get();
        return view('user.order.showAll')->with('viewData', $viewData);
    }

    public function saveUpdatePaymentTransfers(Request $request, string $id): RedirectResponse
    {   
        $order = Order::where('id', $id)->first();

        if ($order->payment_image !== null) {
            Storage::disk('public')->delete($order->payment_image);
        }

        $filePath = Storage::disk('public')->put('images/product/transfers', request()->file('file'));
        $order['payment_image'] = $filePath;
        $order['payment_status'] = 1;
        $order['payment_date'] = date('Y-m-d');
        $order->save();

        $bikeItems = Item::where('order_id', $id)->get();

        foreach ($bikeItems as $key => $value) {
            $bike = Bike::where('id', $value->bike_id)->first();

            $bike->ordercount = $bike->ordercount + $value->quantity;
            $bike->save();
        }

        flash('Thank You! Admin will be Reviewed your Payment Transfer and Update your Resi Soon.')->success();
        return redirect()->back();
    }

    public function province(Request $request){
        try {
            $provinces = Province::where('name', 'like', '%'.$request->keyword.'%')->select('id', 'name')->get();
            $data = [];
            foreach ($provinces as $province) {
                $data[] = [
                    'id'    => $province->id,
                    'text'  => $province->name
                ];
            }

            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data Fetch Failed',
                'data'    => []
            ]);
        }
    }

    public function city(Request $request){
        try {
            $cities = Province::find($request->province_id)->cities()
                        ->where('name', 'like', '%'.$request->keyword.'%')            
                        ->select('id', 'name')->get();

            $data = [];
            foreach ($cities as $city) {
                $data[] = [
                    'id'    => $city->id,
                    'text'  => $city->name
                ];
            }

            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data Fetch Failed',
                'data'    => []
            ]);
        }
    }

    public function checkOngkir(Request $request){
        try {
            $weight = 0;
            $cartBikeData = $request->session()->get('cart_bike_data');
            $cartBike = Bike::whereIn('id', array_keys($cartBikeData))->get();
            $total = 0;
            foreach ($cartBike as $key => $value) {
                $weight = $weight + ($cartBikeData[$value->getId()] * $value->weight);
            }

            $response = Http::withOptions(['verify' => false,])->withHeaders([
                'key' => '855d9777b4852589da6f6ca9e7961687'
            ])->post('https://api.rajaongkir.com/starter/cost',[
                'origin'        => 96,
                'destination'   => $request->destination,
                'weight'        => $weight,
                'courier'       => $request->courier
            ])
            ->json()['rajaongkir']['results'][0]['costs'];

            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'data'    => []
            ]);
        }
    }
}
