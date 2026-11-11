<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:100'],
    ]);

    Task::create([
        'title' => $validated['title'],
        'status' => 'pending', 
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
}

}
