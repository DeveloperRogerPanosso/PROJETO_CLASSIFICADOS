<?php
		/*
		* Classe de conexão ao banco de dados MySQL
		* Package ProjetoClassificados
		* author Roger Panosso <panossosolutions@gmail.com>
		*/

		namespace App\Connect;

		require_once "DbInterface.php";

		class ConnectMysql implements DbInterface {
			private static $instancePdo;

			private function __construct(){}
			private function __clone(){}
			private function __wakeup(){}
			private function __destruct(){}

			public static function getConn() {
				if(!isset($instancePdo)) {
					self::$instancePdo = new \PDO("mysql:dbname=classificados;host=localhost", "root", "");
					self::$instancePdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				}
				return self::$instancePdo;
			}
		}
?>