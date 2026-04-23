<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {

        $reviews = Review::with(['user', 'attraction'])->latest()->get();


        return view('admin.pages.review.index', compact('reviews'));
    }


    public function store(Request $request, $attractionId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|min:5',
        ]);


        $attraction = Attraction::findOrFail($attractionId);


        Review::create([
            'user_id'       => Auth::id(),
            'attraction_id' => $attraction->id,
            'rating'        => $request->rating,
            'description'   => $request->description,
        ]);

        return back()->with('success', 'Ulasan Anda berhasil dikirim!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
