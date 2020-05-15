@extends('layouts.app')

@section('content')

<div class="container">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('layouts.new-item')
    @include('layouts.item-list', ['items' => $todoItems, 'markAction' => 'markComplete'])
    
</div>
 
@endsection
