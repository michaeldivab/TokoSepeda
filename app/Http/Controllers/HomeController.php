<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Util\WeatherApi;
use App\Models\Bike;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $test = new WeatherApi();
        $response = $test->getCurrentWeather();
        $viewData["temperature"] = $response['temperature'];
        $viewData["time"] = $response['time'];
        $viewData["weather"] = $response['weathercode'];
        $viewData["day"] = $response['is_day'];
        $viewData['bikes'] = Bike::orderBy('created_at', 'desc')->take(12)->get();
        $viewData['hotbikes'] = Bike::where('viewcount', '>', 0)->orWhere('ordercount', '>', 0)->orderBy('viewcount', 'desc')->orderBy('ordercount', 'desc')->take(8)->get();
        $viewData['salesbikes'] = Bike::where('discount', '!=', null)->orderBy('updated_at', 'desc')->get();

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

        return view('home.index')->with('viewData', $viewData);
    }

    public function about(Request $request): View
    {
        $viewData = [];
        $test = new WeatherApi();
        $response = $test->getCurrentWeather();
        $viewData["temperature"] = $response['temperature'];
        $viewData["time"] = $response['time'];
        $viewData["weather"] = $response['weathercode'];
        $viewData["day"] = $response['is_day'];
        $viewData['bikes'] = Bike::all();

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

        return view('home.about')->with('viewData', $viewData);
    }

    public function contact(Request $request): View
    {
        $viewData = [];
        $test = new WeatherApi();
        $response = $test->getCurrentWeather();
        $viewData["temperature"] = $response['temperature'];
        $viewData["time"] = $response['time'];
        $viewData["weather"] = $response['weathercode'];
        $viewData["day"] = $response['is_day'];
        $viewData['bikes'] = Bike::all();

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

        return view('home.contact')->with('viewData', $viewData);
    }
}
