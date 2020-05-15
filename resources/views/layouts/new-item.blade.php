<!-- New Task Form -->
<form action="/task/add" method="POST" class="form-horizontal new-task-form">
    {{ csrf_field() }}

    <!-- Task Name -->
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Task</label>

        <div class="col-sm-6">
            <input type="text" name="title" id="task-name" class="form-control" maxlength="255">
            <textarea type="text" name="body" id="task-name" class="form-control" maxlength="1000"></textarea>
        </div>
    </div>

    <!-- Add Task Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Add Task
            </button>
        </div>
    </div>
</form>