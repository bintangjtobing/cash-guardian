<?php

namespace App\Http\Controllers;

use App\Models\PettyCashAccount;
use App\Models\PettyCashAccountGroup;
use Illuminate\Http\Request;

class PettyCashAccountController extends Controller
{
    public function index()
    {
        $accounts = PettyCashAccount::with('group')->paginate(5);
        return view('petty_cash_accounts.index', compact('accounts'));
    }

    public function create()
    {
        $groups = PettyCashAccountGroup::all();
        return view('petty_cash_accounts.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required|exists:petty_cash_account_groups,id'
        ]);

        PettyCashAccount::create($request->all());

        return redirect()->route('petty-cash-accounts.index')->with('success', 'Petty Cash Account created successfully.');
    }

    public function show($id)
    {
        $account = PettyCashAccount::findOrFail($id);

        return view('petty_cash_accounts.show', compact('account'));
    }

    public function edit($id)
    {
        $account = PettyCashAccount::findOrFail($id);

        $groups = PettyCashAccountGroup::all();

        return view('petty_cash_accounts.edit', compact('account', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required|exists:petty_cash_account_groups,id'
        ]);

        $account = PettyCashAccount::findOrFail($id);

        $account->update($request->all());

        return redirect()->route('petty-cash-accounts.index')->with('success', 'Petty Cash Account updated successfully.');
    }

    public function destroy($id)
    {
        $account = PettyCashAccount::findOrFail($id);

        $account->delete();

        return redirect()->route('petty-cash-accounts.index')->with('success', 'Petty Cash Account deleted successfully.');
    }
}

