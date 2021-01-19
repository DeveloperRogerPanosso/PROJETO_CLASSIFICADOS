<?php
		namespace App\ModelsDAO;

		use \App\Models\Categorias;
		use \App\Connect\ConnectMysql;

		class CategoriasDao {
			public function getCategoriasAll() {
				$array = array();
				$query = "SELECT * FROM categorias ORDER BY id ASC";
				$query = ConnectMysql::getConn()->query($query);
				if($query->rowCount() > 0) {
					$dadosCategoria = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dadosCategoria as $infoCategoria) {
						$categorias = new Categorias();
						$categorias->setId($infoCategoria["id"]);
						$categorias->setNome($infoCategoria["nome"]);
						$array[] = $categorias;
					}
				}else {
					return false;
				}
				return $array;
			}
		}
?>