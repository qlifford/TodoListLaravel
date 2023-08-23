<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('id','DESC')->paginate(5);

        return view('todos.index', compact('todos'));
    }
    public function createTodo()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $request->session()->flash('success', 'Task created successfully');
        return to_route('todos.index');
    }

    public function showTodo(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            
            $request->session()->flash('error', 'Task not found');

            return to_route('todos.show');
        }
        return view('todos.show', compact('todo'));
    }

    public function editTodo(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            $request->session()->flash('error', 'Task not found');

            return to_route('todos.edit');
        }

        return view('todos.edit', compact('todo'));
    }

    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            // return to_route('todos.index')->withErrors([
            //     'error' => 'Task not found'
            //]);
            
        $request->session()->flash('error', 'Task not found');

        return to_route('todos.edit');
        }
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed
        
            ]);
        $request->session()->flash('success', 'Task updated successfully');

        return to_route('todos.index');

    }
    public function destroy(Request $request)
    {
        $todo = Todo::find($request->todo_id);
        if (!$todo) {
            
            $request->session()->flash('error', 'Task not found');

            return to_route('todos.index');
        }
        $todo->delete();
        // Alert::success('Deleted', 'Task successfully deleted');
        $request->session()->flash('success', 'Task deleted successfully');

        return to_route('todos.index');
    }
}
