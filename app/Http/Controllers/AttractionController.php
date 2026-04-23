<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::latest()->get();
        return view('admin.pages.attraction.index', compact('attractions'));
    }

    public function create()
    {   
        $zones = Zone::all();
        return view('admin.pages.attraction.create', compact('zones'));
    }

    public function store(Request $request)
    {
  
        $validated = $request->validate([
            'name' => 'required',
            'zone_id' => 'required',
            'description' => 'required',
            'price_range' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

  
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('attraction', 'public');
        }

       
        Attraction::create($validated);

      
        return redirect()->route('admin.attraction.index')
            ->with('success', 'attraction created successfully.');
    }

    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('admin.pages.attraction.show', compact('attraction'));
    }

   public function edit($id)
    {   
        $zones = Zone::all();
        $attraction = Attraction::findOrFail($id);
        return view('admin.pages.attraction.edit', compact('attraction', 'zones' ));
    }


    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);

        $validated = $request->validate([
            'zone_id' => 'required',
            'description' => 'required',
            'price_range' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);


        if ($request->hasFile('image')) {
           
            if ($attraction->image) {
                Storage::disk('public')->delete($attraction->image);
            }

            $validated['image'] = $request->file('image')->store('attraction', 'public');
        }

        $attraction->update($validated);

        return redirect()->route('admin.attraction.index')
            ->with('success', 'attraction updated successfully.');
    }

    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);

    
        if ($attraction->image) {
            Storage::disk('public')->delete($attraction->image);
        }

        $attraction->delete();

        return redirect()->route('admin.attraction.index')
            ->with('success', 'attraction deleted successfully.');
    }
}