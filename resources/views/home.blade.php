@extends('layouts.app')

@section('content')

 <!--            
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
</div>-->
                
 
<div class="container">
    
    @include('layouts.item-list', ['items' => $todoItems, 'markAction' => 'markComplete'])
    
</div>
 
@endsection
