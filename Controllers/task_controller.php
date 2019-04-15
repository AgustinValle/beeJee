<?php
	class TaskController
	{
		public function __construct(){}

		public function index($pag){
            $tasks=Task::all($pag);
            $cantTask=Task::count();
			require_once('Views/Task/index.php');
		}

        public function register(){
            require_once('Views/Task/register.php');
        }

        public function login(){
            require_once('Views/Task/login.php');
        }


		public function save($task){
			Task::save($task);
			header('Location: ../index.php');
		}

        public function update($task){
            Task::update($task);
            header('Location: ../index.php');
        }
        public function log($user){
            User::login($user);
            if($user){
                header('Location: ../index.php');
            }
            elseif ($user == null){
                require_once('Views/Task/error.php');
            }
        }

        public function delete($id){
            require_once('../Models/task.php');
            Task::delete($id);
            header('Location: ../index.php');
        }
		
		public function error(){
			require_once('Views/Task/error.php');
		} 
	}


	if (isset($_POST['action'])) {
        $taskController= new TaskController();
		require_once('../Models/task.php');
        require_once('../Models/user.php');
		require_once('../connection.php');

		if ($_POST['action']=='register') {
			$task= new Task(null,$_POST['user'],$_POST['mail'],$_POST['text'], $_POST['status']);
			$taskController->save($task);
		}elseif ($_POST['action']=='update') {
            $task= new Task($_POST['id'],$_POST['user'],$_POST['mail'],$_POST['text'], $_POST['status']);
            $taskController->update($task);
        }elseif ($_POST['action']=='login') {

		    $user = new User(null,$_POST['user'],$_POST['pass']);
            $taskController->log($user);
        }
    }

	if (isset($_GET['action'])) {
		if ($_GET['action']!='register'&$_GET['action']!='index'&$_GET['action']!='login') {
			require_once('../connection.php');
            $taskController=new TaskController();
			if ($_GET['action']=='delete') {
                $taskController->delete($_GET['id']);
			}
			elseif ($_GET['action']=='update') {
				require_once('../Models/task.php');
                $task=Task::getById($_GET['id']);
				require_once('../Views/Task/update.php');
			}	
		}
	}
?>