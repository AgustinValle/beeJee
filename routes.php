<?php

	function call($controller, $action, $pag){
		require_once('Controllers/' . $controller . '_controller.php');
		switch($controller){
			case 'task':
				require_once('Models/task.php');
				$controller= new TaskController();
				break;
		}
		$controller->{$action }($pag);
	}

	$controllers= array(
						'task'=>['index','register','login','update']
						);
	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
            $pag = ($_GET["pag"]) ? $_GET["pag"] : 0;
            call($controller, $action, $pag);
		}else{
			call('task', 'error');
		}
	}else{
		call('task', 'error');
	}
?>