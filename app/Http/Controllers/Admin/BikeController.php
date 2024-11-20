<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Assembly;
use App\Models\Bike;
use App\Models\Item;
use App\Models\Part;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
{
    public function showAll(): View
    {
        $viewData['bikes'] = Bike::all();
        $viewData['title'] = __('messages.Inventory');

        return view('admin.bike.showAll')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData['bike'] = Bike::with('reviews', 'assemblies')->find($id);
        $viewData['title'] = 'Bike';

        return view('admin.bike.show')->with('viewData', $viewData);
    }

    public function update(string $id): View
    {
        $viewData['title'] = __('messages.Bike update');
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

        return view('admin.bike.update')->with('viewData', $viewData);
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        Bike::validateAdminUpdate($request);
        $assemblies = Assembly::where('bike_id', $id)->get();
        $parts = [$request['frame'], $request['wheel'], $request['saddle'], $request['chain'], $request['handlebar'], $request['pedal']];
        $request['share'] = ($request['share'] == '1');

        if (!empty($request['discount']) || $request['discount'] > 0) {
            $request['price_discount'] = $request['price'];
            $request['price'] = $request['price'] - (($request['price'] * $request['discount']) / 100);
        }
        else{
            $request['price'] = $request['price'];
            $request['price_discount'] = null;
        }

        if ($request->file('image')) {
            $bike = Bike::where('id', $id);
            Storage::disk('public')->delete($bike->first()->img);
            $filePath = Storage::disk('public')->put('images/product/bikes', request()->file('image'));
            $request['img'] = $filePath;
            $bike->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand', 'description', 'price_discount', 'discount', 'color', 'weight', 'img']));
            foreach ($assemblies as $index => $assembly) {
                $part = Part::where('id', $parts[$index])->get();
                $assembly->setPartId($part[0]);
                $assembly->save();
            }
        } else {
            Bike::where('id', $id)->update($request->only(['name', 'stock', 'price', 'share', 'type', 'brand', 'description', 'price_discount', 'discount', 'color', 'weight']));
            foreach ($assemblies as $index => $assembly) {
                $part = Part::where('id', $parts[$index])->get();
                $assembly->setPartId($part[0]);
                $assembly->save();
            }
        }

        return redirect()->route('admin.bike.showAll')->with('status', __('messages.bike_updated_succesfully'));
    }

    public function create(): View
    {
        $viewData['title'] = __('messages.Bike creation');

        return view('admin.bike.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Bike::validateAdminCreation($request);
        $input = $request->all();
        $filePath = Storage::disk('public')->put('images/product/bikes', request()->file('image'));
        $input['image'] = $filePath;

        if (!empty($input['discount']) || $input['discount'] > 0) {
            $price = ($input['price'] * $input['discount']) / 100;
            $price_discount = $input['price'];
        }
        else{
            $price = $input['price'];
        }

        Bike::create([
            'name' => $input['name'],
            'stock' => $input['stock'],
            'price' => $price,
            'share' => ($input['share'] == '1'),
            'type' => $input['type'],
            'brand' => $input['brand'],
            'img' => $input['image'],
            'description' => $input['description'],
            'weight' => $input['weight'],
            'user_id' => Auth::id(),
            'price_discount' => $price_discount ?? null,
            'discount' => $input['discount'],
            'color' => $input['color'],
        ]);

        return back()->with('status', __('messages.bike_created_succesfully'));
    }

    public function remove(string $id): RedirectResponse
    {   
        if (Item::where('bike_id', $id)->exists()) {
            flash('Fail! Cant delete bike, because allready in order.')->error();
            return redirect()->route('admin.bike.showAll');
        }

        //Assembly::where('bike_id', $id)->delete();
        $bike = Bike::findOrFail($id);

        //Storage::disk('public')->delete($bike->img);
        $bike->delete();

        return redirect()->route('admin.bike.showAll');
    }
}
