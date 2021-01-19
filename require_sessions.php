<?php
		if(isset($_SESSION["cadastro_usuario"]) AND !empty($_SESSION["cadastro_usuario"])) {
			echo $_SESSION["cadastro_usuario"];
			$_SESSION["cadastro_usuario"] = null;
			unset($_SESSION["cadastro_usuario"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["cadastro_usuario_invalido"]) AND !empty($_SESSION["cadastro_usuario_invalido"])) {
			echo $_SESSION["cadastro_usuario_invalido"];
			$_SESSION["cadastro_usuario_invalido"] = null;
			unset($_SESSION["cadastro_usuario_invalido"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["login_invalido"]) AND !empty($_SESSION["login_invalido"])) {
			echo $_SESSION["login_invalido"];
			$_SESSION["login_invalido"] = null;
			unset($_SESSION["login_invalido"]);
		}

		/*-------------------------//-----------------------*/


		if(isset($_SESSION["udpate_senha_login"]) AND !empty($_SESSION["udpate_senha_login"])) {
			echo $_SESSION["udpate_senha_login"];
			$_SESSION["udpate_senha_login"] = null;
			unset($_SESSION["udpate_senha_login"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["cadastro_anuncio"]) AND !empty($_SESSION["cadastro_anuncio"])) {
			echo $_SESSION["cadastro_anuncio"];
			$_SESSION["cadastro_anuncio"] = null;
			unset($_SESSION["cadastro_anuncio"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["update_anuncio_usuario"]) AND !empty($_SESSION["update_anuncio_usuario"])) {
			echo $_SESSION["update_anuncio_usuario"];
			$_SESSION["update_anuncio_usuario"] = null;
			unset($_SESSION["update_anuncio_usuario"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["delete_anuncio_usuario"]) AND !empty($_SESSION["delete_anuncio_usuario"])) {
			echo $_SESSION["delete_anuncio_usuario"];
			$_SESSION["delete_anuncio_usuario"] = null;
			unset($_SESSION["delete_anuncio_usuario"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["cadastro_anuncio_invalido"]) AND !empty($_SESSION["cadastro_anuncio_invalido"])) {
			echo $_SESSION["cadastro_anuncio_invalido"];
			$_SESSION["cadastro_anuncio_invalido"] = null;
			unset($_SESSION["cadastro_anuncio_invalido"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["update_imagem_anuncio"]) AND !empty($_SESSION["update_imagem_anuncio"])) {
			echo $_SESSION["update_imagem_anuncio"];
			$_SESSION["update_imagem_anuncio"] = null;
			unset($_SESSION["update_imagem_anuncio"]);
		}

		/*-------------------------//-----------------------*/

		if(isset($_SESSION["envio_mensagem"]) AND !empty($_SESSION["envio_mensagem"])) {
			echo $_SESSION["envio_mensagem"];
			$_SESSION["envio_mensagem"] = null;
			unset($_SESSION["envio_mensagem"]);
		}
?>