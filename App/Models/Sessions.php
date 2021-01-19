<?php
		/*
		* Classe Sesions contendo métodos estáticos referentes a propria classe tendo por finalidade retornar
		* sessão ao usuário
		* Package ProjetoClassificados
		* author Roger Panosso <panossosolutions@gmail.com>
		*/

		namespace App\Models;

		class Sessions {
			public static function successCadastroUsuario() {
				require_once "Pages/Parcials/success_cadastro_usuario.php";
			}

			public static function errorCadastroUsuario() {
				require_once "Pages/Parcials/error_cadastro_usuario.php";
			}

			public static function loginInvalido() {
				require_once "Pages/Parcials/error_login_usuario.php";
			}

			public static function updateSenhaLoginUsuario() {
				require_once "Pages/Parcials/success_update_senha.php";
			}

			public static function cadastroAnuncio() {
				require_once "Pages/Parcials/success_cadastro_anuncio.php";
			}

			public static function deleteAnuncio() {
				require_once "Pages/Parcials/delete_anuncio_usuario.php";
			}

			public static function updateAnuncio() {
				require_once "Pages/Parcials/update_anuncio_usuario.php";
			}

			public static function errorCadastroAnuncio() {
				require_once "Pages/Parcials/error_cadastro_anuncio.php";
			}

			public static function updateImagemAnuncio() {
				require_once "Pages/Parcials/success_update_imagem_anuncio.php";
			}

			public static function envioMensagem() {
				require_once "Pages/Parcials/success_envio_mensagem.php";
			}
		}
?>