<p>Register new task</p>





<form action='Controllers/task_controller.php' method='post'>
    <input type='hidden' name='action' value='register'>


    <div class="form-group">
        <label for="user">User</label>
        <input type="text" class="form-control" required id="user" name='user'>
    </div>

    <div class="form-group">
        <label for="mail">Mail</label>
        <input type="email" class="form-control" required id="mail" name='mail' >
    </div>

    <div class="form-group">
        <label for="text">Text</label>
        <input type="text" class="form-control" required id="text" name='text' >
    </div>




    <button type="submit" class="btn btn-primary">Save</button>
</form>