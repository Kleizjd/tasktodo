<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate(['title'=> 'required|min:3']);
        $todos = new Todo();
        $todos->title=$request->title;
        $todos->category_id=$request->category_id;
        $todos->save();
        return redirect()->route('todos')->with('success', 'Task Created succesfully');
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // 
        $todo = Todo::find($id);
        $todo->title = $request->title;
        // dd($todo);
        $todo->save();
        return redirect()->route('todos')->with('success','Tasks Update');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Task deleted succesfully');

    }
}
