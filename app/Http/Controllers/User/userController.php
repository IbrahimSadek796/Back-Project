<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request('search')) {
            $users = User::where('name', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        }
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create($validated);

        return redirect(route('admin.users.index'))->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:100',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->update(array_filter($validated));
        return redirect(route('admin.users.index'))->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect(route('admin.users.index'))->with('success', 'User deleted successfully');
    }
}
