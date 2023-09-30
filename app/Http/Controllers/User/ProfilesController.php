<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //

    public function edit(Request $request)
    {
        //
        return view('user.layouts.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id. '|max:100',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        auth()->user()->update(array_filter($validated));
        return redirect(route('user.'))->with('success', 'User updated successfully');
    }

}
