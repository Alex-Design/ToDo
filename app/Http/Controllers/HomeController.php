<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\TodoItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the initial view of incomplete items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todoItems = DB::select('select * from todo_items where completed_on is NULL order by created_on DESC');

        return view('home', ['todoItems' => $todoItems]);
    }
    
    /**
     * Show the list of complete items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeList()
    {
        $completeTodoItems = DB::select('select * from todo_items where completed_on is not NULL order by completed_on DESC');

        return view('complete', ['todoItems' => $completeTodoItems]);
    }
    
    
    public function addTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $task = new TodoItem();
            $task->title = $request->title;
            $task->body = $request->body;
            $task->save();

            return redirect('/home');
        }
    }
    
    public function completeTask(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'title' => 'required|max:255',
//            'body' => 'required|max:1000',
//        ]);

//        if ($validator->fails()) {
//            return redirect('home')
//                ->withErrors($validator)
//                ->withInput();
//        } else {
        
            $task = TodoItem::find((int)$request->task);
            $task->completed_on = date("Y-m-d H:i:s");
            $task->save();

            return redirect('/home');
//        }
    }
    
    public function incompleteTask(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'title' => 'required|max:255',
//            'body' => 'required|max:1000',
//        ]);

//        if ($validator->fails()) {
//            return redirect('home')
//                ->withErrors($validator)
//                ->withInput();
//        } else {
        
            $task = TodoItem::find((int)$request->task);
            $task->completed_on = null;
            $task->save();

            return redirect('/complete');
//        }
    }
}
