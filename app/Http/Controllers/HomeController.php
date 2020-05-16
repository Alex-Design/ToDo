<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\TodoItem;
use App\Http\Controllers\Auth;
use Mailgun\Mailgun;

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
        $todoItems = DB::table('todo_items')->whereNull('completed_on')->where('user_id', auth()->user()->id)->orderByDesc('created_on')->get();
        return view('home', ['todoItems' => $todoItems]);
    }
    
    /**
     * Show the list of complete items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function completeList()
    {
        $completeTodoItems = DB::table('todo_items')->whereNotNull('completed_on')->where('user_id', auth()->user()->id)->orderByDesc('completed_on')->get();
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
            $task->user_id = auth()->user()->id;
            $task->save();
            
            $to = $task->user->email;
            $subject = 'ToDo Task Added';
            $text = 'Task Added.';
            
            $this->sendEmail($to, $subject, $text);
        
            return redirect('/home');
        }
    }
    
    public function completeTask(Request $request)
    {
        $task = TodoItem::find((int)$request->task);
        $task->completed_on = date("Y-m-d H:i:s");
        $task->save();
        
        $to = $task->user->email;
        $subject = 'ToDo Task Complete!';
        $text = 'Congratulations!';

        $this->sendEmail($to, $subject, $text);

        return redirect('/home');
    }
    
    public function incompleteTask(Request $request)
    {
        $task = TodoItem::find((int)$request->task);
        $task->completed_on = null;
        $task->save();

        return redirect('/complete');
    }
    
    public function sendEmail($to, $subject, $text) 
    {   
        $mailgunKey = config('services.mailgun.secret');
        $mailgunDomain = config('services.mailgun.domain');
        
        $mg = Mailgun::create($mailgunKey);
        $domain = $mailgunDomain;
        
        # Make the call to the client.
        $result = $mg->messages()->send($domain, [
            'from' => 'Alex <mailgun@'. $domain . '>',
            'to' => '<' . $to . '>',
            'subject' => $subject,
            'text' => $text
        ]);

        if ($result->getMessage() === 'Queued. Thank you.') {
            return true;
        } else {
            return false;
        }
    }
}
