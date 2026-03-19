<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Exception;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5|max:500',
            'status' => 'required|in:Pending,Completed'
        ]);

        try {
            Task::create($validated);

            return redirect()->route('tasks.index')
                ->with('success', 'Task created successfully.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong while creating the task.');
        }
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:5|max:500',
            'status' => 'required|in:Pending,Completed'
        ]);

        try {
            $task = Task::findOrFail($id);
            $task->update($validated);

            return redirect()->route('tasks.index')
                ->with('success', 'Task updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the task.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return redirect()->route('tasks.index')
                ->with('success', 'Task deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('tasks.index')
                ->with('error', 'Something went wrong while deleting the task.');
        }
    }
}