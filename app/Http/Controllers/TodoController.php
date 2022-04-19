<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    
    public function all()
    {
        return response()->json(Todo::all());
    }

    public function show($id)
    {
        return response()->json(Todo::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $todo = Todo::create($request->all());

        return response()->json($todo, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());

        return response()->json($todo, 200);
    }

    public function delete($id)
    {
        Todo::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}