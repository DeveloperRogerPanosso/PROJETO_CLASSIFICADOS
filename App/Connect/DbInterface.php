<?php
		/*
		* Interface contendo assinatura de método especifico para realização de conexão ao banco de dados
		* Package ProjetoClassificados
		* author Roger Panosso <panossosolutions@gmail.com>
		*/

		namespace App\Connect;

		interface DbInterface {
			public static function getConn();
		}
?>