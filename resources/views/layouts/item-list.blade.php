@foreach ($items as $todoItem)
    <div class="row justify-content-center existing-todo-item">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            {{ $todoItem->title }}
                            <br />
                            <div class="timestamp">
                                <i>Created: {{ date('D dS M Y, g:i A', strtotime($todoItem->created_on)) }}</i>
                                @if($todoItem->completed_on)
                                    <br />
                                    <i>Completed: {{ date('D dS M Y, g:i A', strtotime($todoItem->completed_on)) }}</i>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            @if($markAction === 'markComplete')
                                <div class="complete-todo-item float-right" identifier="todo-item-{{ $todoItem->id }}">
                                    <form method="POST" action="/task/complete?task={{ $todoItem->id }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-success">Mark Complete</button>
                                    </form>
                                </div>
                            @else
                                <div class="incomplete-todo-item float-right" identifier="todo-item-{{ $todoItem->id }}">
                                   <form method="POST" action="/task/incomplete?task={{ $todoItem->id }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Mark Incomplete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    {{ $todoItem->body }}
                </div>
            </div>
        </div>
    </div>
@endforeach
