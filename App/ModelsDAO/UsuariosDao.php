<?php
		/*
		* Classe UsuariosDao contendo metodos específicos gerando persistencia de dados ao banco de dados sendo responsaveis
		* por manipulações dos dados e consultas SQLs ao banco de dados através de injeções de dependencia recebendo objetos
		* extenos para srem consumidos em seus metodos
		* Package ProjetoClassificados
		* author Roger Panosso <panossosolutions@gmail.com>
		*/

		namespace App\ModelsDAO;

		use \App\Models\Sessions;
		use \App\Models\Usuarios;
		use \App\Connect\ConnectMysql;

		class UsuariosDao {
			private function verificaEmail(Usuarios $usuario) {
				$query = "SELECT * FROM usuarios WHERE email = :email";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email", $usuario->getEmail());
				$query->execute();
				if($query->rowCount() === 0) {
					return true;
				}else {
					return false;
				}
			}

			public function insertUsuario(Usuarios $usuario) {
				if($this->verificaEmail($usuario) == true) {
					$query = "INSERT INTO usuarios (nome,email,senha,telefone) VALUES (:nome,:email,:senha,:telefone)";
					$query = ConnectMysql::getConn()->prepare($query);
					$query->bindValue(":nome", $usuario->getNome());
					$query->bindValue(":email", $usuario->getEmail());
					$query->bindValue(":senha", $usuario->hashSenha());
					$query->bindValue(":telefone", $usuario->getTelefone());
					$query->execute();
					Sessions::successCadastroUsuario();
					header("Location: cadastre_se.php");
					return true;
				}else {
					Sessions::errorCadastroUsuario();
					header("Location: cadastre_se.php");
					return false;
				}
			}

			private function selectHashSenhaUsuario(Usuarios $usuario) {
				$query = "SELECT senha FROM usuarios WHERE email = :email";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email", $usuario->getEmail());
				$query->execute();
				if($query->rowCount() > 0) {
					$query = $query->fetch(\PDO::FETCH_ASSOC);
					$senhaUsuario = $query["senha"];
					return $senhaUsuario;
				}else {
					return false;
				}
			}

			public function validaLoginUsuario(Usuarios $usuario) {
				$query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND status_usuario = 1";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email", $usuario->getEmail());
				$query->bindValue(":senha", $this->selectHashSenhaUsuario($usuario));
				$query->execute();
				if(password_verify($usuario->getSenha(), $this->selectHashSenhaUsuario($usuario))) {
					if($query->rowCount() > 0) {
						$dadosUsuario = $query->fetch(\PDO::FETCH_ASSOC);
						session_start();
						$_SESSION["clogin"] = $dadosUsuario["email"];
						header("Location: index.php");
						return true;
					}else {
						header("Location: login.php");
						return false;
					}
				}else {
					Sessions::loginInvalido();
					header("Location: login.php");
					return false;
				}
			}

			public function updateSenhaLoginUsuario(Usuarios $usuario) {
				$query = "UPDATE usuarios SET senha = :nova_senha WHERE email = :email";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":nova_senha", $usuario->hashSenha());
				$query->bindValue(":email", $usuario->getEmail());
				$query->execute();
				Sessions::updateSenhaLoginUsuario();
				header("Location: login.php");
				return true;
			}

			public function deleteUsuario($id) {
				$query = "DELETE FROM usuarios WHERE id = :id";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":id", $id);
				$query->execute();
				Sessions::deleteUsuario();
				header("Location: index.php");
				return true;
			}

			public function getCountTotalUsuarios() {
				$query = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
				$query = ConnectMysql::getConn()->query($query);
				if($query->rowCount() > 0) {
					$query = $query->fetch(\PDO::FETCH_ASSOC);
					$total_usuarios = $query["total_usuarios"];
					return $total_usuarios;
				}else {
					return false;
				}
			}

			public function getUsuarioAnuncioId($email_usuario) {
				$query = "SELECT * FROM usuarios WHERE email = :email_usuario";
				$query = ConnectMysql::getConn()->prepare($query);
				$query->bindValue(":email_usuario", $email_usuario);
				$query->execute();
				if($query->rowCount() > 0) {
					$dadosUsuario = $query->fetch(\PDO::FETCH_ASSOC);
					$usuario = new Usuarios();
					$usuario->setId($dadosUsuario["id"]);
					$usuario->setNome($dadosUsuario["nome"]);
					$usuario->setEmail($dadosUsuario["email"]);
					$usuario->setSenha($dadosUsuario["senha"]);
					$usuario->setTelefone($dadosUsuario["telefone"]);
					return $usuario;
				}else {
					return false;
				}
			}
		}
?>