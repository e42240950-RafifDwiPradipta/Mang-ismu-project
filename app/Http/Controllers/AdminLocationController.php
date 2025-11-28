<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->get();
        // View ke folder 'location' (tanpa s)
        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'address'       => 'required|string',
            'opening_hours' => 'required|string|max:255',
            'map_link'      => 'required|url',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'   => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('locations', 'public');
            $data['image_path'] = $path;
        }

        Location::create($data);

        // Redirect ke route 'admin.location.index' (tanpa s)
        return redirect()->route('admin.location.index')
                         ->with('success', 'Lokasi berhasil ditambahkan!');
    }

    public function edit(Location $location)
    {
        // View ke folder 'location' (tanpa s)
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'address'       => 'required|string',
            'opening_hours' => 'required|string|max:255',
            'map_link'      => 'required|url',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'   => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($location->image_path && Storage::disk('public')->exists($location->image_path)) {
                Storage::disk('public')->delete($location->image_path);
            }
            $path = $request->file('image')->store('locations', 'public');
            $data['image_path'] = $path;
        }

        $location->update($data);

        // Redirect ke route 'admin.location.index' (tanpa s)
        return redirect()->route('admin.location.index')
                         ->with('success', 'Lokasi berhasil diperbarui!');
    }

    public function destroy(Location $location)
    {
        if ($location->image_path && Storage::disk('public')->exists($location->image_path)) {
            Storage::disk('public')->delete($location->image_path);
        }

        $location->delete();

        // Redirect ke route 'admin.location.index' (tanpa s)
        return redirect()->route('admin.location.index')
                         ->with('success', 'Lokasi berhasil dihapus!');
    }
}