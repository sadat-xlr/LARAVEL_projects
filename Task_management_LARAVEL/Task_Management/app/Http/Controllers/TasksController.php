<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TasksController extends Controller
{
    //
    public function index(){
       // $tasks=DB::select('select * from tasks',[]);
    //     //return all tasks 
    //    // $tasks=Task::all();//using model
       $tasks= DB::table('tasks')->get();// using table
    //     //dd($tasks); //testing data reading
        $totalTasks=$tasks->count();
        $completedTasks=DB::table('tasks')->where('status','Completed')->get();
        $totalCompleted=$completedTasks->count();
       $inProgressTasks=DB::table('tasks')->where('status','In Progress')->get();
     $totalInProgress=$inProgressTasks->count();


      return view('index',['tasks'=>$tasks,'totalTasks'=>$totalTasks,'totalCompleted'=>$totalCompleted,'totalInProgress'=>$totalInProgress]);
      //return view('index',['tasks'=>$tasks]);

    }
    public function createTaskForm(){
        return view('createTaskForm');
    }

    //insert operation
    public function createNewTask(Request $request){
       $title= $request->input('title');
       $discription= $request->input('discription');
       $satus= $request->input('status');
       $progress=$request->input('progress');
       DB::table('tasks')->insert(['title'=>$title,'discription'=>$discription,'status'=>$satus,'progress'=>$progress]);//key is the column in db

      return \redirect('/');

    }
    //edit form
    public function editTaskForm(Request $request,$id){
        $task=DB::table('tasks')->where('id',$id)->get();
        return view('editTaskForm',['task'=>$task]);

    }
    public function editTask(Request $request){
        $id=$request->input('id');
        $title= $request->input('title');
        $discription= $request->input('discription');
        $satus= $request->input('status');
        $progress=$request->input('progress');
        DB::table('tasks')->where('id',$id)->update(['title'=>$title,'discription'=>$discription,'status'=>$satus,'progress'=>$progress]);//key is the column in db
 
       return \redirect('/');
 

    }
    public function editAllTasks(){
        $tasks= DB::table('tasks')->get();// using table
        
        return view('editAllTasks',['tasks'=>$tasks]);

    }
    public function deleteTask(Request $request,$id){
        DB::table('tasks')->where('id',$id)->delete();
        return \redirect('/');

    }
    public function completedTasks(){
        $tasks=DB::table('tasks')->where('status','Completed')->get();
        return view('specificTasks',['tasks'=>$tasks]);
    }
    public function inProgressTasks(){
        $tasks=DB::table('tasks')->where('status','In Progress')->get();
        return view('specificTasks',['tasks'=>$tasks]);
    }
    

    
}
