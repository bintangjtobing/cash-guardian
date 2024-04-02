<?php
namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\City;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::with('city')->paginate(5);
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        $cities = City::all();
        return view('areas.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id'
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index')->with('success', 'Area created successfully.');
    }

    public function show($id)
    {
        $area = Area::findOrFail($id);

        return view('areas.show', compact('area'));
    }

    public function edit($id)
    {
        $area = Area::with('city')->findOrFail($id);
        $cities = City::all();
        return view('areas.edit', compact('area', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id'
        ]);

        $area = Area::findOrFail($id);

        $area->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Area updated successfully.');
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);

        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Area deleted successfully.');
    }
}
