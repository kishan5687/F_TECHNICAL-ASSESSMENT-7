<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'  => ['required', 'string', 'unique:users,username'],
            'full_name' => ['required', 'string'],
            'email'     => ['required', 'email', 'unique:users,email'],
        ]);

        // Synchronize the old name column
        $validated['name'] = $validated['full_name'];

        // Generate a random password automatically
        $validated['password'] = Str::random(16);

        // Create the user account
        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username'  => ['required', 'string', 'unique:users,username,' . $id],
            'full_name' => ['required', 'string'],
            'avatar'    => ['nullable', 'image', 'max:2048'],
        ]);

        // Synchronize the old name column
        $validated['name'] = $validated['full_name'];

        // Check if a new avatar was uploaded
        if ($request->hasFile('avatar')) {

            // Delete the previous avatar if it exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Store the uploaded avatar
            $path = $request->file('avatar')->store('avatars', 'public');

            // Save the avatar path in the database
            $validated['avatar'] = $path;
        }

        // Update the user account
        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User profile updated successfully!');
    }
}