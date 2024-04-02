<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\Area;

class SiteController extends Controller
{
    public function index()
    {
        // Mengambil semua situs beserta relasinya dengan area dan city
        $sites = Site::with('area.city')->paginate(5);
        return view('sites.index', compact('sites'));
    }

    public function create()
    {
        $areas = Area::all();
    return view('sites.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
        ]);

        Site::create($request->all());

        return redirect()->route('sites.index')->with('success', 'Site created successfully.');
    }

    public function show($id)
    {
        $site = Site::with('area.city')->findOrFail($id);

        return view('sites.show', compact('site'));
    }

    public function edit($id)
    {
        $site = Site::findOrFail($id);
        $areas = Area::all();
        return view('sites.edit', compact('site','areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
        ]);

        $site = Site::findOrFail($id);

        $site->update($request->all());

        return redirect()->route('sites.index')->with('success', 'Site updated successfully.');
    }

    public function destroy($id)
    {
        $site = Site::findOrFail($id);

        $site->delete();

        return redirect()->route('sites.index')->with('success', 'Site deleted successfully.');
    }
}

