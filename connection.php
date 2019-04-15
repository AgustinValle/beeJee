<?php
	class Db
	{
		private static $instance=NULL;
		private function __construct(){}
		private function __clone(){}
		public static function getConnect(){
			if (!isset(self::$instance)) {
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
				self::$instance= new PDO('mysql:host=localhost;dbname=c0640330_beeJee','c0640330','LOvita85di',$pdo_options);
			}
			return self::$instance;
		}
	}
?>