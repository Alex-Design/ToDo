<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $todoItems = DB::select('select * from todo_items where completed_on is NULL');

        return view('home', ['todoItems' => $todoItems]);
    }
    
    /**
     * Show the list of complete items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeList()
    {
        $completeTodoItems = DB::select('select * from todo_items where completed_on is not NULL');

        return view('complete', ['todoItems' => $completeTodoItems]);
    }
}
