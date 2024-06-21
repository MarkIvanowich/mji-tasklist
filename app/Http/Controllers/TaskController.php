<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest; // replace the default request with the extended TaskRequest, which will validate the form request
use App\Models\Task;


class TaskController extends Controller
{
    function index()
    {
        return view('tasks.index', [
            'tasks' => Task::latest()->paginate(12)
        ]);
    }

    function create()
    {
        return view('tasks.create');
    }

    function store(TaskRequest $request)
    {
        $task = Task::create($request->validated()); // helper function only fills validated fields. I like it!

        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully.');
    }

    function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    function update(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.show', $task);
    }

    function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
    function toggleComplete(Task $task)
    {
        $task->toggleComplete();
        return redirect()->route('tasks.show', $task);
    }
}
