<?php
class User
{
	public $id;
    public $user;
    public $pass;

	function __construct($id, $user, $pass){
		$this->id=$id;
		$this->user=$user;
		$this->pass=$pass;
	}
	public static function login($user){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT id, user, pass FROM users WHERE user=:user and pass=:pass');
        $select->bindValue('user',$user->user);
        $select->bindValue('pass',$user->pass);
		$select->execute();
		$usuarioDb=$select->fetch();
		$a = count($select->fetch(PDO::FETCH_ASSOC));

        if (is_array($usuarioDb)) {
            $usuario= new User($usuarioDb['id'],$usuarioDb['user'],$usuarioDb['pass']);
            session_start();
            $_SESSION["user"]=$usuarioDb['user'];
            return $usuario;
        }
	}
}
?>