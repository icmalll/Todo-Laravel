<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Todo::create(['title' => $request->title]);
        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);
        $todo->is_done = !$todo->is_done;
        $todo->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->back();
    }
}