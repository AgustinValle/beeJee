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

        <?php require_once('routes.php'); ?>
    </div>

</body>
</html>