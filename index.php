<?php 
	 require_once('connection.php');
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];		
	} else {
		$controller='task';
        $action='index';
        $pag='0';
	}
	require_once('Views/layout.php');
?>