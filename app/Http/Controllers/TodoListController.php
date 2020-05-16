<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoList;
class TodoListController extends Controller
{
    public function index(){
        $tasks= auth()->user()->tasks;
        return view('todolists.index')->withTasks($tasks);   
    }
    public function store(Request $request){
        $data = $request->validate([
            'task' => 'required'
        ]);
        $task = auth()->user()->tasks()->create($data);   
        session()->flash('notif' ,'Adding Task successfully');
        return redirect()->route('todolists.index');
    }
    public function update(TodoList $task){
       $data = request()->validate([
            'task' => 'required'
       ]); 
        $task->update($data);
        session()->flash('notif' ,'Updating Task Success');
        return redirect()->route('todolists.index');
    }

    public function destroy(TodoList $task){
        $task->delete();
        session()->flash('notif' ,'Deleting Task Success');
        return redirect()->route('todolists.index');
    }
}
