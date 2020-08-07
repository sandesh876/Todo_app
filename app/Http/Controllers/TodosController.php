<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        //fetch all todos from database
        //display tem in the todos index page

        $todos = Todo::all();    
        return view('todos.index')->with('todos',$todos);
    }

    public function show(Todo $todo)
    {
        //model binding
        //make sure that the parameter of the dynamic route parameter is singular of the name of model
        //$todo = Todo::find($todoId);
        return view('todos.show')->with('todo',$todo);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(){
//validating the form data
        $this->validate(request(),[
            'name'=> 'required|min:6|max:12',
            'description' => 'required'
        ]);
        $data = request()->all();
        
        $todo = new TODO();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();

        //showing flash message 
        session()->flash('success','Todo created successfully');
        return redirect('/todos');
    }

    public function edit(Todo $todo){

        //$todo = Todo::find($todoId);

        return view('todos.edit')->with('todo',$todo);

    }

    public function update(Todo $todo){
        //validating the form data
        $this->validate(request(),[
            'name'=> 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();
       // $todo = Todo::find($todoId);
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
         //showing flash message 
         session()->flash('success','Todo updated successfully');
        return redirect('/todos');
    }

    public function destroy($todoId){

        $todo = Todo::find($todoId);
        $todo->delete();
         //showing flash message 
         session()->flash('success','Todo deleted successfully');
        return redirect('/todos');

    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        session()->flash('success','Todo completed successfully');

        return redirect('/todos');
    }
}
