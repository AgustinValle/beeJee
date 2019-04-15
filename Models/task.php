<?php
class Task
{
	public $id;
	public $user;
	public $mail;
    public $text;
    public $status;

	function __construct($id, $user, $mail, $text, $status)
	{
		$this->id=$id;
		$this->user=$user;
		$this->mail=$mail;
        $this->text=$text;
        $this->status=$status;
	}

    public static function all($pag){
        $listaTasks =[];
        $db=Db::getConnect();
        $tot = 2;
        $sql=$db->query('SELECT * FROM tasks ORDER BY id ASC LIMIT '.$pag.', '.$tot);
        foreach ($sql->fetchAll() as $task) {
            $listaTasks[]= new Task($task['id'],$task['user'], $task['mail'],$task['text'],$task['status']);
        }
        return $listaTasks;
    }


    public static function count(){
        $db=Db::getConnect();
        $sql=$db->query('SELECT count(id) dto FROM tasks');
        $taskDb=$sql->fetch();
        $taskCant= ($taskDb['dto']);
        return $taskCant;
    }

	public static function save($task){
			$db=Db::getConnect();
			$insert=$db->prepare('INSERT INTO tasks VALUES(NULL, :user, :mail, :text, "1")');
			$insert->bindValue('user',$task->user);
			$insert->bindValue('mail',$task->mail);
            $insert->bindValue('text',$task->text);
			$insert->execute();
		}

	public static function update($task){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE tasks SET text=:text, status=:status WHERE id=:id');
		$update->bindValue('id',$task->id);
        $update->bindValue('text',$task->text);
        $update->bindValue('status',$task->status);
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM tasks WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

	public static function getById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM tasks WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
        $taskDb=$select->fetch();
        $task= new Task($taskDb['id'],$taskDb['user'],$taskDb['mail'],$taskDb['text'],$taskDb['status']);
		return $task;
	}
}
?>