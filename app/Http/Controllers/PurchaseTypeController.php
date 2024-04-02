<?php

namespace App\Http\Controllers;

use App\Models\PurchaseType;
use Illuminate\Http\Request;

class PurchaseTypeController extends Controller
{
    public function index()
    {
        $purchaseTypes = PurchaseType::paginate(5);
        return view('purchase_types.index', compact('purchaseTypes'));
    }

    public function create()
    {
        return view('purchase_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'transaction_type' => 'required|string|max:255',
        ]);

        PurchaseType::create($request->all());

        return redirect()->route('purchase-types.index')->with('success', 'Purchase Type created successfully.');
    }

    public function show($id)
    {
        $purchaseType = PurchaseType::findOrFail($id);

        return view('purchase_types.show', compact('purchaseType'));
    }

    public function edit($id)
    {
        $purchaseType = PurchaseType::findOrFail($id);

        return view('purchase_types.edit', compact('purchaseType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'transaction_type' => 'required|string|max:255',
        ]);

        $purchaseType = PurchaseType::findOrFail($id);

        $purchaseType->update($request->all());

        return redirect()->route('purchase-types.index')->with('success', 'Purchase Type updated successfully.');
    }

    public function destroy($id)
    {
        $purchaseType = PurchaseType::findOrFail($id);

        $purchaseType->delete();

        return redirect()->route('purchase-types.index')->with('success', 'Purchase Type deleted successfully.');
    }
}

