<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function delete(int $id): RedirectResponse
    {
        $review = Review::where('id', $id)->first();
        $stars = $review->stars;
        $review->delete();

        $bike = Bike::where('id', $id)->first();
        $bike->reviewcount = $bike->reviewcount - $stars;
        $bike->save();


        return back()->with('status', 'review remove sucessfully');
    }
}
