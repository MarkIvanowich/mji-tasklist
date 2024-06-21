<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    function store(Request $request)
    {
        return redirect()->route('tasks.index');
    }

    function show($task)
    {
        return view('tasks.show', compact('task'));
    }

    function edit($task)
    {
        return view('tasks.edit', compact('task'));
    }

    function update(Request $request, $task)
    {
        return redirect()->route('tasks.show', $task);
    }

    function destroy($id)
    {
        $task = Task::findOrfail('id', $id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
