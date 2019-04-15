



<?php
session_start();
?>

<html>
<head>
    <title>Welcome BeeJee</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <?php if ( $_SESSION["user"] != null): ?>
            <div>Welcome <?php echo $_SESSION["user"]  ?>!</div>
        <?php endif;?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="?controller=task&action=register">New Task </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?controller=task&action=index&pag=0">All Task's </a>
            </li>
            <?php if ( $_SESSION["user"] == null): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="?controller=task&action=login">LogIn </a>
                </li>
            <?php endif;?>
        </ul>
    </div>
</nav>

<div class="container">

    <p>Update task <?php echo $task->id; ?></p>




    <form action='task_controller.php' method='post'>
        <input type='hidden' name='action' value='update'>

        <div class="form-group">
            <label for="id">Id</label>
            <input type="text" class="form-control" name='id' id="id" readonly value='<?php echo $task->id; ?>'>
        </div>

        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control" readonly id="user" name='user' value='<?php echo $task->user; ?>'>
        </div>

        <div class="form-group">
            <label for="mail">Mail</label>
            <input type="text" class="form-control" readonly id="mail" name='mail' value='<?php echo $task->mail; ?>'>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <input type="text" class="form-control"  id="text" name='text' value='<?php echo $task->text; ?>'>
        </div>
        <label for="status">Text</label>
        <select id="status" name="status" class="form-control" required>
            <option value="1" <?php if($task->status == '1'){echo("selected");}?> >Pending</option>
            <option value="2" <?php if($task->status == '2'){echo("selected");}?> >Completed</option>
            <option value="3" <?php if($task->status == '3'){echo("selected");}?> >Cancelled</option>
        </select>




        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>