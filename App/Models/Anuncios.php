<?php
		namespace App\Models;

		class Anuncios {
			private int $id;
			private string $primeira_imagem;
			private string $segunda_imagem;
			private string $terceira_imagem;
			private $video_demonstracao;
			private string $email_usuario;
			private string $id_categoria;
			private string $titulo;
			private string $descricao;
			private string $valor;
			private string $estado;

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

			public function setPrimeiraImagem(string $primeira_imagem) : string {
				$primeira_imagem = filter_var($primeira_imagem, FILTER_SANITIZE_URL);
				$this->primeira_imagem = addslashes($primeira_imagem);
				return true;
			}
			public function getPrimeiraImagem() : string {
				return $this->primeira_imagem;
			}

			public function setSegundaImagem(string $segunda_imagem) : string {
				$segunda_imagem = filter_var($segunda_imagem, FILTER_SANITIZE_URL);
				$this->segunda_imagem = addslashes($segunda_imagem);
				return true;
			}
			public function getSegundaImagem() : string {
				return $this->segunda_imagem;
			}

			public function setTerceiraImagem(string $terceira_imagem) : string {
				$terceira_imagem = filter_var($terceira_imagem, FILTER_SANITIZE_URL);
				$this->terceira_imagem = addslashes($terceira_imagem);
				return true;
			}
			public function getTerceiraImagem() {
				return $this->terceira_imagem;
			}

			public function setVideoDemonstracao($video_demonstracao) {
				$video_demonstracao = filter_var($video_demonstracao, FILTER_SANITIZE_URL);
				$this->video_demonstracao = $video_demonstracao;
				return true;
			}
			public function getVideoDemonstracao() {
				return $this->video_demonstracao;
			}

			public function setEmailUsuario(string $email_usuario) : string {
				if(isset($email_usuario) AND !empty($email_usuario) AND is_string($email_usuario)) {
					$email_usuario = filter_var($email_usuario, FILTER_SANITIZE_EMAIL);
					$this->email_usuario = addslashes(htmlspecialchars(trim($email_usuario)));
					return true;
				}else {
					return false;
				}
			}
			public function getEmailUsuario() : string {
				return $this->email_usuario;
			}

			public function setIdCategoria(string $id_categoria) : string {
				if(isset($id_categoria) AND !empty($id_categoria) AND is_string($id_categoria)) {
					$id_categoria = filter_var($id_categoria, FILTER_SANITIZE_STRING);
					$this->id_categoria = addslashes(htmlspecialchars(trim(ucfirst($id_categoria))));
					return true;
				}else {
					return false;
				}
			}
			public function getIdCategoria() : string {
				return $this->id_categoria;
			}

			public function setTitulo(string $titulo) : string {
				if(isset($titulo) AND !empty($titulo) AND is_string($titulo)) {
					$titulo = filter_var($titulo, FILTER_SANITIZE_STRING);
					$this->titulo = addslashes(htmlspecialchars(trim(ucwords($titulo))));
					return true;
				}else {
					return false;
				}
			}
			public function getTitulo() : string {
				return $this->titulo;
			}

			public function setDescricao(string $descricao) : string {
				if(isset($descricao) AND !empty($descricao) AND is_string($descricao)) {
					$descricao = filter_var($descricao, FILTER_SANITIZE_STRING);
					$this->descricao = addslashes(htmlspecialchars(trim(ucfirst($descricao))));
					return true;
				}else {
					return false;
				}
			}
			public function getDescricao() : string {
				return $this->descricao;
			}

			public function setValor(string $valor) : string {
				if(isset($valor) AND !empty($valor) AND is_string($valor)) {
					$valor = filter_var($valor, FILTER_SANITIZE_STRING);
					$this->valor = addslashes(htmlspecialchars(trim(str_replace(",", ".", $valor))));
					return true;
				}else {
					return false;
				}
			}
			public function getValor() : string {
				return $this->valor;
			}

			public function setEstado(string $estado) : string {
				if(isset($estado) AND !empty($estado) AND is_string($estado)) {
					$estado = filter_var($estado, FILTER_SANITIZE_STRING);
					$this->estado = addslashes(htmlspecialchars(trim(ucfirst($estado))));
					return true;
				}else {
					return false;
				}
			}
			public function getEstado() : string {
				return $this->estado;
			}

			public function __destruct() {
				
			}
		}
?>