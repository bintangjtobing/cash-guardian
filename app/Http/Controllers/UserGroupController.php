<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index()
    {
        $groups = UserGroup::paginate(5);
        return view('user_groups.index', compact('groups'));
    }

    public function create()
    {
        return view('user_groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        UserGroup::create($request->all());

        return redirect()->route('user-groups.index')->with('success', 'User Group created successfully.');
    }

    public function show($id)
    {
        $group = UserGroup::findOrFail($id);

        // Tampilkan detail user group
        return view('user_groups.show', compact('group'));
    }

    public function edit($id)
    {
        $group = UserGroup::findOrFail($id);

        return view('user_groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group = UserGroup::findOrFail($id);

        $group->update($request->all());

        return redirect()->route('user-groups.index')->with('success', 'User Group updated successfully.');
    }

    public function destroy($id)
    {
        $group = UserGroup::findOrFail($id);

        $group->delete();

        return redirect()->route('user-groups.index')->with('success', 'User Group deleted successfully.');
    }
}
