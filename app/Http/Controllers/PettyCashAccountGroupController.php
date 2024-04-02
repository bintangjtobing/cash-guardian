<?php

namespace App\Http\Controllers;

use App\Models\PettyCashAccountGroup;
use Illuminate\Http\Request;

class PettyCashAccountGroupController extends Controller
{
    public function index()
    {
        $groups = PettyCashAccountGroup::paginate(5);
        return view('petty_cash_account_groups.index', compact('groups'));
    }

    public function create()
    {
        return view('petty_cash_account_groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PettyCashAccountGroup::create($request->all());

        return redirect()->route('petty-cash-account-groups.index')->with('success', 'Petty Cash Account Group created successfully.');
    }

    public function show($id)
    {
        $group = PettyCashAccountGroup::findOrFail($id);

        return view('petty_cash_account_groups.show', compact('group'));
    }

    public function edit($id)
    {
        $group = PettyCashAccountGroup::findOrFail($id);

        return view('petty_cash_account_groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group = PettyCashAccountGroup::findOrFail($id);

        $group->update($request->all());

        return redirect()->route('petty-cash-account-groups.index')->with('success', 'Petty Cash Account Group updated successfully.');
    }

    public function destroy($id)
    {
        $group = PettyCashAccountGroup::findOrFail($id);

        $group->delete();

        return redirect()->route('petty-cash-account-groups.index')->with('success', 'Petty Cash Account Group deleted successfully.');
    }
}

