<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }
    
    function showTasks(){
    	$tasks = Task::all();
    	return view('pages/tasks_list', compact('tasks'));
    }

	function saveNewTask(Request $request){
		// dd($request);
		$new_task = new Task();
		$new_task->name = $request->name;
		$new_task->description = $request->description;
		$new_task->save();

		$request->session()->flash('message','Task added succesfully!');

		return back();
	}

	function deleteTask($id){
		$article_tbd = Task::find($id);
		$article_tbd->delete();

		return back();
	}

}
