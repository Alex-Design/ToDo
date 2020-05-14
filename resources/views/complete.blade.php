@extends('layouts.app')

@section('content')
 
<div class="container">
 
    @include('layouts.item-list', ['items' => $todoItems, 'markAction' => 'markIncomplete'])
    
</div>
 
@endsection
