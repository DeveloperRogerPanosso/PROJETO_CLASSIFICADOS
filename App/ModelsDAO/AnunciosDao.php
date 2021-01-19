<?php
		namespace App\ModelsDAO;

		use \App\Models\Sessions;
		use \App\Models\Anuncios;
		use \App\Connect\ConnectMysql;

		class AnunciosDao {
			private function verificaTitulo(Anuncios $anuncio) {
				$query = "SELECT * FROM anuncios WHERE titulo = :titulo";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":titulo", $anuncio->getTitulo());
				$query->execute();
				if($query->rowCount() === 0) {
					return true;
				}else {
					return false;
				}
			}

			public function insertAnuncio(Anuncios $anuncio) {
				session_start();
				if($this->verificaTitulo($anuncio) == true) {
					$query = "INSERT INTO anuncios (primeira_imagem,segunda_imagem,terceira_imagem,video_demonstracao,email_usuario,id_categoria,titulo,descricao,valor,estado) VALUES (:primeira_imagem,:segunda_imagem,:terceira_imagem,:video_demonstracao,:email_usuario,:id_categoria,:titulo,:descricao,:valor,:estado)";
					$query = ConnectMysql::getConn()->prepare($query);
					$query->bindValue(":primeira_imagem", $anuncio->getPrimeiraImagem());
					$query->bindValue(":segunda_imagem", $anuncio->getSegundaImagem());
					$query->bindValue(":terceira_imagem", $anuncio->getTerceiraImagem());
					$query->bindValue(":video_demonstracao", $anuncio->getVideoDemonstracao());
					$query->bindValue(":email_usuario", $_SESSION["clogin"]);
					$query->bindValue(":id_categoria", $anuncio->getIdCategoria());
					$query->bindValue(":titulo", $anuncio->getTitulo());
					$query->bindValue(":descricao", $anuncio->getDescricao());
					$query->bindValue(":valor", $anuncio->getValor());
					$query->bindValue(":estado", $anuncio->getEstado());
					$query->execute();
					Sessions::cadastroAnuncio();
					header("Location: adicionar_anuncio.php");
					return true;
				}else {
					Sessions::errorCadastroAnuncio();
					header("Location: adicionar_anuncio.php");
					return false;
				}
			}

			public function getMeusAnuncios($email_usuario) {
				$array = array();
				$query = "SELECT anuncios.id, anuncios.primeira_imagem, anuncios.segunda_imagem, anuncios.terceira_imagem, anuncios.video_demonstracao, anuncios.email_usuario, categorias.nome AS categoria,
				anuncios.titulo, anuncios.descricao, anuncios.valor, anuncios.estado FROM anuncios INNER JOIN categorias
				ON categorias.id = anuncios.id_categoria WHERE anuncios.email_usuario = :email_usuario ";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email_usuario", $email_usuario);
				$query->execute();
				if($query->rowCount() > 0) {
					$dadosAnuncio = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dadosAnuncio as $infoAnuncio) {
						$anuncio = new Anuncios();
						$anuncio->setId($infoAnuncio["id"]);
						$anuncio->setPrimeiraImagem($infoAnuncio["primeira_imagem"]);
						$anuncio->setSegundaImagem($infoAnuncio["segunda_imagem"]);
						$anuncio->setTerceiraImagem($infoAnuncio["terceira_imagem"]);
						$anuncio->setVideoDemonstracao($infoAnuncio["video_demonstracao"]);
						$anuncio->setIdCategoria($infoAnuncio["categoria"]);
						$anuncio->setTitulo($infoAnuncio["titulo"]);
						$anuncio->setDescricao($infoAnuncio["descricao"]);
						$anuncio->setValor($infoAnuncio["valor"]);
						$anuncio->setEstado($infoAnuncio["estado"]);
						$array[] = $anuncio;
					}
				}else {
					return false;
				}
				return $array;
			}

			public function getAnuncioId($id) {
				$query = "SELECT * FROM anuncios WHERE id = :id";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":id", $id);
				$query->execute();
				if($query->rowCount() > 0) {
					$dadosAnuncio = $query->fetch(\PDO::FETCH_ASSOC);
					$anuncio = new Anuncios();
					$anuncio->setId($dadosAnuncio["id"]);
					$anuncio->setPrimeiraImagem($dadosAnuncio["primeira_imagem"]);
					$anuncio->setSegundaImagem($dadosAnuncio["segunda_imagem"]);
					$anuncio->setTerceiraImagem($dadosAnuncio["terceira_imagem"]);
					$anuncio->setVideoDemonstracao($dadosAnuncio["video_demonstracao"]);
					$anuncio->setIdCategoria($dadosAnuncio["id_categoria"]);
					$anuncio->setTitulo($dadosAnuncio["titulo"]);
					$anuncio->setDescricao($dadosAnuncio["descricao"]);
					$anuncio->setValor($dadosAnuncio["valor"]);
					$anuncio->setEstado($dadosAnuncio["estado"]);
					return $anuncio;
				}else {
					return false;
				}
			}

			public function updateAnuncio(Anuncios $anuncio) {
				$query = "UPDATE anuncios SET primeira_imagem = :primeira_imagem, segunda_imagem = :segunda_imagem, terceira_imagem = :terceira_imagem, video_demonstracao = :video_demonstracao, id_categoria = :id_categoria, titulo = :titulo,
				descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":primeira_imagem", $anuncio->getPrimeiraImagem());
				$query->bindValue(":segunda_imagem", $anuncio->getSegundaImagem());
				$query->bindValue(":terceira_imagem", $anuncio->getTerceiraImagem());
				$query->bindValue(":video_demonstracao", $anuncio->getVideoDemonstracao());
				$query->bindValue(":id_categoria", $anuncio->getIdCategoria());
				$query->bindValue(":titulo", $anuncio->getTitulo());
				$query->bindValue(":descricao", $anuncio->getDescricao());
				$query->bindValue(":valor", $anuncio->getValor());
				$query->bindValue(":estado", $anuncio->getEstado());
				$query->bindValue(":id", $anuncio->getId());
				$query->execute();
				Sessions::updateAnuncio();
				header("Location: meus_anuncios.php");
				return true;
			}

			public function deleteAnuncio($id) {
				$query = "DELETE FROM anuncios WHERE id = :id";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":id", $id);
				$query->execute();
				Sessions::deleteAnuncio();
				header("Location: meus_anuncios.php");
				return true;
			}

			public function getCountMeusAnuncios($email_usuario) {
				$query = "SELECT COUNT(*) AS count FROM anuncios WHERE email_usuario = :email_usuario";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email_usuario", $email_usuario);
				$query->execute();
				if($query->rowCount() > 0) {
					$query = $query->fetch(\PDO::FETCH_ASSOC);
					$totalAnuncios = $query["count"];
					return $totalAnuncios;
				}else {
					return false;
				}
			}

			public function getImagensAnuncios($email_usuario) {
				$array = array();
				$query = "SELECT id, primeira_imagem, segunda_imagem, terceira_imagem, titulo FROM anuncios WHERE email_usuario = :email_usuario";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email_usuario", $email_usuario);
				$query->execute();
				if($query->rowCount() > 0) {
					$dados = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dados as $imagem) {
						$anuncio = new Anuncios();
						$anuncio->setId($imagem["id"]);
						$anuncio->setPrimeiraImagem($imagem["primeira_imagem"]);
						$anuncio->setSegundaImagem($imagem["segunda_imagem"]);
						$anuncio->setTerceiraImagem($imagem["terceira_imagem"]);
						$anuncio->setTitulo($imagem["titulo"]);
						$array[] = $anuncio;
					}
				}else {
					return false;
				}
				return $array;
			}

			public function updateImagemAnuncio(Anuncios $anuncio) {
				$query = "UPDATE anuncios SET primeira_imagem = :primeira_nova_imagem, segunda_imagem = :segunda_nova_imagem, terceira_imagem = :terceira_nova_imagem WHERE id = :id";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":primeira_nova_imagem", $anuncio->getPrimeiraImagem());
				$query->bindValue(":segunda_nova_imagem", $anuncio->getSegundaImagem());
				$query->bindValue(":terceira_nova_imagem", $anuncio->getTerceiraImagem());
				$query->bindValue(":id", $anuncio->getId());
				$query->execute();
				Sessions::updateImagemAnuncio();
				header("Location: adicionar_anuncio.php");
				return true;
			}

			public function getCountTotalAnuncios() {
				$query = "SELECT COUNT(*) AS total_anuncios FROM anuncios";
				$query = ConnectMysql::getConn()->query($query);
				if($query->rowCount() > 0) {
					$query = $query->fetch(\PDO::FETCH_ASSOC);
					$total_anuncios = $query["total_anuncios"];
					return $total_anuncios;
				}else {
					return false;
				}
			}

			public function getUltimosAnuncios($p) {
				$array = array();
				$query = "SELECT anuncios.id, anuncios.primeira_imagem, anuncios.titulo, categorias.nome AS categoria,
				anuncios.valor FROM anuncios INNER JOIN  categorias ON categorias.id = anuncios.id_categoria 
				ORDER BY anuncios.id DESC LIMIT $p, 2";
				$query = ConnectMysql::getConn()->query($query);
				$query->execute();
				if($query->rowCount() > 0) {
					$dados = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dados as $infoAnuncio) {
						$anuncio = new Anuncios();
						$anuncio->setId($infoAnuncio["id"]);
						$anuncio->setPrimeiraImagem($infoAnuncio["primeira_imagem"]);
						$anuncio->setTitulo($infoAnuncio["titulo"]);
						$anuncio->setIdCategoria($infoAnuncio["categoria"]);
						$anuncio->setValor($infoAnuncio["valor"]);
						$array[] = $anuncio;
					}
				}else {
					return false;
				}
				return $array;
			}

			public function getProdutoAnuncioId($id) {
				$query = "SELECT anuncios.id, anuncios.primeira_imagem, anuncios.segunda_imagem, anuncios.terceira_imagem, anuncios.video_demonstracao, anuncios.email_usuario, categorias.nome AS categoria, anuncios.titulo, anuncios.descricao, anuncios.valor, anuncios.estado, anuncios.valor FROM anuncios INNER JOIN categorias ON categorias.id = anuncios.id_categoria WHERE anuncios.id = :id";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":id", $id);
				$query->execute();
				if($query->rowCount() > 0) {
					$dadosAnuncio = $query->fetch(\PDO::FETCH_ASSOC);
					$anuncio = new Anuncios();
					$anuncio->setId($dadosAnuncio["id"]);
					$anuncio->setPrimeiraImagem($dadosAnuncio["primeira_imagem"]);
					$anuncio->setSegundaImagem($dadosAnuncio["segunda_imagem"]);
					$anuncio->setTerceiraImagem($dadosAnuncio["terceira_imagem"]);
					$anuncio->setVideoDemonstracao($dadosAnuncio["video_demonstracao"]);
					$anuncio->setEmailUsuario($dadosAnuncio["email_usuario"]);
					$anuncio->setIdCategoria($dadosAnuncio["categoria"]);
					$anuncio->setTitulo($dadosAnuncio["titulo"]);
					$anuncio->setDescricao($dadosAnuncio["descricao"]);
					$anuncio->setValor($dadosAnuncio["valor"]);
					$anuncio->setEstado($dadosAnuncio["estado"]);
					return $anuncio;
				}else {
					return false;
				}
			}

			public function getResultadoPesquisa($categoria = "", $valor = "", $estado = "") {
				$array = array();
				$query = "SELECT anuncios.id, anuncios.primeira_imagem, anuncios.titulo, categorias.nome as categoria, anuncios.valor 
				FROM anuncios INNER JOIN categorias ON categorias.id = anuncios.id_categoria WHERE categorias.id = :idcategoria AND anuncios.valor BETWEEN :valor1 AND :valor2 AND anuncios.estado = :estado";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":idcategoria", $categoria);
				$query->bindValue(":valor1", $valor[0]);
				$query->bindValue(":valor2", $valor[1]);
				$query->bindValue(":estado", $estado);
				$query->execute();
				if($query->rowCount() > 0) {
					$dadosPesquisa = $query->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($dadosPesquisa as $pesquisa) {
						$anuncio = new Anuncios();
						$anuncio->setId($pesquisa["id"]);
						$anuncio->setPrimeiraImagem($pesquisa["primeira_imagem"]);
						$anuncio->setTitulo($pesquisa["titulo"]);
						$anuncio->setIdCategoria($pesquisa["categoria"]);
						$anuncio->setValor($pesquisa["valor"]);
						$array[] = $anuncio;
					}
				}else {
					return false;
				}
				return $array;
			}
		}
?>