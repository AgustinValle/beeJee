<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">User</th>
        <th scope="col">Mail</th>
        <th scope="col">Text</th>
        <th scope="col">Status</th>
        <?php if ( $_SESSION["user"] != null): ?>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        <?php endif;?>
    </tr>
    </thead>
    <tbody> <?php
    foreach ($tasks as $task) { ?>
    <tr>
        <th scope="row"><?php echo $task->id; ?></th>
        <td><?php echo $task->user; ?></td>
        <td><?php echo $task->mail;?></td>
            <td><?php echo $task->text;?></td>
            <td><?php switch($task->status):
                    case 1:  echo ("Pending");  break;
                    case 2:  echo ("Completed");  break;
                    case 3:  echo ("Cancelled");  break;
                endswitch; ?></td>
            <?php if ( $_SESSION["user"] != null): ?>
                <td><a href="Controllers/task_controller.php?action=update&id=<?php echo $task->id ?>"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a> </td>
                <td><a href="Controllers/task_controller.php?action=delete&id=<?php echo $task->id ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> </td>
            <?php endif;?>
    </tr>
    <?php } ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php for($i=0;$i<$cantTask;$i++){ ?>
            <li class="page-item"><a class="page-link" href="?controller=task&action=index&pag=<?php echo $i ?>"> <?php echo($i+1) ?></a></li>
        <?php } ?>
    </ul>
</nav>