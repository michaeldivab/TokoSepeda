<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Assembly;
use App\Models\Bike;
use App\Models\Part;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
{
    public function showAll(Request $request): View
    {   
        $viewData['title'] = __('messages.Inventory');
        $viewData['bikes'] = Bike::orderBy('stock', 'desc');

        if (isset($request->search)) {
            $search = $request->search;
            $viewData['bikes'] = $viewData['bikes']->where('name', 'LIKE', "%{$search}%")->orWhere('brand', 'LIKE', "%{$search}%")->orWhere('type', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%");
        }

        if (isset($request->search)) {
            $idData = $viewData['bikes']->get();

            $viewData['idbike'] = '';

            foreach ($idData as $key => $value) {
                if (strlen($viewData['idbike']) == 0) {
                    $viewData['idbike']= $viewData['idbike'].$value->id;
                }
                else{
                    $viewData['idbike'] = $viewData['idbike'].'-'.$value->id;
                }
            }
        }
        else{
            $viewData['idbike'] = 0;
        }

        $viewData['bikes'] = $viewData['bikes']->paginate(16);

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

        return view('user.bike.showAll')->with('viewData', $viewData);
    }

    public function search_products(Request $request)
    {   
        $viewData['bikes'] = Bike::where('created_at', '!=', null);

        if (isset($request->brand)) {
            $viewData['bikes'] = $viewData['bikes']->whereIn('brand', $request->brand);
        }
        if (isset($request->type)) {
            $viewData['bikes'] = $viewData['bikes']->whereIn('type', $request->type);
        }
        if (isset($request->startprice) && isset($request->endprice) && isset($request->priceStatus)) {
            $viewData['bikes'] = $viewData['bikes']->whereBetween('price',[$request->startprice, $request->endprice]);
        }

        if (isset($request->brand) || isset($request->type) || isset($request->priceStatus)) {
            $idData = $viewData['bikes']->get();

            $viewData['idbike'] = '';

            foreach ($idData as $key => $value) {
                if (strlen($viewData['idbike']) == 0) {
                    $viewData['idbike']= $viewData['idbike'].$value->id;
                }
                else{
                    $viewData['idbike'] = $viewData['idbike'].'-'.$value->id;
                }
            }
        }
        else{
            $viewData['idbike'] = 0;
        }
        
        $viewData['bikes'] = $viewData['bikes']->paginate(16);
        
        return view('user.bike.searchProduct',compact('viewData'))->render();
    }

    public function clear_search_products(Request $request)
    {   
        $viewData['idbike'] = 0;
        $viewData['bikes'] = Bike::orderBy('stock', 'desc')->paginate(16);

        return view('user.bike.searchProduct',compact('viewData'))->render();
    }

    public function sort_products(Request $request)
    {   
        $viewData['bikes'] = Bike::where('created_at', '!=', null);
        
        if ($request->id != 0) {
            $viewData['idbike'] = $request->id;
            $bikesId = explode("-",$request->id);

            $viewData['bikes'] = $viewData['bikes']->whereIn('id', $bikesId);
        }
        else{
            $viewData['idbike'] = 0;
        }

        if($request->sort_by == 'lowest'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('price', 'asc');
        }
        if($request->sort_by == 'higest'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('price', 'desc');
        }
        if($request->sort_by == 'newest'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('created_at', 'desc');
        }
        if($request->sort_by == 'oldest'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('created_at', 'asc');
        }
        if($request->sort_by == 'hotest'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('viewcount', 'desc')->orderBy('ordercount', 'desc');
        }
        if($request->sort_by == 'hotest'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('viewcount', 'desc')->orderBy('ordercount', 'desc');
        }
        if($request->sort_by == 'liked'){
            $viewData['bikes'] = $viewData['bikes']->orderBy('viewcount', 'desc')->orderBy('reviewcount', 'desc');
        }
        
        $viewData['bikes'] = $viewData['bikes']->paginate(16);
        return view('user.bike.searchProduct',compact('viewData'))->render();
    }

    public function show(string $id, Request $request): View
    {
        $cartBikeData = $request->session()->get('cart_bike_data');
        $viewData['isInCart'] = false;
        if ($cartBikeData) {
            $viewData['isInCart'] = array_key_exists($id, $cartBikeData);
        }
        $viewData['title'] = 'Bike';
        $viewData['bike'] = Bike::with('reviews', 'assemblies')->find($id);

        $viewData['bike']->viewcount = $viewData['bike']->viewcount + 1;
        $viewData['bike']->save();

        if (Auth::id() == null) {
            $viewData['user_id'] = 0;
        } else {
            $viewData['user_id'] = Auth::id();
        }

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
        
        return view('user.bike.show')->with('viewData', $viewData);
    }

    public function update(string $id): View
    {
        $viewData['title'] =  __('messages.Bike update');
        $viewData['bike'] = Bike::findOrFail($id);
        $parts = Part::get();
        $viewData['part_types'] = [
            'pedal' => [],
            'chain' => [],
            'frame' => [],
            'handlebar' => [],
            'saddle' => [],
            'wheel' => [],
            'chain' => [],
        ];
        foreach ($parts as $part) {
            $viewData['part_types'][$part->type][] = $part;
        }

        return view('user.bike.update')->with('viewData', $viewData);
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Bike::validateUserUpdate($request);
        $bike = Bike::find($id);
        $assemblies = $bike->getAssemblies();
        $parts = [$request['frame'], $request['wheel'], $request['saddle'], $request['chain'], $request['handlebar'], $request['pedal']];
        $price = 0;
        $stock = 10000;
        foreach ($parts as $part) {
            $p = Part::where('id', $part)->get();
            $price += $p[0]->getPrice();
            if ($stock > $p[0]->getStock()) {
                $stock = $p[0]->getStock();
            }
        }
        $request['price'] = $price;
        $request['stock'] = $stock;
        $request['share'] = ($request['share'] == '1');
        if ($request->file('image')) {
            $bike = Bike::where('id', $id);
            Storage::disk('public')->delete($bike->first()->img);
            $filePath = Storage::disk('public')->put('images/product/bikes', request()->file('image'));
            $request['img'] = $request->file('image')->getClientOriginalName();
            $bike->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand', 'description', 'img']));
            foreach ($assemblies as $index => $assembly) {
                $part = Part::where('id', $parts[$index])->first();
                $assembly->setPart($part);
                $assembly->save();
            }
        } else {
            Bike::where('id', $id)->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand', 'description']));
            foreach ($assemblies as $index => $assembly) {
                $part = Part::where('id', $parts[$index])->first();
                $assembly->setPart($part);
                $assembly->save();
            }
        }

        return redirect()->route('user.bike.showAll')->with('status', __('messages.bike_updated_succesfully'));
    }

    public function create(): View
    {
        $viewData['title'] = __('messages.Bike creation');
        $parts = Part::get();
        $viewData['part_types'] = [
            'pedal' => [],
            'chain' => [],
            'frame' => [],
            'handlebar' => [],
            'saddle' => [],
            'wheel' => [],
            'chain' => [],
        ];
        foreach ($parts as $part) {
            $viewData['part_types'][$part->type][] = $part;
        }

        return view('user.bike.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Bike::validateUserCreation($request);
        $input = $request->all();
        $parts = [$input['frame'], $input['wheel'], $input['saddle'], $input['chain'], $input['handlebar'], $input['pedal']];
        $filePath = Storage::disk('public')->put('images/product/bikes', request()->file('image'));
        $input['image'] = $filePath;
        $price = 0;
        $stock = 10000;
        foreach ($parts as $part) {
            $p = Part::where('id', $part)->get();
            $price += $p[0]->getPrice();
            if ($stock > $p[0]->getStock()) {
                $stock = $p[0]->getStock();
            }
        }
        $Bike = Bike::create([
            'name' => $input['name'],
            'stock' => $stock,
            'price' => $price,
            'share' => ($input['share'] == '1'),
            'type' => $input['type'],
            'brand' => 'Parts',
            'img' => $input['image'],
            'description' => $input['description'],
            'user_id' => Auth::id(),
        ]);
        $id = $Bike->id;
        foreach ($parts as $part) {
            Assembly::create([
                'bike_id' => $id,
                'part_id' => $part,
            ]);
        }

        return back()->with('status', __('messages.bike_created_succesfully'));
    }

    public function remove(string $id): RedirectResponse
    {
        Assembly::where('bike_id', $id)->delete();
        Bike::findOrFail($id)->delete();

        return redirect()->route('user.bike.showAll');
    }
}
