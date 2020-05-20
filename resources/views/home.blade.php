@extends('layouts.app')

@section('content')

<div class="container">
    
    @include('layouts.errors')
    @include('layouts.new-item')
    @include('layouts.item-list', ['items' => $todoItems, 'markAction' => 'markComplete'])
    
</div>
 
@endsection
