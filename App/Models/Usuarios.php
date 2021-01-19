<?php
		/*
		* Classe de Usuários contendo atributos e métodos especificos para gerenciamento de dados de usuários perante objetos
		* Package ProjetoClassificados
		* author Roger Panosso <panossosolutions@gmail.com>
		*/

		namespace App\Models;

		class Usuarios {
			private int $id;
			private string $nome;
			private string $email;
			private string $senha;
			private string $telefone;

			public function setId(int $id) : int {
				if(isset($id) AND !empty($id) AND is_numeric($id)) {
					$id = filter_var($id, FILTER_SANITIZE_STRING);
					$this->id = intval($id);
					return true;
				}else {
					return false;
				}
			}
			public function getId() : int {
				return $this->id;
			}

			public function setNome(string $nome) : string {
				if(isset($nome) AND !empty($nome) AND is_string($nome)) {
					$nome = filter_var($nome, FILTER_SANITIZE_STRING);
					$this->nome = addslashes(htmlspecialchars(trim(ucwords($nome))));
					return true;
				}else {
					return false;
				}
			}
			public function getNome() : string {
				return $this->nome;
			}

			public function setEmail(string $email) : string {
				if(isset($email) AND !empty($email) AND is_string($email)) {
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					$this->email = addslashes(htmlspecialchars(trim($email)));
					return true;
				}else {
					return false;
				}
			}
			public function getEmail() : string {
				return $this->email;
			}

			public function setSenha(string $senha) : string {
				if(isset($senha) AND !empty($senha) AND is_string($senha)) {
					$senha = filter_var($senha, FILTER_SANITIZE_STRING);
					$this->senha = addslashes(htmlspecialchars(trim($senha)));
					return true;
				}else {
					return false;
				}
			}
			public function getSenha() : string {
				return $this->senha;
			}

			public function hashSenha() : string {
				return password_hash($this->getSenha(), PASSWORD_DEFAULT);
			}

			public function setTelefone(string $telefone) : string {
				if(isset($telefone) AND !empty($telefone) AND is_string($telefone)) {
					if(strlen($telefone) == 14 OR strlen($telefone) == 15) {
						$telefone = filter_var($telefone, FILTER_SANITIZE_STRING);
						$this->telefone = addslashes(htmlspecialchars(trim($telefone)));
						return true;
					}else {
						return false;
					}
				}else {
					return false;
				}
			}
			public function getTelefone() : string {
				return $this->telefone;
			}

			public function __destruct() {}
		}
?>