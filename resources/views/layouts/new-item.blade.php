
<form action="/task/add" method="POST" class="form-horizontal new-task-form">
    {{ csrf_field() }}    
    <div class="row justify-content-center existing-todo-item">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            Create New Task
                        </div>
                        
                        <div class="col-md-5">
                            <div class="complete-todo-item float-right" identifier="todo-item-new">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <!-- Task Name -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="task" class="col-sm-3 control-label">Task Name</label>
                            <input type="text" name="title" id="task-name" class="form-control" maxlength="255">
                            
                            <label for="task" class="col-sm-3 control-label mt-20">Task Details</label>
                            <textarea type="text" name="body" id="task-name" class="form-control" maxlength="1000"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
