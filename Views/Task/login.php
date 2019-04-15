<p>logIn</p>

<form action='Controllers/task_controller.php' method='post'>
    <input type='hidden' name='action' value='login'>


    <div class="form-group">
        <label for="user">User</label>
        <input type="text" class="form-control" required id="user" name='user' >
    </div>

    <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" required id="pass" name='pass' >
    </div>


    <button type="submit" class="btn btn-primary">Login</button>
</form>