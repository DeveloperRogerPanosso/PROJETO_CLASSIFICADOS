<?php
		namespace App\Models;

		class Categorias {
			private int $id;
			private string $nome;

			public function setId(int $id) : int {
				if(isset($id) AND !empty($id) AND is_numeric($id)) {
					$id = filter_var($id, FILTER_VALIDATE_INT);
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

			public function __destruct() {
				
			}
		}
?>