<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
       $reviews = Review::query()
        ->with('reviewable') 
        ->latest()
        ->get();


        return view ('admin.pages.review.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.pages.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5',
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
            'name' => 'required|string|max:255',
        ]);


        Review::create($validated);
      

        return back()->with('success', 'Review submitted successfully!');
    }

    public function show(string $id)
    {
        $review = Review::findOrFail($id);
        return view('admin.pages.reviews.show', compact('review'));
    }

    public function edit(string $id)
    {
        $review = Review::findOrFail($id);
        return view('admin.pages.reviews.edit', compact('review'));
    }

    public function update(Request $request, string $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5'
        ]));

        return back()->with('success', 'Review updated successfully!');
    }

    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }

    public function approve(string $id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_published' => true]);

        return back()->with('success', 'Review approved successfully!');
    }

    public function disapprove(string $id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_published' => false]);

        return back()->with('success', 'Review disapproved successfully!');
    }
}