<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    
    public function create()
    {
        return view('tasks.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);
    
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->completed = $request->has('completed'); 
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
