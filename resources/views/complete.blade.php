@extends('layouts.app')

@section('content')
 
<div class="container">
 
    @include('layouts.errors')
    @include('layouts.item-list', ['items' => $todoItems, 'markAction' => 'markIncomplete'])
    
</div>
 
@endsection
