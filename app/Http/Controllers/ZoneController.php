<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::latest()->get();
        return view('admin.pages.zones.index', compact('zones'));
    }

    public function create()
    {
        return view('admin.pages.zones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_range' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

  
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('zones', 'public');
        }

       
        Zone::create($validated);

      
        return redirect()->route('admin.zones.index')
            ->with('success', 'Zone created successfully.');
    }

    public function show($id)
    {
        $zone = Zone::findOrFail($id);
        return view('admin.pages.zones.show', compact('zone'));
    }

    public function edit($id)
    {
        $zone = Zone::findOrFail($id);
        return view('admin.pages.zones.edit', compact('zone'));
    }

    public function update(Request $request, $id)
    {
        $zone = Zone::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_range' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);


        if ($request->hasFile('image')) {
           
            if ($zone->image) {
                Storage::disk('public')->delete($zone->image);
            }

            $validated['image'] = $request->file('image')->store('zones', 'public');
        }

        $zone->update($validated);

        return redirect()->route('admin.zones.index')
            ->with('success', 'Zone updated successfully.');
    }

    public function destroy($id)
    {
        $zone = Zone::findOrFail($id);

        // hapus gambar
        if ($zone->image) {
            Storage::disk('public')->delete($zone->image);
        }

        $zone->delete();

        return redirect()->route('admin.zones.index')
            ->with('success', 'Zone deleted successfully.');
    }

    public function showZones(Zone $zone)
    {
         return view('landing.pages.detail-zone', compact('zone'));
    }
}
