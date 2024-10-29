<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Bike;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function create(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('messages.title_create');
        $viewData['bike_id'] = $id;

        return view('user.review.create')->with('viewData', $viewData);
    }

    public function save(Request $request, int $id): RedirectResponse
    {
        $input = $request->all();
        $review = Review::create([
            'stars' => $input['rating'],
            'description' => $input['description'],
            'bike_id' => $id,
            'user_id' => Auth::id(),
        ]);

        $bike = Bike::where('id', $id)->first();
        $bike->reviewcount = Review::where('bike', $id)->sum('stars');
        $bike->save();

        $viewData['title'] = __('messages.Sucessfully created');

        flash('Success! Your Review has been Submited.')->success();
        return redirect()->route('user.bike.show', ['id' => $id]);
    }

    public function delete(int $id): RedirectResponse
    {   
        $review = Review::where('id', $id)->first();
        $stars = $review->stars;
        $review->delete();

        $bike = Bike::where('id', $id)->first();
        $bike->reviewcount = $bike->reviewcount - $stars;
        $bike->save();

        flash('Success! Review has been Deleted.')->success();
        return back();
    }
}
